@foreach ($data as $tr)
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
                    <small>Tanggal</small>
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
                    <small>Durasi</small>
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
                    <small>Hotel</small>
                  </div>
                </div>
              </div>
            </div>
            <a href="javascript:void(0);" class="btn btn-warning w-100 waves-effect waves-light isOpenUrl" link="/paket/{{$tr->slug}}">Join the event</a>
          </div>
        </div>
      </div>
      @endforeach
      {!! $data->render() !!}
