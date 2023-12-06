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

</style>
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
@endsection

@section('page-script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection

@section('content')

<div class="row">
  <div class="col-12 d-flex justify-content-center mt-5">
    <div class="col-md-8 p-2">
      <p class="h2 fw-bold text-center">Mengapa di {{$profile->website_name}}</p>

      <div class="d-flex col-12 row">
        @foreach ($kelebihan as $kl)
        <div class="col-lg-6 col-12 text-center">
          <img src="{{$profile->credentials->server.'storage/'.$kl->image}}" class="rounded me-3" height="110" width="140">
          <div class="col-12 ">
            <div class="timeline-header flex-wrap mb-2 mt-3 mt-sm-0">
              <h5 class="mb-0">{{$kl->title}}</h5>
            </div>
            <p>
              {!!$kl->description!!}
            </p>
          </div>
        </div>
        @endforeach
      </div>

      <div class="p-3 mt-4 d-flex justify-content-center">
        <a class="btn btn-warning btn-lg" href="/dashboard/register">
          <span class="align-middle text-white">DAFTAR SEKARANG</span>
        </a>
        <a class="btn btn-outline-warning btn-lg ms-3" href="/register-agent">
          <span class="align-middle text-warning">JOIN PARTNER</span>
        </a>
      </div>
    </div>
    <!--
    <div class="col-md-4">
      <div class="card p-3">
        <div class="card-body">
          <p class="mb-0 fw-bold text-center h4">Assalamualaikum,</p>
          <p class="m-0 text-center">Selamat datang!</p>
          <p class="mt-0 text-center">Masukan data diri Anda</p>
          <form method="POST" action="{{url('register-auth')}}">
            @csrf
            <div class="form-group mb-2">
              <label for="name">Nama</label>
              <input type="text" class="form-control form-control-lg" id="name"  required name="name" placeholder="Nama">
            </div>

            <div class="form-group mb-2">
                <label for="email">Email</label>
                <input type="email" class="form-control form-control-lg" id="email"  required name="email" placeholder="Email">
            </div>

            <div class="form-group mb-2 form-password-toggle">
              <label for="password">Password</label>
              <div class="input-group input-group-merge has-validation">
                <input type="password" class="form-control form-control-lg" required id="password" name="password" placeholder="password">
                <span class="input-group-text cursor-pointer" id="multicol-password2"><i class="ti ti-eye-off"></i></span>
              </div>
          </div>

            <div class="form-group mb-2">
                <label for="phone">No HP</label>
                <div class="input-group input-group-lg">
                  <span class="input-group-text" id="basic-addon1">+62</span>
                    <input type="tel" class="form-control form-lg" required  id="phone" name="phone" placeholder="8122xxxx">
                </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-warning form-control btn-block">Daftar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    -->
  </div>
</div>

@endsection


