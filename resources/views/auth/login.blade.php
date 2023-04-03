@extends('layouts.app')

{{-- @section('content') --}}

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<section class="login">
    <div class="container">
    <div class="cards">
    <div class="row">
        <div class="col-lg-5">
            <img src="{{ url('imgs/login.jpg') }}" class="img-fluid" alt="" />
        </div>
        <div class="col-lg-7">
            <h3 class="text-center">Wlecome to Bricol</h3>
            <h5 class="text-center">ACCOUNT LOGIN</h5>
            <img src="assets/imgs/" class="logo" alt="">
            <form action="{{ route('login') }}" method="post" id="contactForm" name="" class="contactForm">
            @csrf

            <div class="col-md-10 mx-auto">
                <div class="form-group">
                  <label class="label mb-2" for="subject">Email</label>
                  <input
                    type="email"
                    class="form-control mb-3"
                    name="email"
                    id="email"
                    placeholder="Enter Your Emai"
                    required autocomplete="email" autofocus
                  />
                  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
              </div>
              <div class="col-md-10 mx-auto">
                <div class="form-group">
                  <label class="label mb-2" for="#">Password</label>
                  <input
                    type="password"
                    class="form-control mb-3"
                    name="password"
                    id="password"
                    placeholder="Enter Your Password"
                    required autocomplete="current-password"
                  />

                </div>
              </div>

              <div class="col-md-10 mx-auto">
                <div class="form-group">
                  <button type="submit" class="button">Login</button>


                  <div class="submitting"></div>
                  <a class="text-secondary" href="{{ route('register') }}">inscription</a>
                </div>


              </div>
              <div class="col-md-10 mx-auto">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              </div>
            </div>

          </div>
        </div>
      </div>
  </div>
    </div>
</section>

@endsection
