@extends('layouts.app')

@section('content')

<section class="editaccount">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <div class="cards">
            <h4>Edit Your Account</h4>
            <h5>personal information</h5>
            <div class="container">
              <div
                class="col-lg-10 col-lg-offset-2 col-md-10 col-md-offset-2 col-sm-12 col-xs-12 edit_information"
              >
              @if (session('error'))
                    <div class="alert alert-danger mt-3">
                        {{ session('error') }}
                    </div>
                @endif
              <form action="{{route('profile.update',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @if (isset(Auth::user()->image))
                <img  class="img-profile" src="{{ url('imgs/'.Auth::user()->image) }}" alt="" />
                @else
                <img class="img-profile" src="{{ url('imgs/default.jpg') }}" alt="" />
                @endif
                <img src="" class="mt-3 mb-3" alt=""/><br />
                <input type="file" name="image"  id="">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group">
                        <label class="profile_details_text"
                          >First Name:</label
                        >
                        <input
                          type="text"
                          name="first_name"
                          class="form-control"
                          value="{{Auth::user()->name}}"
                          required
                        />
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group">
                        <label class="profile_details_text"
                          >Last Name:
                        </label>
                        <input
                          type="text"
                          name="last_name"
                          class="form-control"
                          value="{{Auth::user()->last_name}}"
                          required
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="profile_details_text"
                          >Email Address:</label
                        >
                        <input
                          type="email"
                          name="email"
                          class="form-control"
                          value="{{Auth::user()->email}}"
                          required
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="profile_details_text"
                          >Confirm Your Password:</label
                        >
                        <input
                          type="password"
                          name="password"
                          class="form-control"
                          value=""
                          required
                        />
                      </div>
                    </div>
                  </div>
                  {{-- <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="profile_details_text"
                          >Enter You New Password:</label
                        >
                        <input
                          type="password"
                          name="new_password"
                          class="form-control"
                          value=""
                          required
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="profile_details_text"
                          >Confirm You New Password:</label
                        >
                        <input
                          type="password"
                          name="password_confirmation"
                          class="form-control"
                          value=""
                          required
                        />
                      </div>
                    </div>
                  </div> --}}
                  <div class="row">
                    <div class="col-lg-12 mx-auto mt-4 mb-3">
                      <select name="service" class="form-select" aria-label="Default select example">
                        <option selected value="none">
                          Select Your services
                        </option>
                        <option selected value="{{Auth::user()->servece}}">
                          {{Auth::user()->servece}}
                        </option>
                        <option value="Business and advisory services">
                          Business and advisory services
                        </option>
                        <option
                          value="Programming, developing websites and applications"
                        >
                          Programming, developing websites and applications
                        </option>
                        <option value="Design, video and audio">
                          Design, video and audio
                        </option>
                        <option value="Sales & Marketing">
                          Sales & Marketing
                        </option>
                        <option value="Writing">Writing</option>
                        <option value="Dyer profession">
                          Dyer profession
                        </option>
                        <option value="plumber">plumber</option>
                        <option value="Mechanic">Mechanic</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 mx-auto">
                      <select name="city"
                        class="form-select"
                        aria-label="Default select example"
                      >
                        <option selected value="none">
                          Select Your city
                        </option>
                        <option selected value="{{Auth::user()->city}}">
                          {{Auth::user()->city}}
                        </option>
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
                  </div>
                  <div class="row">
                    <div class="col-md-12 mx-auto mt-4">
                      <div class="form-group">
                        <div class="mb-3">
                          <label
                            for="exampleFormControlTextarea1"
                            class="form-label"
                            >Description</label
                          >
                          <textarea name="dscription" class="form-control" id="exampleFormControlTextarea1" rows="3">{{Auth::user()->dscription}}
                          </textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="profile_details_text"
                          >Lien Facebook Account:</label
                        >
                        <input
                          type="text"
                          name="facebook"
                          class="form-control"
                          value="{{Auth::user()->facebook}}"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="profile_details_text"
                          >Lien Instagram Account:</label
                        >
                        <input
                          type="text"
                          name="instagram"
                          class="form-control"
                          value="{{Auth::user()->instagram}}"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="profile_details_text"
                          >Lien Linkden Account:</label
                        >
                        <input
                          type="text"
                          name="linkden"
                          class="form-control"
                          value="{{Auth::user()->linkden}}"
                        />
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="profile_details_text"
                          >Telephone :</label
                        >
                        <input
                          type="text"
                          name="tele"
                          class="form-control"
                          value="{{Auth::user()->tele}}"
                        />
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div
                      class="col-lg-12 col-md-12 col-sm-12 col-xs-12 submit"
                    >
                      <div class="form-group">
                        <input
                          type="submit"
                          class="btn btn-success mt-3"
                          value="save"
                        />
                      </div>
                    </div>
                  </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
