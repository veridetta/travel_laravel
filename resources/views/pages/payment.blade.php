@extends('layouts/layoutMaster')

@section('title', $profile->website_name)

@section('vendor-style')
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/cards-advance.css')}}">
@endsection

@section('vendor-script')
@endsection

@section('page-script')
  <script>
    $('#btnBayar').click(function(){
      var id = '{{$order->id}}';
      var type = '{{$type}}';
      var direct = $('#customRadioTemp1').is(':checked') ? '1' : '0';
      var url = "/post-pembayaran/"+id+"/"+type+"/"+direct;
      window.location.href = url;
    })
  </script>
@endsection

@section('content')

<div class="row">
  <div class="col-12 d-flex justify-content-center p-3">
    <div class="col-md-8">
      <div class="card">
        <div class="card-title">
          <h4 class="card-header">Pilih Metode Pembayaran</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md mb-md-0 mb-2">
              <div class="form-check custom-option custom-option-basic checked">
                <label class="form-check-label custom-option-content" for="customRadioTemp1">
                  <input name="customRadioTemp" class="form-check-input" type="radio" value="" id="customRadioTemp1" checked="">
                  <span class="custom-option-header">
                    <span class="h6 mb-0">Direct Transfer</span>
                  </span>
                  <span class="custom-option-body">
                    <small>Melalui bank transfer.</small>
                  </span>
                </label>
              </div>
            </div>
            <div class="col-md">
              <div class="form-check custom-option custom-option-basic">
                <label class="form-check-label custom-option-content" for="customRadioTemp2">
                  <input name="customRadioTemp" class="form-check-input" type="radio" value="" id="customRadioTemp2">
                  <span class="custom-option-header">
                    <span class="h6 mb-0">Virtual Account</span>
                  </span>
                  <span class="custom-option-body">
                    <small>Melalui virtual account.</small>
                  </span>
                </label>
              </div>
            </div>
            <div class="p-3">
              <div class="col-md mb-md-0 mb-2">
                <div class="form-check custom-option custom-option-basic checked">
                  <label class="form-check-label custom-option-content" for="customCheckTemp3">
                    <input class="form-check-input" type="checkbox" value="" id="customCheckTemp3" checked="true" disabled>
                    <span class="custom-option-header">
                      <span class="h6 mb-0">Catatan</span>
                    </span>
                    <span class="custom-option-body">
                      <p class="m-0">Pembayaran pertama adalah berupa DP sebesar <span class="fw-bold">Rp. 5.000.000</span> dapat dilakukan melalui salah satu metode diatas.</span></p>
                      <p class="m-0">Jika anda sebelumnya telah membayar DP, Sisa pembayaran akan otomatis menyesuaikan sebesar <span class="fw-bold"> {{'Rp ' . number_format($order->total_price - 5000000, 0, ',', '.') }}</span></p>
                    </span>
                  </label>
                </div>
              </div>
            </div>
            <button type="button" id="btnBayar" class="btn btn-warning btn-block mt-3">Bayar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


