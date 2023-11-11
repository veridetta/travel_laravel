<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Faq;
use App\Models\Footer;
use App\Models\HowToAgent;
use App\Models\Kelebihan;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
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
    $kelebihan = Kelebihan::get();
    return view('pages.register',['pageConfigs'=> $pageConfigs,'profile'=>$about,'footerTitles'=>$footerTitles,'kelebihan'=>$kelebihan]);
    }
    public function register_agent(){
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
    $kelebihan = HowToAgent::get()->sortBy('order');
    $faq = Faq::where('jenis','agent')->get();
    return view('pages.register-agent',['pageConfigs'=> $pageConfigs,'profile'=>$about,'footerTitles'=>$footerTitles,'kelebihan'=>$kelebihan,'faq'=>$faq]);
    }
}
