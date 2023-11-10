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
</style>
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}">
</script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
@endsection

@section('page-script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{asset('assets/js/ui-carousel.js')}}"></script>
<script>
  var kategori = "semua";
  var biaya = "semua";
  var waktu = "semua";
  var lokasi = "semua";
  var durasi = "semua";
  var filter = "segera";
  $(window).on('hashchange', function() {
    if (window.location.hash) {
      var page = window.location.hash.replace('#', '');
      if (page == Number.NaN || page <= 0) {
        return false;
      }else{
        getData(page);
      }
    }
  });
  $(document).ready(function(){
    $(document).on('click', '.pagination a',function(event){
      event.preventDefault();
      $('li').removeClass('active');
      $(this).parent('li').addClass('active');
      var myurl = $(this).attr('href');
      var page=$(this).attr('href').split('page=')[1];
      getData(page);
    });
  });
  function getData(page){
    var url = "/ajax-paket/"+kategori+"/"+waktu+"/"+lokasi+"/"+filter+"?price="+biaya+"&duration="+durasi+"&page="+page;
    $('#loading-indicator').show();
    $.ajax({
      url: url,
      type: "get",
      datatype: "html"
    })
    .done(function(data){
      $("#tag_container").empty().html(data);
      location.hash = page;
      $('#loading-indicator').hide();
    })
    .fail(function(jqXHR, ajaxOptions, thrownError){
      $('#loading-indicator').hide();
      alert('No response from server');
    });
  }
  $('.btn-reset').click(function(){
    $(".btn-kategori").removeClass("category-active");
    $(".btn-biaya").removeClass("category-active");
    $(".btn-kategori").eq(0).addClass("category-active");
    $(".btn-biaya").eq(0).addClass("category-active");
    $(".departure-select").val(null).trigger('change');
    kategori = "semua";
    biaya = "semua";
    waktu = "semua";
    lokasi = "semua";
    filter = "segera";
    durasi = "semua";
    getData(1);
  });
  $('#filter').change(function(){
    filter = $(this).val();
    getData(1);
  });
  $('#waktu').change(function(){
    waktu = $(this).val();
    getData(1);
  });
  $('.departure-select').select2({
        placeholder: 'Select an item',
        ajax: {
          url: '/get-kota',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.from,
                        id: item.from
                    }
                })
            };
          },
          cache: true
        }
  }).on('change', function() {
      lokasi = $(this).val();
      getData(1);
  });

  $('.btn-kategori').click(function(){
     kategori = $(this).attr("value");
    $(".btn-kategori").removeClass("category-active");
      $(this).addClass("category-active");
      getData(1);
  });
  $('.btn-biaya').click(function(){
     biaya = $(this).attr("value");
    $(".btn-biaya").removeClass("category-active");
      $(this).addClass("category-active");
      getData(1);
  });
  $('.btn-durasi').click(function(){
     durasi = $(this).attr("value");
    $(".btn-durasi").removeClass("category-active");
      $(this).addClass("category-active");
      getData(1);
  });
</script>
@endsection

@section('content')

<div class="row">
  <div class="col-12 d-flex justify-content-center">
    <div class="col-md-2 p-2">
      <div class="card border-warning">
        <div class="card-title">
          <div class="d-flex justify-content-between p-2">
            <span>Filter</span><a href="javascript:viod(0);" class="btn-reset">Reset</a>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="lokasi" class=" fw-bold h5">Lokasi</label>
            <select class="departure-select form-lg form-control" id="get-kota" style="width: 100%;">
            </select>
          </div>
          <div class="form-group">
            <label for="lokasi" class="mb-2 mt-2 fw-bold h5">Kategori Paket</label>
            <button type="button" class="form-control mb-2 form-lg btn-kategori border-warning category-active" value="semua">Semua Kategori</button>
            @foreach ($category as $cat)
            <button type="button" class="form-control mb-2 form-lg btn-kategori border-warning" value="{{$cat->category}}">{{$cat->category}}</button>
            @endforeach
          </div>
          <div class="form-group">
            <label for="biaya" class="mb-2 mt-2 fw-bold h5">Biaya Umroh</label>
            <button type="button" class="form-control mb-2 form-lg btn-biaya border-warning category-active" value="semua">Semua Biaya</button>
            <button type="button" class="form-control mb-2 form-lg btn-biaya border-warning " value="0-30000000"> < 30 jt </button>
            <button type="button" class="form-control mb-2 form-lg btn-biaya border-warning " value="30000000-40000000"> Rp. 30jt - 40jt</button>
            <button type="button" class="form-control mb-2 form-lg btn-biaya border-warning " value="40000000-200000000"> >40jt </button>
          </div>
          <div class="form-group">
            <label for="durasi" class="mb-2 mt-2 fw-bold h5">Durasi</label>
            <button type="button" class="form-control mb-2 form-lg btn-durasi border-warning category-active" value="semua">Semua Durasi</button>
            <button type="button" class="form-control mb-2 form-lg btn-durasi border-warning " value="9"> 9 Hari</button>
            <button type="button" class="form-control mb-2 form-lg btn-durasi border-warning " value="10"> 10 Hari</button>
            <button type="button" class="form-control mb-2 form-lg btn-durasi border-warning " value="11"> 11 Hari </button>
            <button type="button" class="form-control mb-2 form-lg btn-durasi border-warning " value="12"> 12 Hari </button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8 p-2">
      <p class="h3 fw-bold">Paket Umroh</p>
      <div class="card bg-secondary mb-2">
        <div class="card-body">
          <div class="d-flex">
            <div class="col-6 p-2">
              <div class="form-group">
                <select class="form-control form-lg" id="filter">
                  <option value="segera">Keberangkatan Paling Awal</option>
                  <option value="murah">Paling Murah</option>
                  <option value="mahal">Paling Mahal</option>
                </select>
              </div>
            </div>
            <div class="col-6 p-2">
              <div class="form-group">
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
            </div>
          </div>
        </div>
      </div>
      <div id="tag_container">
        @include('pages/ajax')
      </div>
    </div>
  </div>
</div>
<div id="loading-indicator" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.8); z-index: 9999; text-align: center; padding-top: 20%;">
  <div>Loading...</div>
</div>
@endsection


