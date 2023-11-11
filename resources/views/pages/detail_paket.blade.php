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
  .category-active{
    background-color: #ffc107 !important;
    color: #fff !important;
    border: none !important;
  }
    swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    swiper-slide img {
      display: block;
      width: 100%;
      height: auto;
      object-fit: cover;
    }
    div#social-links {
                margin: 0 auto;
                max-width: 500px;
            }
            div#social-links ul li {
                display: inline-block;
            }
            div#social-links ul li a {
                padding: 4px;
                border: 1px solid #ccc;
                margin: 1px;
                font-size: 30px;
                color: #fff;
                background-color:#ffc107 ;
            }
</style>
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
@endsection

@section('page-script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
@endsection

@section('content')
<div class="row">
  <div class="col-12 d-flex justify-content-center">
    <div class="col-md-6 p-2 ">
      <div class="card mb-3">
        <div class="card-body">
          <h4 class="mb-1">{{$tr->title}}</h4>
          <swiper-container class="mySwiper" navigation="true" pagination-clickable="true" navigation="true" space-between="30"
          centered-slides="true" autoplay-delay="2500" autoplay-disable-on-interaction="false" auto-height="true">
            @foreach ($tr->travel_banners as $im)
            <?php $urz =$profile->credentials->server.'storage/'.$im->path;?>
            <swiper-slide>:<img src="{{$urz}}"/></swiper-slide>
            @endforeach
          </swiper-container>
          <!--
          <div class="bg-label-primary rounded-3 text-center mb-3 pt-4" style="background-image: url('{{$urz}}');background-position-y:center;background-size:cover;height:120px;">
          </div>
        -->
          <div class="row mb-1 g-3 mt-3">
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
                  <?php $maskapais = \App\Models\Maskapai::find($tr->maskapai[0]); ?>
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
        </div>
      </div>
      <div class="card mb-2 ">
        <div  class="card-body">
          <p class="h3 fw-bold text-warning">Travel Umroh</p>
          <div class="divider pb-2 bg-warning col-2"></div>
          <div class="d-flex flex-wrap">
            <div class="avatar me-2 avatar-xl">
              <img src="https://cloud.umroh.com/images/upload/c_cover,f_auto,dpr_2.0,h_75,w_75,q_80,fl_progressive/cover/f9e6bbb9aa1a263c9dddca176d203e47.jpeg" alt="Avatar" class="rounded-circle">
            </div>
            <div class="ms-1 my-auto">
              <h6 class="mb-0 fw-bold">Global Wisata Idaman</h6>
              <span>6 Penilaian - 115 Terjual</span>
              <span>Izin Umroh : No. 61 Tahun 2020</span>
            </div>
          </div>
        </div>
      </div>
      <!-- PENILAIAN-->
      <div class="card mb-2 ">
        <div  class="card-body">
          <p class="h3 fw-bold text-warning">Penilaian Travel</p>
          <div class="divider pb-2 bg-warning col-2"></div>
          <div class="col-12">
            <p class="m-0">Taufik Ilham - <span class="text-muted">Jakarta</span></p>
            <p class="m-0"><i class="fa fa-star text-warning"></i></p>
            <p class="text-muted">"Alhamdulillah, saya bersama keluarga sangat puas dengan pelayanan dari Global Wisata Idaman. Semoga semakin sukses dan bisa menjadi travel umroh terbaik di Indonesia"</p>
          </div>
        </div>
      </div>
      <!-- fasilitas-->
      <div class="card mb-2 ">
        <div  class="card-body">
          <p class="h3 fw-bold text-warning">Fasilitas</p>
          <div class="divider pb-2 bg-warning col-2"></div>
          <div class="col-12 d-flex">
            <div class="col-md-6 p-2">
              <p style="fw-bold">Termasuk</p>
              {!! $tr->include!!}
            </div>
            <div class="col-md-6 p-2">
              <p style="fw-bold">Tidak Termasuk</p>
              {!! $tr->exclude!!}
            </div>
          </div>
        </div>
      </div>
      <!--HOtel-->
      <div class="card mb-2 ">
        <div  class="card-body">
          <p class="h3 fw-bold text-warning">Hotel</p>
          <div class="divider pb-2 bg-warning col-2"></div>
          <div class="col-12">
            @foreach ($tr->hotels as $ht)
            <p style="fw-bold h6">{{$ht->city}}</p>
            <p style="m-0">{{$ht->name}}</p>
            <p style="fw-bold  h6">{!! $ht->description!!}</p>
            @endforeach
          </div>
        </div>
      </div>
      <!-- MASKAPAI-->
      <div class="card mb-2 ">
        <div  class="card-body">
          <p class="h3 fw-bold text-warning">Maskapai Penerbangan</p>
          <div class="divider pb-2 bg-warning col-2">
          </div>
            <div class="col-12 row">
              @foreach ($tr->maskapai as $i=>$mk)
              <?php $maskapai = \App\Models\Maskapai::find($mk); ?>
              <div class="col-6 p-2">
                <p class="h5">Penerbangan {{$i+1}}</p>
                <div class="row col-12">
                  <div class="col-5 p-2">
                    <img class="img-fluid img-rounded" src="{{$profile->credentials->server."storage/".$maskapai->logo}}"/>
                  </div>
                  <div class="col-6 p-2">
                    {{$maskapai->name}}
                  </div>
                </div>
              </div>
              @endforeach
            </div>
        </div>
      </div>
      <!-- RENCANA-->
      <div class="card mb-2 ">
        <div  class="card-body">
          <p class="h3 fw-bold text-warning">Rencana Perjalanan</p>
          <div class="divider pb-2 bg-warning col-2">
          </div>
            <div class="col-12">
              <ul class="timeline mb-0">
                @foreach($tr->plans as $plan)
                <li class="timeline-item timeline-item-transparent">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header border-bottom mb-3">
                      <span class="h6">Hari Ke {{$plan->day}}</span>
                    </div>
                    <p>{!! $plan->title!!}</p>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
        </div>
      </div>
      <!-- SNK-->
      <div class="card mb-2 ">
        <div  class="card-body">
          <p class="h3 fw-bold text-warning">Syarat & Ketentuan</p>
          <div class="divider pb-2 bg-warning col-2">
          </div>
          <div class="col-12">
            <p class="h5 fw-bold">Syarat & Ketentuan {{$tr->title}}</p>
            <p>{!!$tr->syarats->first()->description!!}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 p-2">
      <div class="card mb-2">
        <div class="card-body">
          <p class="text-warning fw-bold h3">Rp. {{ number_format($tr->prices->first()->price_dewasa, 0, ',', '.') }},00</p>
          <div class="d-flex justify-content-between">
            <p class="text-start"><b>{{$tr->hotels->first()->room_type}},</b><span class="text-muted">Sekamar Ber-{{$tr->hotels->first()->room_capacity}}</span> {{ number_format($tr->prices->first()->price_dewasa / 1000000, 1, ',', '') }}jt</p>
          </div>
          <div class="progress mb-2 position-relative justify-content-end" style="height: 30px">
            <p class="fw-bold ps-2 pe-2 text-white m-0 justify-content-end d-flex position-absolute w-100 h5">Sisa Seat {{$tr->seat - $tr->pesertas->count()}}</p>
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: {{ ($tr->seat - $tr->pesertas->count()) / $tr->seat * 100 }}%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
            </div>
          </div>
          <p class="text-warning mt-2 mb-2">Amankan seat dengan uang muka 5jt /Jamaah. Transaksi aman, ibadah nyaman. Pembayaran hanya diproses apabila tiket pesawat telah confirm.</p>
          <button type="button" class="mb-2 btn btn-warning btn-lg w-100 waves-effect waves-light">Pesan Paket</button>
          <p class="text-muted h4 mb-0">Bagikan :</p>
          <h2 class="text-start">{!!$shareComponent !!}</h2>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


