@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<section class="inscription">
    <div class="container">
      <div class="cards">
      <div class="row">
        <div class="col-lg-7">
          <h3 class="text-center">Welcome To Bricool</h3>
          <h5 class="text-center">ACCOUNT Inscription</h5>
          <img src="{{ url('imgs/logo.png') }}" class="logo" alt="" />
         <form method="post" class="contact-form" action="{{ route('register') }}">
            @csrf
            <div class="col-md-10 mx-auto">
                <div class="form-group">
                  <label class="label mb-2" for="subject">First Name</label>
                  <input
                    required=""
                    type="text"
                    class="form-control mb-3"
                    name="name"
                    id="first_name"
                    placeholder="Enter Your First Name"

                  />
                </div>
              </div>
              <div class="col-md-10 mx-auto">
                <div class="form-group">
                  <label class="label mb-2" for="#">Last Name</label>
                  <input
                    required=""
                    type="text"
                    class="form-control mb-3"
                    name="last_name"
                    id="last_name"
                    placeholder="Enter Your Last Name"
                  />
                </div>
              </div>
              <div class="col-md-10 mx-auto">
                <div class="form-group">
                  <label class="label mb-2" for="#">Phone Number</label>
                  <input
                    required=""
                    type="tel"
                    class="form-control mb-3"
                    name="tele"
                    id="tele"
                    placeholder="Enter Your Phone Number"
                  />
                </div>
              </div>
              <div class="col-md-10 mx-auto">
                <div class="form-group">
                  <label class="label mb-2" for="#">Email</label>
                  <input
                    required=""
                    type="email"
                    class="form-control mb-3"
                    name="email"
                    id="email"
                    placeholder="Enter Your Email"
                  />
                </div>
              </div>
              <div class="col-md-10 mx-auto">
                <div class="form-group">
                  <label class="label mb-2" for="#">password</label>
                  <input
                    required=""
                    type="password"
                    class="form-control mb-3"
                    name="password"
                    id="password"
                    placeholder="Enter Your password"
                  />
                </div>
              </div>
              <div class="col-md-10 mx-auto">
                <div class="form-group">
                  <label class="label mb-2" for="#">Confirm Password</label>
                  <input
                    required=""
                    type="password"
                    class="form-control mb-3"
                    name="password_confirmation"
                    id="confirmpassword"
                    placeholder="Confirm Your Password"
                  />
                </div>
              </div>
              <div class="col-md-10 mx-auto">
                  <select class="form-select" aria-label="Default select example" name="city" required="">
                      <option selected value="none">Select Your city</option>
                      <option value="Agadir">Agadir</option>
                      <option value="Al Hoceima">Al Hoceima</option>
                      <option value="Azrou">Azrou</option>
                      <option value="Beni Mellal">Beni Mellal</option>
                      <option value="Boujdour">Boujdour</option>
                      <option value="Casablanca">Casablanca</option>
                      <option value="Chefchaouen">Chefchaouen</option>
                      <option value="Dakhla">Dakhla</option>
                      <option value="El Jadida">El Jadida</option>
                      <option value="Erfoud">Erfoud</option>
                      <option value="Essaouira">Essaouira</option>
                      <option value="Fes">Fes</option>
                      <option value="Guelmim">Guelmim</option>
                      <option value="Ifrane">Ifrane</option>
                      <option value="Kenitra">Kenitra</option>
                      <option value="Khenifra">Khenifra</option>
                      <option value="Khouribga">Khouribga</option>
                      <option value="Laayoune">Laayoune</option>
                      <option value="Larache">Larache</option>
                      <option value="Marrakech">Marrakech</option>
                      <option value="Meknes">Meknes</option>
                      <option value="Nador">Nador</option>
                      <option value="Ouarzazate">Ouarzazate</option>
                      <option value="Oujda">Oujda</option>
                      <option value="Rabat">Rabat</option>
                      <option value="Safi">Safi</option>
                      <option value="Sefrou">Sefrou</option>
                      <option value="Settat">Settat</option>
                      <option value="Sidi Ifni">Sidi Ifni</option>
                      <option value="Tangier">Tangier</option>
                      <option value="Tan-Tan">Tan-Tan</option>
                      <option value="Taroudant">Taroudant</option>
                      <option value="Taza">Taza</option>
                      <option value="Tetouan">Tetouan</option>
                      <option value="Zagora">Zagora</option>
                    </select>
              </div>
                <input type="hidden" name="dscription" value="">
                <input type="hidden" name="facebook" value="">
                <input type="hidden" name="instagram" value="">
                <input type="hidden" name="linkden" value="">
                <input type="hidden" name="image" value="">
            <div class="col-md-10 mx-auto mt-4 mb-3">
                  <select class="form-select" aria-label="Default select example" name="servece" required="">
                      <option selected value="none">Select Your services</option>
                      <option value="Business and advisory services">Business and advisory services</option>
                      <option value="Programming, developing websites and applications">Programming, developing websites and applications</option>
                      <option value="Design, video and audio">Design, video and audio</option>
                      <option value="Sales & Marketing">Sales & Marketing</option>
                      <option value="Writing">Writing</option>
                      <option value="Carpenter">Carpenter</option>
                      <option value="Dyer profession">Dyer profession</option>
                      <option value="plumber">plumber</option>
                      <option value="Mechanic">Mechanic</option>

                    </select>
              </div>
              @if(session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
              <div class="col-md-10 mx-auto mb-4">
                <div class="form-group">
                  <button type="submit" name="inscription" class="button">Inscription</button>

                  <div class="submitting"></div>
                  <a class="text-secondary" href="{{ route('login') }}">Login</a>
                </div>

              </div>
              <div class="col-md-10 mx-auto">
                @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
         @enderror


              </div>
         </form>

            </div>
            <div class="col-lg-5">
              <img src="{{ url('imgs/inscription.jpg') }}" class="img-fluid h-100" alt="">
            </div>
        </div>
      </div>
  </div>
    </div>
</section>
@endsection
