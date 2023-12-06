<!-- Footer-->
<footer class="content-footer footer bg-footer-theme">
  <div class="d-flex flex-column flex-md-row">
    <div class="col-12 col-md-3 p-3 justify-content-center">
      <div class="d-flex">
        <img class="" height="40px" width="166px" src="{{$profile->credentials->server}}storage/{{$profile->logo}}" alt="Logo">
      </div>
      <div class="">
        <div class="d-flex align-items-center">
          <div class="badge rounded-pill bg-label-warning me-3 p-2"><i class="fa fa-phone fa-lg"></i></div>
          <div class="card-info">
            <h5 class="mb-0">Whatsapp</h5>
            <p class="fw-bold">{{$profile->whatsapp}}</p>
          </div>
        </div>
      </div>
      <div class="">
        <div class="d-flex align-items-center">
          <div class="badge rounded-pill bg-label-warning me-3 p-2"><i class="fa fa-envelope fa-lg"></i></div>
          <div class="card-info">
            <h5 class="mb-0">Email</h5>
            <p class="fw-bold">{{$profile->email}}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row col-12 col-md-9">
      @foreach ($footerTitles as $foot)
      <div class="col-12 col-md-4 p-3">
        <h5>{{$foot['title']}}</h5>
        <ul class="list-unstyled mb-4 mt-3">
          @foreach ($foot['pages'] as $item)
          <li><a class="text-decoration-none text-muted" href="{{$item->slug}}">{{$item->title}}</a></li>
          @endforeach
        </ul>
      </div>
      @endforeach
      <div class="col-12 col-md-4 p-3">
        <h5>Kontak:</h5>
        <ul class="list-unstyled mb-4 mt-3">
          <li class="d-flex align-items-center mb-3"><i class="ti ti-phone-call"></i><span class="fw-medium mx-2 text-heading">Telp:</span> <span>{{$profile->phone}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-brand-twitter"></i><span class="fw-medium mx-2 text-heading">Twitter:</span> <span>{{$profile->twitter}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-mail"></i><span class="fw-medium mx-2 text-heading">Email:</span> <span>{{$profile->email}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-brand-facebook"></i><span class="fw-medium mx-2 text-heading">Facebook:</span> <span>{{$profile->facebook}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-brand-youtube"></i><span class="fw-medium mx-2 text-heading">Youtube:</span> <span>{{$profile->youtube}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-brand-instagram"></i><span class="fw-medium mx-2 text-heading">Instagram:</span> <span>{{$profile->instagram}}</span></li>
        </ul>
      </div>
    </div>
  </div>
  <p class="text-center">&copy; {{ date('Y') }} {{$profile->name}}. Hak Cipta Dilindungi Undang-Undang.</p>
</footer>
<!--/ Footer-->
