@extends('layouts.profile')

@section('content')



<section class="admin">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
            <div class="left">
                @if (isset(Auth::user()->image))
                <img class="img-profile" src="{{ url('imgs/'.Auth::user()->image) }}" alt="" />
                  @else
                  <img class="img-profile" src="{{ url('imgs/default.jpg') }}" alt="" />
                  @endif
                <h4 class="text-center fw-bolder">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</h4>
                <ul>


                  <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                  <li><a href="{{ route('listofusers') }}">List Of Users</a></li>
                  <li><a href="{{ route('listofadmins') }}">List Of Admins</a></li>
                  <li><a href="{{ route('listofservices') }}">List Of Services</a></li>
                  <li><a href="{{ route('listofmessages') }}">Messages</a></li>
                  <li><a href="{{ route('test') }}">Add-Admin</a></li>
                  <li><a href="{{ route('test2') }}">Add-Post</a></li>
                  <li><a href="{{ route('manageblog') }}">Manage Your Blog</a></li>
                </ul>
              </div>
        </div>
        <div class="col-lg-9">
            <div class="right">
                <div class="row">
                    <div class="col-lg-10">
                      <h3 class="text-center">Welcome To Bricool</h3>
                      <h5 class="text-center">ACCOUNT Inscription</h5>
                      @if (session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif
                     <form method="post" class="contact-form" action="{{ route('addadmin') }}">
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
                            <div class="form-group">
                                <input type="hidden" name="role" value="admin" required="">
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
                                  <option value="Dyer profession">Dyer profession</option>
                                  <option value="plumber">plumber</option>

                                </select>
                          </div>

                          @if(session('error'))
                                                <div class="alert alert-danger">{{ session('error') }}</div>

                                            @endif
                          <div class="col-md-10 mx-auto mb-4">
                            <div class="form-group">
                              <button type="submit" name="inscription" class="btn btn-success">Add Admin</button>

                              <div class="submitting"></div>

                            </div>

                          </div>
                     </form>

                        </div>

                    </div>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection

