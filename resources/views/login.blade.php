@extends('layouts.template')

@section('content')

    <form action="{{ route('login.auth') }}" style="margin-top: 200px" method="POST">
    @csrf
    @if (Session::get('failed'))
        <div class="alert alert-danger">{{ Session::get('failed') }}</div>
    @endif
    @if (Session::get('logout'))
        <div class="alert alert-primary">{{ Session::get('logout') }}</div>
    @endif
    @if (Session::get('canAccess'))
        <div class="alert alert-danger">{{ Session::get('canAccess') }}</div>
    @endif
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
@endsection