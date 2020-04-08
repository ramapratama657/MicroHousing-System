@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Setup new Resident') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('residence')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address </label>
                           
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required  autofocus>
                           
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="numUnits" class="col-md-4 col-form-label text-md-right">Units</label>
                           
                            <div class="col-md-6">
                                <input id="numUnits" type="text" class="form-control @error('numUnits') is-invalid @enderror" name="numUnits" value="{{ old('numUnits') }}" required  autofocus>
                           
                                @error('numUnits')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sizePerUnit" class="col-md-4 col-form-label text-md-right">Unit Size </label>
                           
                            <div class="col-md-6">
                                <input id="sizePerUnit" type="text" class="form-control @error('sizePerUnit') is-invalid @enderror" name="sizePerUnit" value="{{ old('sizePerUnit') }}" required  autofocus>
                           
                                @error('sizePerUnit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="monthlyRental" class="col-md-4 col-form-label text-md-right">Monthly Rental </label>
                           
                            <div class="col-md-6">
                                <input id="monthlyRental" type="text" class="form-control @error('monthlyRental') is-invalid @enderror" name="monthlyRental" value="{{ old('monthlyRental') }}" required  autofocus>
                           
                                @error('monthlyRental')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submmit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
