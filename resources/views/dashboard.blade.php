@extends('layouts.template')

@section('content')

<div class="jumbotron py-5 px-6" style="margin-top: 50px; margin-right: 20px;">
    <h1 class="mb-4">Dashboard</h1>
    <a href="{{ route('home.page') }}" style="text-decoration: none;">Home/</a>
    <a href="" style="text-decoration: none;">Dashboard</a>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card text-bg-primary mb-3">
                <div class="row g-0">
                    <div class="col-md-4 d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z"></path></svg>                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Peserta Didik</h5>
                                <p style="font-size: 20px" class="card-text">{{ $jmlStudent }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-danger mb-3">
                <div class="row g-0">
                    <div class="col-md-4 d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z"></path></svg>                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Administator</h5>
                            <p style="font-size: 20px" class="card-text">{{ $jmlAdmin }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-warning mb-3">
                <div class="row g-0">
                    <div class="col-md-4 d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z"></path></svg>                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Rayon</h5>
                            <p style="font-size: 20px" class="card-text">{{ $jmlRayon }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
          <div class="card text-bg-info mb-3">
              <div class="row g-0">
                  <div class="col-md-4 d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z"></path></svg>                  </div>
                  <div class="col-md-8">
                      <div class="card-body">
                          <h5 class="card-title">Rombel</h5>
                          <p style="font-size: 20px" class="card-text">{{ $jmlRombel }}</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
        <div class="col-md-6">
          <div class="card text-bg-success mb-3">
              <div class="row g-0">
                  <div class="col-md-4 d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z"></path></svg>                  </div>
                  <div class="col-md-8">
                      <div class="card-body">
                          <h5 class="card-title">Pembimbing Siswa</h5>
                          <p style="font-size: 20px" class="card-text">{{ $jmlPs }}</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      
    </div>
</div>
@endsection    