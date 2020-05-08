@extends('layouts.layoutLogin')

@section('content')
<form method="POST" action="{{ route('login') }}">
  @csrf
  <div class="row mt-3 mb-3">
    <div class="col-sm-12 col-md-12 mt-3">
      <span>Login 
    </div>
    <div class="col-sm-12 col-md-6 mt-3">
      <span>Username : </span>
      <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

      <span>Password : </span>
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">
      {{ __('Login') }}
  </button>

  <a class="btn btn-link" href="{{ url('register/applicant') }}">
      {{ __('Register') }}
  </a>
</form>
@endsection
