@extends('layouts.app')

@section('content')

<section class="services">
    <div class="container">
      <h2>Top Bricol freelancers</h2>
      <div class="row">
        <div class="col-lg-4">
          <div class="left">
         <form class="filter-form" action="{{ route('services.filter.ajax') }}" method="get">

            <h5>Filter By</h5>
            <div class="line"></div>
            <input
              type="radio"
              name="servece"
              value="All categories"
            />
            All categories<br />
            <input
                type="radio"
                name="servece"
                value="Business and advisory services"

            />

        Business and advisory services
        <br />
            <input
                type="radio"
                name="servece"
                value="Programming, developing websites and applications"

            />

        Programming, developing websites and applications
        <br />
            <input
                type="radio"
                name="servece"
                value="Design, video and audio"

            />

        Design, video and audio<br />
                <input
                    type="radio"
                    name="servece"
                    value="Sales & Marketing"

                />

            Sales & Marketing<br />
            <input
              type="radio"
              name="servece"
              value="Writing"
            />
            Writing<br />
            <input
              type="radio"
              name="servece"
              value="Dyer profession"
            />
            Dyer profession<br />
            <input
              type="radio"
              name="servece"
              value="Carpenter"
            />
            Carpenter<br />
            <input
              type="radio"
              name="servece"
              value="plumber"
            />
            plumber<br />
            <input
            type="radio"
            name="servece"
            value="Mechanic"

        />

    Mechanic
    <br />
            <input
              type="radio"
              name="servece"
              value="Other"
            />
            Other<br />

            <div class="line"></div>
            <label for="city">Choose a City:</label>
            <select name="cities">
              <option value="All">All</option>
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
          <button type="submit" class="">Search</button>
        </form>

        </div>
        <div class="col-lg-8">
          <div class="right">
            <form class="form" action="{{ route('services.search') }}" method="get">
              <label for="search">
                <input
                  required=""
                  autocomplete="off"
                  placeholder="search"
                  id="search"
                  type="text"
                  name="q"
                />
                <button
                  id="btn-search-nav"
                  class="btn btn-outline-success"
                  type="submit"
                >
                  <i class="bx bx-search-alt-2"></i>
                </button>
                <div class="icon">
                  <svg
                    stroke-width="2"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="swap-on"
                  >
                    <path
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                      stroke-linejoin="round"
                      stroke-linecap="round"
                    ></path>
                  </svg>
                  <svg
                    stroke-width="2"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="swap-off"
                  >
                    <path
                      d="M10 19l-7-7m0 0l7-7m-7 7h18"
                      stroke-linejoin="round"
                      stroke-linecap="round"
                    ></path>
                  </svg>
                </div>
                <button type="reset" class="close-btn">
                  <svg
                    viewBox="0 0 20 20"
                    class="h-5 w-5"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      clip-rule="evenodd"
                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                      fill-rule="evenodd"
                    ></path>
                  </svg>
                </button>
              </label>
            </form>
            {{-- {{ $services->links() }} --}}

            <div class="services-show">

                @foreach ($services as $sevice)
                <a href="{{ route('details.details', ['id' => $sevice->id]) }}">
                    <div class="card">
                        <div class="up d-flex">
                            <div class="left">
                                <img class="img-profile" src="{{ url('imgs/'.$sevice->image_one) }}" alt="" />
                            </div>
                            <div class="right">
                                @if (auth()->check()) <!-- check if the user is logged in -->
                                    <form action="{{ route('favorites.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_service" value="{{ $sevice->id }}">
                                        <i id="heart" class="bx bx-heart"><button id="favor" type="submit"></button></i>
                                    </form>
                                @else
                                    <a id="heart" href="{{ route('login') }}"><i class='bx bxs-bookmark-heart'></i></a>
                                @endif

                                <div class="d-flex mb-3">
                                    <div>
                                        @if (isset($sevice->user->image))
                                            <a href="{{ route('profiles.profiles', ['id' => $sevice->user->id]) }}"><img class="img-profile" src="{{ url('imgs/'.$sevice->user->image) }}" alt="" /></a>
                                        @else
                                            <a href="{{ route('profiles.profiles', ['id' => $sevice->user->id]) }}"><img class="img-profile" src="{{ url('imgs/default.jpg') }}" alt="" /></a>
                                        @endif
                                    </div>
                                    <div>
                                        <a href="{{ route('profiles.profiles', ['id' => $sevice->user->id]) }}" class="text-success">{{$sevice->user->name}}</a>
                                        <p class="fw-bold">{{ $sevice->user->servece }}</p>
                                        <p class="text-secondary">{{ $sevice->user->city }}</p>
                                    </div>
                                </div>
                                <a class="text-black" href="{{ route('details.details', ['id' => $sevice->id]) }}"><h3 class="fw-bolder">{{$sevice->title  }}</h3></a>

                               <a class="text-black" href="{{ route('details.details', ['id' => $sevice->id]) }}"><p>
                                {{ \Illuminate\Support\Str::limit($sevice->description, $limit = 200, $end = '...') }}
                            </p></a>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
            {{ $services->links() }}
          </div>
        </div>
      </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="{{ url("js/filter.js") }}"></script>
@endsection
