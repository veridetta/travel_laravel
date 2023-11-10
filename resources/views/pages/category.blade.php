@extends('layouts/layoutMaster')

@section('title', $profile->name)

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
@endsection

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/cards-advance.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/ui-carousel.css')}}" />
<style>
  .scrolling-text-container {
      overflow: hidden;
  }

  .scrolling-text {
      white-space: nowrap;
      animation: scrollText 20s linear infinite;
  }

  @keyframes scrollText {
      0% {
          transform: translateX(90%);
      }
      100% {
          transform: translateX(-90%);
      }
  }
</style>
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}">
</script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/ui-carousel.js')}}"></script>
@endsection

@section('content')

<div class="row">
  <div class="row d-flex">
    <!-- Content-->
    <div class="col-md-9">
      <div class="card mt-3">
        <div class="card-body">
          <div class="divider divider-primary">
            <div class="divider-text"><h5 class="text-uppercase">{{$category->category}}</h5></div>
          </div>
          @foreach ($content as $article)
                    @if(!empty($article->content))
                        @php
                            preg_match('/<img[^>]+src="([^">]+)"/', $article->content, $matches);
                            $firstImage = $matches[1] ?? ''; // Ambil URL gambar pertama atau kosongkan jika tidak ada gambar
                            if($firstImage == ""){
                              $firstImage = asset('assets/img/elements/1.jpg');
                            }else{
                              $firstImage=$firstImage;
                            }
                        @endphp
                    @else
                        @php
                            $firstImage = ''; // Setel ke kosong jika konten kosong
                        @endphp
                    @endif
                    <div class="d-flex mb-3">
                      <div class="flex-shrink-0">
                        <img src="{{$firstImage}}" alt="{{$article->slug}}" class="me-3" height="38">
                      </div>
                      <div class="flex-grow-1 row">
                        <div class="col-7 mb-sm-0 mb-2">
                          <h5 class="mb-0 isOpenUrl" link="{{ route('news', ['slug' => $article->slug]) }}"><a href="#">{{Str::limit($article->title, 50, '...')}}</a></h5>
                          <small class="text-muted"><i class="fa fa-calendar"></i> {{$article->date}}</small>
                          <p class="h6 card-text text-muted">{{ Str::limit(strip_tags($article->content), 120, "...") }}</p>
                        </div>
                        <div class="col-5 text-end">
                          <button class="btn btn-label-secondary btn-icon waves-effect isOpenUrl" link="{{ route('news', ['slug' => $article->slug]) }}"><i class="ti ti-link ti-sm"></i></button>
                        </div>
                      </div>
                    </div>
                  @endforeach
                  <div class="justify-content-center">
                    {{ $content->links('vendor.pagination.bootstrap-5') }}
                </div>

        </div>
      </div>
    </div>
    <!-- / Content-->
    <!--  Siedbar -->
    @include('pages/sidebar_news')
    <!-- / Siedbar -->
  </div>
</div>
@endsection

