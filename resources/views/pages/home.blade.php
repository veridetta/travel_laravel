@extends('layouts/layoutMaster')

@section('title', $profile->website_name)

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
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<script>
   $("#btnCari").click(function(){
    var lokasi = $("#lokasi").val();
    if(lokasi=="Semua Lokasi"){
      lokasi = "semua";
    }else{
      lokasi = lokasi.replace(/\s/g, "-");
    }
    var waktu = $("#waktu").val();
    if(waktu=="Semua Waktu"){
      waktu = "semua";
    }else{
      waktu = waktu.replace(/\s/g, "-");
    }
    var biaya = $("#biaya").val();
    var url = "/cari-paket/semua/"+waktu+"/"+lokasi+"/segera?price="+biaya+"&duration=semua";
    window.location.href = url;
  });
</script>
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <!-- FEATURED BANNER-->
    <div id="swiper-gallery">
      <div class="swiper gallery-top swiper-initialized swiper-horizontal swiper-backface-hidden">
        <div class="swiper-wrapper">
          @foreach ($banner as $ban)
          <?php $ur =$profile->credentials->server.'storage/'.$ban->image;?>
          <div class="swiper-slide isOpenUrl" link="{{$ban->url}}" style="background-image:url('{{$ur}}')"></div>
          @endforeach

        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
      </div>
      <div class="swiper gallery-thumbs  swiper-initialized swiper-horizontal swiper-free-mode swiper-watch-progress swiper-backface-hidden swiper-thumbs">
        <div class="swiper-wrapper">
          @foreach ($banner as $ban)
          <?php $urx = $profile->credentials->server.'storage/'.$ban->image;?>
          <div class="swiper-slide" link="{{$ban->url}}" style="background-image:url('{{$urx}}')"></div>
          @endforeach
        </div>
      </div>
    </div>
    <!-- /FEATURED BANNER-->
    <div class="container row justify-content-center">
      <!-- pencarian-->
      <div class="col-md-10 mt-3">
        <div class="card card-action mb-5">
          <div class="card-alert"></div>
          <div class="card-body">
            <form method="POST">
              @csrf
              <div class="row col-12">
                <div class="col-md-3 col-12">
                  <label for="lokasi">Lokasi Keberangkatan</label>
                  <select class="form-control select2" id="lokasi" name="lokasi">
                    <option value="semua">Semua Lokasi</option>
                    @foreach ($lokasi as $lok)
                    <option value="{{$lok->from}}">{{$lok->from}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3  col-12">
                  <label for="waktu">Waktu Keberangkatan</label>
                  <select class="form-control select2" id="waktu" name="waktu">
                    <option value="semua">Semua Waktu</option>
                    @foreach ($waktu as $wakt)
                    <?php
                    $date1 = date_create($wakt->departure_date);
                    $date = date_format($date1, "M Y");
                    ?>
                    <option value="{{$date}}">{{$date}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3  col-12">
                  <label for="biaya">Biaya</label>
                  <select class="form-control select2" id="biaya" name="biaya">
                    <option value="semua">Semua Biaya</option>
                    <option value="<30000000">< 30jt</option>
                    <option value="30000000-40000000">Rp 30jt - 40jt</option>
                    <option value=">40000000"> Rp 40jt</option>
                  </select>
                </div>
                <div class="col-md-3  col-12">
                  <label>&nbsp;</label><br>
                  <a id="btnCari" href="javascript:void(0);" class="btn btn-warning btn-block form-control">
                    <i class="fa fa-search"></i> Cari Paket Umroh
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="m-4">
          <p>Paket Umroh dengan Keberangkatan Paling Awal</p>
        </div>
        <div class="row">
          @foreach ($travel as $tr)
          <div class="col-md-4 col-xl-4 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <?php $urz =$profile->credentials->server.'storage/'.$tr->travel_banners->first()->path;?>
                <div class="bg-label-primary rounded-3 text-center mb-3 pt-4" style="background-image: url('{{$urz}}');background-position-y:center;background-size:cover;height:120px;">
                </div>
                <h4 class="mb-1">{{$tr->title}}</h4>
                <div class="progress mb-2 position-relative justify-content-end" style="height: 20px">
                  <p class="fw-bold ps-2 pe-2 text-black m-0 justify-content-end d-flex position-absolute w-100">Sisa Seat {{$tr->seat - $tr->pesertas->count()}}</p>
                  <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: {{ ($tr->seat - $tr->pesertas->count()) / $tr->seat * 100 }}%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                  </div>
                </div>
                <div class="d-flex justify-content-between">
                  <p class="text-start"><b>{{$tr->hotels->first()->room_type}},</b><small class="text-muted">Sekamar Ber-{{$tr->hotels->first()->room_capacity}}</small></p>
                  <p class="text-end text-warning fw-bold">{{ number_format($tr->prices->first()->price_dewasa / 1000000, 1, ',', '') }}jt</p>
                </div>
                <div class="row mb-1 g-3">
                  <div class="col-6">
                    <div class="d-flex">
                      <div class="avatar flex-shrink-0 me-2">
                        <span class="avatar-initial rounded bg-label-warning"><i class="ti ti-calendar-event ti-md"></i></span>
                      </div>
                      <div>
                        <h6 class="mb-0 text-nowrap">{{ date('d M y', strtotime($tr->date)) }}</h6>
                        <small>Date</small>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="d-flex">
                      <div class="avatar flex-shrink-0 me-2">
                        <span class="avatar-initial rounded bg-label-warning"><i class="ti ti-clock ti-md"></i></span>
                      </div>
                      <div>
                        <h6 class="mb-0 text-nowrap">{{$tr->duration}} Hari</h6>
                        <small>Duration</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-3 g-3">
                  <div class="col-6">
                    <div class="d-flex">
                      <div class="avatar flex-shrink-0 me-2">
                        <span class="avatar-initial rounded bg-label-warning"><i class="fa fa-plane fa-md"></i></span>
                      </div>
                      <div>
                        <?php $maskapais = \App\Models\Maskapai::find(json_decode($tr->maskapai)[0]); ?>
                        <h6 class="mb-0 text-nowrap">{{$maskapais->name}}</h6>
                        <small>Maskapai</small>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="d-flex">
                      <div class="avatar flex-shrink-0 me-2">
                        <span class="avatar-initial rounded bg-label-warning"><i class="fa fa-star fa-md"></i></span>
                      </div>
                      <div>
                        <h6 class="mb-0 text-nowrap">{{$tr->hotels->first()->stars}}</h6>
                        <small>Hotels</small>
                      </div>
                    </div>
                  </div>
                </div>
                <a href="javascript:void(0);" class="btn btn-warning w-100 waves-effect waves-light isOpenUrl" link="/paket/{{$tr->slug}}" >Join the event</a>
              </div>
            </div>
          </div>
          @endforeach

        </div>
        <div class="col-12 text-center">
          <button class="btn btn-warning btn-lg">Tampilkan Lebih Banyak</button>
        </div>
      </div>
      <!-- gallery jamaah -->
      <div class="col-12 row m-0 p-0">
        <div class="col-12">
          <p class="h3 mb-2">Gallery Jamaah</p>
        </div>
        <div class="gallery_jamaah swiper swiper-initialized swiper-horizontal swiper-backface-hidden" id="swiper-multiple-slides"  data-ride="carousel">
          <div class="swiper-wrapper" id="swiper-wrapper-c59106e7d5dc3b2fd" aria-live="polite" style="transition-duration: 1s; transform: translate3d(0px, 0px, 0px);">
            <?php $no=1;?>
            @foreach ($gallery as $gal)
            <?php $urz = $profile->credentials->server.'storage/'.$gal->image;?>
              <div class="swiper-slide" style="background-image: url('{{$urz}}'); width: 355px; margin-right: 30px;" role="group" aria-label="{{$no}} / {{$gallery->count()}}"></div>
              <?php $no++;?>
            @endforeach
          </div>
          <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
      </div>
      <!-- /gallery jamaah -->
      <!-- Mengapa -->
      <div class="col-12 row bg-gradient mt-4 justify-content-center p-3">
        <div class="col-md-10">
          <p class="h3 mb-2 mt-3 text-warning fw-bold">Mengapa Memilih Kami</p>
          <div class="col-12 mb-4">
            <div class="card card-border-shadow-warning h-100">
              <div class="card-body">
                <div class="col-12 row">
                  @foreach ($kelebihan as $lebih)
                  <div class="col-md-4 p-2">
                    <div class="d-flex align-items-center mb-2 pb-1">
                      <div class="text-center col-12">
                        <img class="img-fluid" src="{{$profile->credentials->server}}storage/{{$lebih->image}}" height="120px" width="120px"/>
                      </div>
                    </div>
                    <p class="h4 mb-1 text-warning text-center fw-bold">{{$lebih->title}} </p>
                    <p class="text-center">{{$lebih->description}}</p>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /Mengapa -->
      <!-- Rekan-->
      <div class="col-12 row m-0 p-0">
        <div class="col-12">
          <p class="h2 fw-bold">Rekan Biro Travel Kami</p>
        </div>
        <div class="swiper swiper-initialized swiper-horizontal swiper-backface-hidden" id="swiper-multiple-slides2">
          <div class="swiper-wrapper" id="swiper-wrapper-c59106e7d5dc3b2fd" aria-live="polite" style="transition-duration: 1s; transform: translate3d(0px, 0px, 0px);">
            <?php $no=1;?>
            @foreach ($agent as $ag)
            <?php $ury = $profile->credentials->server.'storage/'.$ag->logo;?>
              <div class="swiper-slide" style="background-image: url('{{$ury}}'); width: 355px; margin-right: 30px;" role="group" aria-label="{{$no}} / {{$ag->count()}}"></div>
              <?php $no++;?>
            @endforeach
          </div>
          <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
      </div>
      <!-- /Rekan -->
      <div class="col-md-10">
        {!!$profile->about!!}
      </div>
    </div>
  </div>
</div>
@endsection


