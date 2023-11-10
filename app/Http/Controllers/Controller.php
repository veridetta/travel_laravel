<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Announcement;
use App\Models\Application;
use App\Models\Article;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Footer;
use App\Models\Kelebihan;
use App\Models\Page;
use App\Models\Pokja;
use App\Models\Profile;
use App\Models\SideBanner;
use App\Models\TopBanner;
use App\Models\Travel;
use App\Models\Unit;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    //fungsi index
    public function index()
    {
      //WAJIB
      $about = About::first();
      $banner = TopBanner::where('active', '1')->get();
      $pageConfigs = ['myLayout' => 'horizontal'];
      $lokasi = Travel::select('from')->groupBy('from')->get();
      $waktu = Travel::selectRaw('month(departure) as month, year(departure) as year')->groupBy('month','year')->get();
      $travel = Travel::where('departure','>=',date('Y-m-d'))->orderBy('departure','asc')->take(12)->get();
      $kelebihan = Kelebihan::get();
      // Mendapatkan data footer dari tabel "footer"
      $footerData = Footer::get();
      // Inisialisasi array untuk menyimpan title dari setiap footer
      $footerTitles = [];

      // Iterasi melalui setiap baris data footer
      foreach ($footerData as $footer) {
          // Ambil data dari pages yang memiliki id yang sama dengan footer
          $pagesData =  Page::hasJob($footer->id)->get();
          $footerTitle = $footer->title;
          $footerTitles[] = [
            'title' => $footerTitle,
            'pages' => $pagesData
        ];
      }
      return view('pages.home',['pageConfigs'=> $pageConfigs,'profile'=>$about,'banner'=>$banner,'lokasi'=>$lokasi,'waktu'=>$waktu,'travel'=>$travel,'kelebihan'=>$kelebihan,'footerTitles'=>$footerTitles]);
    }
    //fungsi pages
    public function pages($slug)
    {
      //WAJIB
      $profile = Profile::first();
      $about = About::all();
      $unit = Unit::all();
      $pokja = Pokja::all();
      $pageConfigs = ['myLayout' => 'horizontal'];
      $infoPublic = Category::where('is_public', '1')->get();
      //WAJIB

      $lastArticle = Article::orderBy('created_at','desc')->take(5)->get();
      $content = About::where('slug',$slug)->first();
      return view('pages.pages',['pageConfigs'=> $pageConfigs,'profile'=>$profile,'about'=>$about,'unit'=>$unit,'pokja'=>$pokja,'lastArticle'=>$lastArticle,'content'=>$content,'infoPublic'=>$infoPublic]);
    }
    public function news($slug)
    {
      //WAJIB
      $profile = Profile::first();
      $about = About::all();
      $unit = Unit::all();
      $pokja = Pokja::all();
      $pageConfigs = ['myLayout' => 'horizontal'];
      $infoPublic = Category::where('is_public', '1')->get();
      //WAJIB
      $popular = Article::orderBy('visitor','desc')->take(5)->get();
      //ambil data dari about where slug
      $content = Article::where('slug',$slug)->first();
      $content->increment('visitor');
      //ambil artikel terkait berdasarkan tags dan kategori
      $related = Article::
        whereHas('category', function ($query) use ($content) {
          $query->whereIn('categories.id', $content->category->pluck('id'));
        })
        ->orWhere(function ($query) use ($content) {
            foreach ($content->tags as $tag) {
                $query->orWhere('tags', 'LIKE', '%' . $tag . '%');
            }
        })
        ->where('id', '!=', $content->id)
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

      //return
      return view('pages.news',['pageConfigs'=> $pageConfigs,'profile'=>$profile,'about'=>$about,'unit'=>$unit,'pokja'=>$pokja,'content'=>$content,'related'=>$related,'popular'=>$popular,'infoPublic'=>$infoPublic]);
    }
    public function categories($slug)
    {
      //WAJIB
      $profile = Profile::first();
      $about = About::all();
      $unit = Unit::all();
      $pokja = Pokja::all();
      $pageConfigs = ['myLayout' => 'horizontal'];
      $infoPublic = Category::where('is_public', '1')->get();
      //WAJIB
      $popular = Article::orderBy('visitor','desc')->take(5)->get();
      //ambil data dari about where slug
      $perPage = 10; // Gantilah dengan jumlah item yang ingin ditampilkan per halaman
      $category = Category::where('slug', $slug)->first();
      $content = Article::where('category_id',$category->id)->orderBy('created_at', 'desc')->paginate($perPage);
      $related = Article::
        orderBy('created_at', 'desc')
        ->take(5)
        ->get();
      //return
      return view('pages.category',['pageConfigs'=> $pageConfigs,'profile'=>$profile,'about'=>$about,'unit'=>$unit,'pokja'=>$pokja,'content'=>$content,'related'=>$related,'popular'=>$popular,'infoPublic'=>$infoPublic,'category'=>$category]);
    }
}
