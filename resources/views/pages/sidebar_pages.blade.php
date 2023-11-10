<div class="col-md-3">
  <!-- PROFILE -->
  <div class="card">
    <div class="card-body">
      <div class="divider divider-primary">
        <div class="divider-text"><h5>PROFIL {{$profile->name}}</h5></div>
      </div>
      @foreach ($about as $a)
        <p><a href="{{ route('pages', ['slug' => $a->slug]) }}" >
          <i class="fa fa-info-circle"></i> {{$a->title}}
        </a></p>
      @endforeach
    </div>
  </div>
  <!-- / PROFILE -->
  <!-- UNIT KERJA -->
  <div class="card mt-3">
    <div class="card-body">
      <div class="divider divider-primary">
        <div class="divider-text"><h5>UNIT KERJA</h5></div>
      </div>
      @foreach ($unit as $u)
        <p><a href="{{ $u->url }}">
          <i class="fa fa-university"></i> {{$u->unit}}
        </a></p>
      @endforeach
    </div>
  </div>
  <!-- / UNIT KERJA -->
</div>
