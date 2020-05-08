@extends('layouts.layoutStaff')

@section('content')

    <div class="jumbotron" style="height: 120px">
        <img src="{{asset('img/menu.png')}}" alt="menu" id="menu-toggle">
        <h2>MICRO HOUSING</h2>
        <div>
          <span> Update Residence </span>
        </div>
    </div>

    <div class="container shadow bg-white rounded mb-3">
        <form method="POST" action="{{ route('storeResidenceEdit',$ThisResidence->id)}}">
            @csrf               
          <div class="row mt-3 mb-3">
            <div class="col-sm-12 col-md-6">
              <span>Address : </span>
              <input id="address" type="text" class="form-control" name="address" value="{{ $ThisResidence->address }}" required  autofocus>
              <span>Number Units : </span>
              <input id="numUnits" type="text" class="form-control" name="numUnits" value="{{ $ThisResidence->numUnits }}" required  autofocus>
              <span>Size Per Unit</span>
              <input id="sizePerUnit" type="text" class="form-control" name="sizePerUnit" value="{{ $ThisResidence->sizePerUnit }}" required  autofocus>
              <span>Montly Rental</span>
              <input id="monthlyRental" type="text" class="form-control" name="monthlyRental" value="{{ $ThisResidence->monthlyRental }}" required  autofocus>
            </div>
          </div>
          <button type="submit" class="btn btn-primary mt-2 mb-3 btn-lg">Update</button>
        </form>

    </div>


@endsection