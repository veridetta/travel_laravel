<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Agent;
use App\Models\Announcement;
use App\Models\Application;
use App\Models\Article;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Footer;
use App\Models\Gallery;
use App\Models\Kelebihan;
use App\Models\Page;
use App\Models\Pokja;
use App\Models\Profile;
use App\Models\Setting;
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

      $footerData = Footer::get();

      $footerTitles = [];
      $credentials = Setting::first();

      $profile = $about;
      $profile->credentials = $credentials;
      $gallery = Gallery::where('active', '1')->get();
      $agent = Agent::get();

      foreach ($footerData as $footer) {
          // Ambil data dari pages yang memiliki id yang sama dengan footer
          $pagesData =  Page::hasJob($footer->id)->get();
          $footerTitle = $footer->title;
          $footerTitles[] = [
            'title' => $footerTitle,
            'pages' => $pagesData
        ];
      }
      return view('pages.home',['pageConfigs'=> $pageConfigs,'profile'=>$about,'banner'=>$banner,'lokasi'=>$lokasi,'waktu'=>$waktu,'travel'=>$travel,'kelebihan'=>$kelebihan,'footerTitles'=>$footerTitles,'gallery'=>$gallery,'agent'=>$agent]);
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
  }
