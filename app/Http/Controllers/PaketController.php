<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Agent;
use App\Models\Footer;
use App\Models\Order;
use App\Models\Page;
use App\Models\Payment;
use App\Models\Price;
use App\Models\Room;
use App\Models\Setting;
use App\Models\Travel;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jorenvh\Share\Share;

class PaketController extends Controller
{
    //construct
    public function __construct()
    {
      \Midtrans\Config::$serverKey    = config('services.midtrans.serverKey');
      \Midtrans\Config::$clientKey    = config('services.midtrans.clientKey');
      \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
      \Midtrans\Config::$isSanitized  = config('services.midtrans.isSanitized');
      \Midtrans\Config::$is3ds        = config('services.midtrans.is3ds');
    }
    public function select_pay($id){
      $about = About::first();
      $credentials = Setting::first();
      $profile = $about;
      $profile->credentials = $credentials;
      $footerData = Footer::get();
      $footerTitles = [];
      foreach ($footerData as $footer) {
          // Ambil data dari pages yang memiliki id yang sama dengan footer
          $pagesData =  Page::hasJob($footer->id)->get();
          $footerTitle = $footer->title;
          $footerTitles[] = [
            'title' => $footerTitle,
            'pages' => $pagesData
        ];
      }
      $pageConfigs = ['myLayout' => 'horizontal'];
      $order = Order::find($id)->first();
      return view('pages.payment',[
        'id'=>$id,'pageConfigs'=> $pageConfigs,'profile'=>$about,'footerTitles'=>$footerTitles, 'order'=>$order, 'type'=>'create'
      ]);
    }
    public function post_pay($id,$type,$direct){
      $about = About::first();
      $credentials = Setting::first();
      $profile = $about;
      $profile->credentials = $credentials;
      $footerData = Footer::get();
      $footerTitles = [];
      foreach ($footerData as $footer) {
          // Ambil data dari pages yang memiliki id yang sama dengan footer
          $pagesData =  Page::hasJob($footer->id)->get();
          $footerTitle = $footer->title;
          $footerTitles[] = [
            'title' => $footerTitle,
            'pages' => $pagesData
        ];
      }
      $pageConfigs = ['myLayout' => 'horizontal'];
      $order = Order::find($id)->first();
      $dp = Payment::where('order_id',$order->id);
      if($dp!==null){
        $dp = $dp->where('type','dp')->where('status','Lunas')->count();
      }else{
        $dp = 0;
      }
      if($dp>0){
        $dp = Payment::where('order_id',$order->id)->where('type','full');
        if($dp->count()>0){
          $dp->delete();
        }
        $sisa = $order->total_price - 5000000;
        $dporfull = "full";
      }else{
        $dp = Payment::where('order_id',$order->id)->where('type','dp');
        if($dp->count()>0){
          $dp->delete();
        }
        $sisa = 5000000;
        $dporfull = "dp";
      }
      if($direct=="1"){
        $payment = Payment::create([
          'order_id'  => $order->id,
          'user_id' => auth()->user()->id,
          'bank'  => 'Direct',
          'total_price'=> $sisa,
          'status'=>'Menunggu Pembayaran',
          'type'=>$dporfull,
          'bukti'=>'',
          'direct'=>1,
          'merchant_id'=>'',
        ]);
        $payment->save();
        return view('pages.snap',[
          'clientKey'=>\Midtrans\Config::$clientKey,
          'snap_token'=>$payment->merchant_id, 'direct'=>true,'pageConfigs'=> $pageConfigs,'profile'=>$about,'footerTitles'=>$footerTitles, 'sisa'=>$sisa, 'order'=>$order,'payment'=>$payment
        ]);
      }else{
        $travel = Travel::find($order->travel_id)->first();
        $price = Price::where('travel_id',$travel->id)->first();
        $price_dewasa = $price->price_dewasa;
        $price_anak = $price->price_anak;
        $price_bayi = $price->price_bayi;
        $item_details = [];
        foreach($order->pesertas as $peserta){
          $harga=0;
          if($peserta->type=="dewasa"){
            $harga = $price_dewasa;
          }elseif($peserta->type=="anak"){
            $harga = $price_anak;
          }else{
            $harga = $price_bayi;
          }
          $item_details[] = [
            'id'            => $peserta->id,
            'price'         => $harga,
            'quantity'      => 1,
            'name'          => $peserta->name,
            'brand'         => 'Peserta',
            'category'      => 'Peserta',
            'merchant_name' => config('app.name'),
          ];
        }
        $payment = Payment::create([
          'order_id'  => $order->id,
          'user_id' => auth()->user()->id,
          'bank'  => 'Midtrans',
          'total_price'=> $sisa,
          'status'=>'Menunggu Pembayaran',
          'type'=>'dp',
          'bukti'=>'',
          'direct'=>0,
          'merchant_id'=>'',
        ]);
        $payload = [
            'transaction_details' => [
                'order_id'     => 'TRA-'.$order->id,
                'gross_amount' => (string) $order->total_price,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email'      => auth()->user()->email,
            ],
            'item_details' => $item_details,
        ];
        try {
          $snapToken = \Midtrans\Snap::getSnapToken($payload);
        }
        catch (\Exception $e) {
            echo $e->getMessage();
        }
          $payment->merchant_id = $snapToken;
          $payment->save();
          return view('pages.snap',[
            'clientKey'=>\Midtrans\Config::$clientKey,
            'snap_token'=>$snapToken,'direct'=>false,'pageConfigs'=> $pageConfigs,'profile'=>$about,'footerTitles'=>$footerTitles, 'sisa'=>$sisa, 'order'=>$order,'payment'=>$payment
          ]);
      }
    }
    public function update($id,$status){
      $payment = Payment::find($id)->last();
      if($payment->direct){
        //return redirect('/post-pembayaran/'.$payment->id.'/{type}/1');
      }else{
        if($status=="success"){
          $status = "Lunas";
          $payment->status = $status;
          $order = Order::find($payment->order_id)->first();
          if($payment->type=="dp"){
            $order->dp = $payment->total_price;
          }else{
            $order->status = $status;
          }
          $order->save();
        }
        $payment->save();
        return redirect('/dashboard/payments/');
      }
    }
    public function cek(){
    try {
      $notif = new \Midtrans\Notification();
    }
    catch (\Exception $e) {
        exit($e->getMessage());
    }

      dd($notif);
      $transaction = $notif->transaction_status;
      $type = $notif->payment_type;
      $order_id = $notif->order_id;
      $fraud = $notif->fraud_status;

    if ($transaction == 'capture') {
        // For credit card transaction, we need to check whether transaction is challenge by FDS or not
        if ($type == 'credit_card') {
            if ($fraud == 'challenge') {
                // TODO set payment status in merchant's database to 'Challenge by FDS'
                // TODO merchant should decide whether this transaction is authorized or not in MAP
                echo "Transaction order_id: " . $order_id ." is challenged by FDS";
            } else {
                // TODO set payment status in merchant's database to 'Success'
                echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
            }
      }
    } else if ($transaction == 'settlement') {
        // TODO set payment status in merchant's database to 'Settlement'
        echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
    } else if ($transaction == 'pending') {
        // TODO set payment status in merchant's database to 'Pending'
        echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
    } else if ($transaction == 'deny') {
        // TODO set payment status in merchant's database to 'Denied'
        echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
    } else if ($transaction == 'expire') {
        // TODO set payment status in merchant's database to 'expire'
        echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
    } else if ($transaction == 'cancel') {
        // TODO set payment status in merchant's database to 'Denied'
        echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
    }

    }
    function printExampleWarningMessage() {
      if (strpos(\Midtrans\Config::$serverKey, 'your ') != false ) {
          echo "<code>";
          echo "<h4>Please set your server key from sandbox</h4>";
          echo "In file: " . __FILE__;
          echo "<br>";
          echo "<br>";
          echo htmlspecialchars('Config::$serverKey = \'<your server key>\';');
          die();
      }
  }

  public function search($category, $schedule, $departure, $filter, Request $request)
  {
      $about = About::first();
      $credentials = Setting::first();
      $profile = $about;
      $profile->credentials = $credentials;
      $footerData = Footer::get();
      $footerTitles = [];
      foreach ($footerData as $footer) {
          // Ambil data dari pages yang memiliki id yang sama dengan footer
          $pagesData =  Page::hasJob($footer->id)->get();
          $footerTitle = $footer->title;
          $footerTitles[] = [
            'title' => $footerTitle,
            'pages' => $pagesData
        ];
      }
      $pageConfigs = ['myLayout' => 'horizontal'];
      $waktu = Travel::selectRaw('month(departure) as month, year(departure) as year')->groupBy('month','year')->get();

      //$filter itu isinya antara segera, murah, mahal
      $schedule = str_replace('-', ' ', $schedule);
      $departure = str_replace('-', ' ', $departure);
      $category = str_replace('-', ' ', $category);

      $priceRange = $request->input('price');
      $duration = $request->input('duration');
      $query = Travel::query();

      if ($schedule != 'semua') {
        $schedule = str_replace('-', ' ', $schedule);
        $date = DateTime::createFromFormat('M Y', $schedule);
        $query->whereYear('departure', $date->format('Y'))
              ->whereMonth('departure', $date->format('m'));
      }else{
        $query->where('departure','>=',date('Y-m-d'));
      }

      if ($departure != 'semua') {
          $departure = str_replace('-', ' ', $departure);
          $query->where('from', 'like', '%' . $departure . '%');
      }

      if ($category != 'semua') {
          $category = str_replace('-', ' ', $category);
          $query->where('category', 'like', '%' . $category . '%');
      }

      if ($priceRange != 'semua') {
          $bounds = explode('-', $priceRange);
          $lowerBound = $bounds[0];
          $upperBound = $bounds[1];
          $query->whereHas('prices', function ($query) use ($lowerBound, $upperBound) {
              $query->whereBetween('price_dewasa', [$lowerBound, $upperBound]);
          });
      }

      if ($duration != 'semua') {
          $query->where('duration', 'like', '%' . $duration . '%');
      }
      if ($filter == 'segera') {
          $query->orderBy('departure', 'asc');
      } elseif ($filter == 'mahal') {
          $query->orderByDesc(
              Travel::select('price_dewasa')
                  ->from('prices')
                  ->whereColumn('travels.id', 'prices.travel_id')
          );
      } elseif ($filter == 'murah') {
          $query->orderBy(
              Travel::select('price_dewasa')
                  ->from('prices')
                  ->whereColumn('travels.id', 'prices.travel_id')
          );
      }

      $travels = $query->paginate(10);
      $category = Travel::select('category')->groupBy('category')->get();

      return view('pages.paket',['pageConfigs'=> $pageConfigs,'profile'=>$about,'travels'=>$travels,'footerTitles'=>$footerTitles,'category'=>$category,'waktu'=>$waktu]);
  }
  public function get_kota(Request $request){
    $data = [];
    if($request->has('q')){
    $search = $request->q;
    $data = Travel::select('from')->where('from','LIKE',"%$search%")->groupBy('from')->get();
    }
    return response()->json($data);
  }
  public function ajax($category, $schedule, $departure, $filter, Request $request)
  {
      $about = About::first();
      $credentials = Setting::first();
      $profile = $about;
      $profile->credentials = $credentials;
      $footerData = Footer::get();
      $footerTitles = [];
      foreach ($footerData as $footer) {
          // Ambil data dari pages yang memiliki id yang sama dengan footer
          $pagesData =  Page::hasJob($footer->id)->get();
          $footerTitle = $footer->title;
          $footerTitles[] = [
            'title' => $footerTitle,
            'pages' => $pagesData
        ];
      }
      $pageConfigs = ['myLayout' => 'horizontal'];
      $waktu = Travel::selectRaw('month(departure) as month, year(departure) as year')->groupBy('month','year')->get();

      //$filter itu isinya antara segera, murah, mahal
      $schedule = str_replace('-', ' ', $schedule);
      $departure = str_replace('-', ' ', $departure);
      $category = str_replace('-', ' ', $category);

      $priceRange = $request->input('price');
      $duration = $request->input('duration');
      $query = Travel::query();

      if ($schedule != 'semua') {
        $schedule = str_replace('-', ' ', $schedule);
        $date = DateTime::createFromFormat('M Y', $schedule);
        $query->whereYear('departure', $date->format('Y'))
              ->whereMonth('departure', $date->format('m'));
      }else{
        $query->where('departure','>=',date('Y-m-d'));
      }

      if ($departure != 'semua') {
          $departure = str_replace('-', ' ', $departure);
          $query->where('from', 'like', '%' . $departure . '%');
      }

      if ($category != 'semua') {
          $category = str_replace('-', ' ', $category);
          $query->where('category', 'like', '%' . $category . '%');
      }

      if ($priceRange != 'semua') {
          $bounds = explode('-', $priceRange);
          $lowerBound = $bounds[0];
          $upperBound = $bounds[1];
          $query->whereHas('prices', function ($query) use ($lowerBound, $upperBound) {
              $query->whereBetween('price_dewasa', [$lowerBound, $upperBound]);
          });
      }

      if ($duration != 'semua') {
          $query->where('duration', 'like', '%' . $duration . '%');
      }
      if ($filter == 'segera') {
          $query->orderBy('departure', 'asc');
      } elseif ($filter == 'mahal') {
          $query->orderByDesc(
              Travel::select('price_dewasa')
                  ->from('prices')
                  ->whereColumn('travel.id', 'prices.travel_id')
          );
      } elseif ($filter == 'murah') {
          $query->orderBy(
              Travel::select('price_dewasa')
                  ->from('prices')
                  ->whereColumn('travel.id', 'prices.travel_id')
          );
      }

      $travels = $query->paginate(10);
      $category = Travel::select('category')->groupBy('category')->get();
      $data = $travels;

      if ($request->ajax()) {
        return view('pages.ajax', ['pageConfigs'=> $pageConfigs,'profile'=>$about,'data'=>$travels,'footerTitles'=>$footerTitles,'category'=>$category,'waktu'=>$waktu]);
      }
      return view('pages.paket',['pageConfigs'=> $pageConfigs,'profile'=>$about,'data'=>$travels,'footerTitles'=>$footerTitles,'category'=>$category,'waktu'=>$waktu]);
  }
  public function paket($slug){
    $about = About::first();
      $credentials = Setting::first();
      $profile = $about;
      $profile->credentials = $credentials;
      $footerData = Footer::get();
      $footerTitles = [];
      foreach ($footerData as $footer) {
          // Ambil data dari pages yang memiliki id yang sama dengan footer
          $pagesData =  Page::hasJob($footer->id)->get();
          $footerTitle = $footer->title;
          $footerTitles[] = [
            'title' => $footerTitle,
            'pages' => $pagesData
        ];
      }
    $pageConfigs = ['myLayout' => 'horizontal'];
    $page = $profile->credentials->server.'/paket/'.$slug;
    $content = Travel::where('slug',$slug)->first();
    $share = new \Jorenvh\Share\Share();
    $shareComponent = $share->page(
        $page,
        'Paket '.$content->name,
    )
      ->facebook()
      ->twitter()
      ->linkedin()
      ->telegram()
      ->whatsapp()
      ->reddit();
    return view('pages.detail_paket',['pageConfigs'=> $pageConfigs,'profile'=>$about,'tr'=>$content,'footerTitles'=>$footerTitles,'shareComponent'=>$shareComponent]);
  }
  public function buat_pesanan(Request $request){
    $slug = $request->input('q');
    if(auth()->user()){
      $user = auth()->user();
      $travel = Travel::where('slug',$slug)->first();
      $agent = Agent::where('user_id',$travel->user_id)->first();;
      $order = new \App\Models\Order;
      $order->user_id = $user->id;
      $order->travel_id = $travel->id;
      $order->agent_id = $agent->id;
      $order->total_price = $travel->prices->first()->price_dewasa;
      $order->status = 'Menunggu Pembayaran';
      $order->save();

      return redirect('/dashboard/orders/'.$order->id.'/rooms/create');
    }else{
      return redirect('/dashboard/login?page=paket/'.$slug)->with('error','Silahkan login terlebih dahulu');
    }
  }
}
