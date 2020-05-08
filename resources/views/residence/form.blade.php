@extends('layouts.layoutStaff')

@section('content')

    <div class="jumbotron" style="height: 120px">
        <img src="{{asset('img/menu.png')}}" alt="menu" id="menu-toggle">
        <h2>MICRO HOUSING</h2>
        <div>
          <span> Setup New Residence </span>
        </div>
    </div>

    <div class="container shadow bg-white rounded mb-3" >
        <form method="POST" enctype="multipart/form-data" action="{{ route('residence')}}">
            @csrf               
          <div class="row mt-3 mb-3">
            <div class="col-sm-12 col-md-6">
              <span>Address : </span>
              <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required  autofocus>
              <span>Number Units : </span>
              <input id="numUnits" type="text" class="form-control" name="numUnits" value="{{ old('numUnits') }}" required  autofocus>
              <span>Size Per Unit</span>
              <input id="sizePerUnit" type="text" class="form-control" name="sizePerUnit" value="{{ old('sizePerUnit') }}" required  autofocus>
              <span>Montly Rental</span>
              <input id="monthlyRental" type="text" class="form-control" name="monthlyRental" value="{{ old('monthlyRental') }}" required  autofocus>
            </div>
            <div class="col-md-2"></div>
           
            <div class="col-md-4 col-sm-12">
              <img src="{{asset('img/photo.png')}}" class="rounded" style="width: 200px;">
              <div class="input-group">
                <div class="custom-file">
                  <label class="custom-file-label" for="input_img">Choose file</label>
                  <input type="file" name="input_img" class="custom-file-input" id="input_img" aria-describedby="inputGroupFileAddon01">
                </div>
              </div> 
            </div>
          </div>

          <button type="submit" class="btn btn-primary mt-2 mb-3 btn-lg">Upload</button>
        </form>

    </div>


@endsection
