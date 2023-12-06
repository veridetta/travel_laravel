
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
<!--
<script src="https://app.midtrans.com/snap/snap.js" data-client-key="{{$clientKey}}"></script>
-->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{$clientKey}}"></script>

  @if($direct)
    <script>
      $('#btnBack').click(function(){
        var id = '{{$payment->id}}';
        var url = "/dashboard/payments/"+id+"/edit";
        window.location.href = url;
      })
    </script>
  @else
<script type="text/javascript">
    $(document).ready(function () {
     //trigger pay-button
     $('#pay-button').trigger('click');
    });
       document.getElementById('pay-button').onclick = function(){
           // SnapToken acquired from previous step
           snap.pay('<?php echo $snap_token?>', {
               // Optional
               onSuccess: function(result){
                   /* You may add your own js here, this is just example */
                   //document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    var id = '{{$payment->id}}';
                    var url = "/update/"+id+"/success";
                    window.location.href = url;
               },
               // Optional
               onPending: function(result){
                   /* You may add your own js here, this is just example */
                   //document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    var id = '{{$payment->id}}';
                    var url = "/update/"+id+"/pending";
                    window.location.href = url;
               },
               // Optional
               onError: function(result){
                   /* You may add your own js here, this is just example */
                   //document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    var id = '{{$payment->id}}';
                    var url = "/update/"+id+"/error";
                    window.location.href = url;
               }
           });
       };
   </script>
  @endif

@endsection

@section('content')

<div class="row">
  <div class="col-12 d-flex justify-content-center p-3">
    <div class="col-md-8">
      @if($direct)
        <div class="card">
          <div class="card-title">
            <h4 class="card-header">Direct Transfer</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md mb-md-0 mb-2">
                <div class="form-check custom-option custom-option-basic checked">
                  <label class="form-check-label custom-option-content" for="customRadioTemp1">
                    <span class="custom-option-header">
                      <span class="h6 mb-0">Silahkan lakukan pembayaran dengan tujuan berikut</span>
                    </span>
                    <span class="custom-option-body">
                      Bank : {{$profile->credentials->bank}}<br>
                      No. Rekening : {{$profile->credentials->no_rek}}<br>
                      Atas Nama : {{$profile->credentials->an}}<br>
                      Jumlah : Rp. {{number_format($sisa, 0, ',', '.')}}<br>
                      <small>Setelah melakukan pembayaran, silahkan klik tombol "Selesai" dibawah ini, lalu unggah bukti bayar.</small>
                    </span>
                  </label>
                </div>
              </div>
              <button type="button" id="btnBack" class="btn btn-warning btn-block mt-3">Selesai</button>
            </div>
          </div>
        </div>
      @else
        <div class="card">
          <div class="card-title">
            <h4 class="card-header">Virtual Account</h4>
          </div>
          <div class="card-body p-3 d-flex justify-content-center">
          <button id="pay-button"></button>
          <pre><div id="result-json">Menghubungkan dengan server...<br></div></pre>
      @endif
    </div>
  </div>
</div>
@endsection
