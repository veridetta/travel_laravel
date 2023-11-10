<div class="col-md-3">
  <!-- Berita Terkini & Pengumuman -->
  <div class="card text-center mb-3">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs" role="tablist">
        <li class="nav-item">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-within-card-active" aria-controls="navs-within-card-active" aria-selected="true">Berita Terkini</button>
        </li>
        <li class="nav-item"><button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-within-card-link" aria-controls="navs-within-card-link" aria-selected="false">Pengumuman</button>
        </li>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content p-0 pt-4">
        <div class="tab-pane fade show active" id="navs-within-card-active" role="tabpanel">
          @foreach ($lastArticle as $article)
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
                    <img src="{{$firstImage}}" alt="{{$article->slug}}" class="me-3" height="38" width="38">
                  </div>
                  <div class="d-flex row">
                    <div class="col-12 mb-sm-0 mb-2">
                      <h6 class="mb-0 isOpenUrl  text-start" link="{{ route('news', ['slug' => $article->slug]) }}"><a href="#">{{Str::limit($article->title, 20, '...')}}</a></h6>
                      <small class="text-muted  text-start"><i class="fa fa-calendar"></i> {{$article->date}}</small>
                    </div>
                  </div>
                </div>
              @endforeach
        </div>
        <div class="tab-pane fade" id="navs-within-card-link" role="tabpanel">
          @foreach ($announcement as $an)
          <div class="d-flex mb-3">
            <div class="flex-shrink-0">
              <span class="badge bg-label-primary p-2 rounded"><i class="ti ti-bell ti-sm"></i></span>
            </div>
            <div class="d-flex row">
              <div class="col-12 mb-sm-0 mb-2 px-3">
                <p class="mb-0 text-start"> {{$an->content}}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <!-- / Berita Terkini & Pengumuman-->
  <!-- Infografis -->
  <div class="card mt-3">
    <div class="card-body p-0">
      <div class="swiper" id="swiper-infografis">
        <div class="swiper-wrapper">
          @foreach ($sideBanner as $sd)
          <div class="swiper-slide" style="background-image:url({{$profile->server.'storage/'.$sd->image}})"></div>
          @endforeach
        </div>
        <div class="swiper-button-next swiper-button-white custom-icon">
        </div>
        <div class="swiper-button-prev swiper-button-white custom-icon">
        </div>
      </div>
    </div>
  </div>
  <!-- / Infografis -->
  <!-- Twitter -->
  <div class="card mt-3">
    <div class="card-body">
      <div class="divider divider-primary">
        <div class="divider-text"><h5>Cuitan Terbaru</h5></div>
      </div>
      <a class="twitter-timeline" data-chrome="noheader noborders transparent nofooter" data-width="600" data-height="600"  data-tweet-limit="1" href="https://twitter.com/{{$profile->twitter}}?ref_src=twsrc%5Etfw">Tweets by kemkominfo</a>
    </div>
  </div>
  <!-- / Twitter -->
</div>
