@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Apply Resident') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('newApplication',$Residence_id) }}">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="requiredMonth" class="col-md-4 col-form-label text-md-right">Required Month</label>
                           
                            <div class="col-md-6">
                                <input id="requiredMonth" type="text" class="form-control @error('requiredMonth') is-invalid @enderror" name="requiredMonth" value="{{ old('requiredMonth') }}" required  autofocus>
                           
                                @error('requiredMonth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="requiredYear" class="col-md-4 col-form-label text-md-right">Required Year</label>
                           
                            <div class="col-md-6">
                                <input id="requiredYear" type="text" class="form-control @error('requiredYear') is-invalid @enderror" name="requiredYear" value="{{ old('requiredYear') }}" required  autofocus>
                           
                                @error('requiredYear')
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
