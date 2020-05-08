@extends('layouts.layoutStaff')

@section('content')
  <div class="jumbotron" style="height: 160px">
    <img src="{{ asset('img/menu.png') }}" alt="menu" id="menu-toggle">
    <h2>MICRO HOUSING</h2>
    <div>
      <span>Filter : </span>
      <div class="btn-group margin-left2" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-secondary">All</button>
        <button type="button" class="btn btn-secondary">Availability</button>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      @foreach($AllResidences as $ThisResidence)
        <div class="col-12 col-md-4 px-3 mb-1">
                <div class="card">
                  <a href="{{url('/residence/'.$ThisResidence->id)}}">
                    <img class="card-img image-logos margin-top10" 
                        style="width: 50%; position: inherit; margin-left: 20%;"
                        src="{{ asset('img/'.$ThisResidence->img) }}" alt="Card image cap">
                  </a>
                    <div class="card-body">
                       <h6 class="card-title margin-top5">{{$ThisResidence->address}}</h6>
                       <h6 class="card-text margin-top5">{{$ThisResidence->numUnits}} units that can occupy {{$ThisResidence->sizePerUnit}} people.</h6>
                       <h6 class="card-text margin-top5">{{$ThisResidence->monthlyRental}}/Month</h6>
                    </div>
                </div>
            
        </div>

      @endforeach
    </div>
  </div>
@endsection