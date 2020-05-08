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
        <form method="POST" action="{{ route('progApprove',$id)}}">
            @csrf               
          <div class="row mt-3 mb-3">
            <div class="col-sm-12 col-md-6">
              <span>from : </span>
              <input id="fromDate" type="date" class="form-control" name="fromDate" value="{{ old('fromDate') }}" required  autofocus>
              <span>End : </span>
              <input id="endDate" type="Date" class="form-control" name="endDate" value="{{ old('endDate') }}" required  autofocus>
            </div>
          </div>
          <button type="submit" class="btn btn-primary mt-2 mb-3 btn-lg">Allocate</button>
        </form>
    </div>
@endsection

