@php
$containerNav = $containerNav ?? 'container-fluid';
$navbarDetached = ($navbarDetached ?? '');
@endphp

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
  <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
    <a href="{{url('/')}}" class="app-brand-link gap-2">
      <span class="app-brand-logo" style="width:30px !important; height:30px !important">
        <img src="{{$profile->server}}storage/{{$profile->logo}}" alt="Brand Logo" class="img-fluid">
      </span>
      <span class="app-brand-text demo menu-text fw-bold">{{$profile->website_name}}</span>
    </a>
  </div>
  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
      <i class="ti ti-menu-2 ti-sm"></i>
    </a>
  </div>


  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Search -->
    <div class="navbar-nav align-items-center">
      <div class="nav-item navbar-search-wrapper mb-0">
        <a class="nav-item nav-link search-toggler d-flex align-items-center px-0" href="javascript:void(0);">
          <i class="ti ti-search ti-md me-2"></i>
          <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
        </a>
      </div>
    </div>
    <!-- /Search -->





    <ul class="navbar-nav flex-row align-items-center ms-auto">
      <!-- Notification -->
      <li class="nav-item me-3 me-xl-1">
        <a class="nav-link " href="javascript:void(0);" aria-expanded="false">
          <i class="ti ti-ti-crown ti-md"></i>
          <span>Paket Umroh</span>
        </a>
      </li>
      <!--/ Notification -->

      <!-- User -->
      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          <div class="avatar avatar-online">
            <img src="https://ui-avatars.com/api/?name={{ Auth::user() ? Auth::user()->name : 'Guest' }}?background=0D8ABC&color=fff" alt="" class="h-auto rounded-circle">
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          @if(Auth::user())
            <li>
              <a class="dropdown-item" href="pages-account-settings-account.html">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                      <img src="https://ui-avatars.com/api/?name={{ Auth::user() ? Auth::user()->name : 'Guest' }}?background=0D8ABC&color=fff" alt="" class="h-auto rounded-circle">
                    </div>
                  </div>
                  <div class="flex-grow-1">
                    <span class="fw-medium d-block">{{Auth::user()->name}}</span>
                    <small class="text-muted">{{Auth::user()->hasRole('name')}}</small>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <i class="ti ti-user-check me-2 ti-sm"></i>
                <span class="align-middle">Akun</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <i class="ti ti-shopping-cart me-2 ti-sm"></i>
                <span class="align-middle">Pesanan Saya</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="pages-account-settings-billing.html">
                <span class="d-flex align-items-center align-middle">
                  <i class="flex-shrink-0 fa fa-power-off me-2 fa-sm"></i>
                  <span class="flex-grow-1 align-middle">Logout</span>
                </span>
              </a>
            </li>
          @else
            <li>
              <a class="dropdown-item" href="#">
                <i class="ti ti-share me-2 ti-sm"></i>
                <span class="align-middle">MASUK</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="pages-pricing.html">
                <i class="ti ti-person me-2 ti-sm"></i>
                <span class="align-middle">DAFTAR</span>
              </a>
            </li>
          @endif
        </ul>
      </li>
      <!--/ User -->



    </ul>
  </div>


  <!-- Search Small Screens -->
  <div class="navbar-search-wrapper search-input-wrapper d-none">
    <span class="twitter-typeahead" style="position: relative; display: inline-block;"><input type="text" class="form-control search-input container-xxl border-0 tt-input" placeholder="Search..." aria-label="Search..." autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top;"><pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Public Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: 15px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre><div class="tt-menu navbar-search-suggestion ps" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none;"><div class="tt-dataset tt-dataset-pages"></div><div class="tt-dataset tt-dataset-files"></div><div class="tt-dataset tt-dataset-members"></div><div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div></span>
    <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
  </div>



</nav>
