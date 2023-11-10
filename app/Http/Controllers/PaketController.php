<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Footer;
use App\Models\Page;
use App\Models\Setting;
use App\Models\Travel;
use DateTime;
use Illuminate\Http\Request;

class PaketController extends Controller
{
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
    $content = Travel::where('slug',$slug)->first();
    return view('pages.detail_paket',['pageConfigs'=> $pageConfigs,'profile'=>$about,'tr'=>$content,'footerTitles'=>$footerTitles]);
  }
}
