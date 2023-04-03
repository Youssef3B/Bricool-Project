@extends('layouts.app')

@section('content')
<section class="services-details">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="up">
            <p class="text-success fw-bold">
              Categorie > <span>{{ $services->user->servece }}</span>
            </p>
            <h2>{{$services->title}}</h2>
            <div class="d-flex align-items-center">
              <a href="{{ route('profiles.profiles', ['id' => $services->user->id]) }}"><img src="{{ url('imgs/'.$services->user->image) }}" alt="" /></a>
              <a href="{{ route('profiles.profiles', ['id' => $services->user->id]) }}">{{$services->user->name  }}</a>
              <p class="mx-1">|</p>
              <p>city ></p>
              <p>{{ $services->user->city }}</p>
            </div>
          </div>
          <div class="gallery">
            <div class="carousel">
              <div class="slide" id="slide1">
                <img src="{{ url('imgs/'.$services->image_one) }}" class="img-slide" />
              </div>
              <div class="slide" id="slide2">
                <img src="{{ url('imgs/'.$services->image_two) }}" class="img-slide" />
              </div>
              <div class="slide" id="slide3">
                <img src="{{ url('imgs/'.$services->image_three) }}" class="img-slide" />
              </div>
              <div class="slide" id="slide4">
                <img src="{{ url('imgs/'.$services->image_four) }}" class="img-slide" />
              </div>
              <a class="prev" onclick="prevSlide()">&#10094;</a>
              <a class="next" onclick="nextSlide()">&#10095;</a>
            </div>
          </div>
          <div class="thumbnails">
            <img
            src="{{ url('imgs/'.$services->image_one) }}"
              onclick="changeImage(0);"
              class="img-thumbnail"
            />
            <img
            src="{{ url('imgs/'.$services->image_two) }}"
              onclick="changeImage(1);"
              class="img-thumbnail"
            />
            <img
            src="{{ url('imgs/'.$services->image_three) }}"
              onclick="changeImage(2);"
              class="img-thumbnail"
            />
            <img
            src="{{ url('imgs/'.$services->image_four) }}"
              onclick="changeImage(3);"
              class="img-thumbnail"
            />
          </div>
          <div class="description mt-3">
            <h3>About This Gig</h3>
            <p class="mb-3">{{ $services->description }}</p>
          </div>
          <div class="about-seller mt-4">
            <h3>About The Seller</h3>
            <div class="">
              <div class="d-flex align-items-center">
                <div>
                  <a href="{{ route('profiles.profiles', ['id' => $services->user->id]) }}"><img id="profile" src="{{ url('imgs/'.$services->user->image) }}" alt="" /></a>
                </div>
                <div>
                    <a class="text-black" href="{{ route('profiles.profiles', ['id' => $services->user->id]) }}">{{$services->user->name  }}</a>
                    <p class="text-secondary">{{$services->user->city  }}</p>
                  <p>{{$services->user->servece  }}</p>
                </div>
              </div>
            </div>
            <div class="cards">
                @if (!empty($services->user->dscription))
                <p>{{ $services->user->dscription }}</p>
            @else
                <p class="fst-italic">this user have no description</p>
            @endif

            </div>
          </div>
          <div id="comments-container" class="comments-services mt-4">
            <h3>Comments</h3>

            @auth
                <form method="POST" action="{{ route('comments.store', $services->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="description">Comment</label>
                        <textarea placeholder="Enter a commentaire" class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success mt-1">Enter a comment</button>
                </form>
            @else
                <p>Please <a href="{{ route('login') }}">login</a> to leave a comment.</p>
            @endauth

            <div class="comments">
                @foreach ($commentaires as $commentaire)
                    <div class="about-seller mt-4">
                        <div class="">
                            <div class="d-flex align-items-center">
                                <div>
                                    <img id="profile" src="{{ url('imgs/'.$commentaire->user->image) }}" alt="" />
                                </div>
                                <div>
                                    <p class="fw-bolder">{{ $commentaire->user->name }}</p>
                                    <p class="text-secondary">{{ $commentaire->user->city }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="cards">
                            <p class="mt-2">{{ $commentaire->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>



      </div>
      <div class="col-lg-4">
        <div class="cards mt-5">
          <h4>Contact Seller</h4>
          <div class="d-flex">
            <div>
                <a href="{{ route('profiles.profiles', ['id' => $services->user->id]) }}"><img id="profile" src="{{ url('imgs/'.$services->user->image) }}" alt="" /></a>
            </div>
            <div>
                <a class="text-black" href="{{ route('profiles.profiles', ['id' => $services->user->id]) }}">{{$services->user->name  }}</a>
                <p>{{ $services->user->servece }}</p>
              <p class="text-secondary">{{ $services->user->city }}</p>
            </div>
          </div>
          <div class="mt-3">
            <p class="fs-4">
              <a target="_blank" class="text-success" href="{{ $services->user->facebook }}"
                ><i class="bx bxl-facebook-circle me-2"></i>Facebook</a
              >
            </p>
            <p class="fs-4">
              <a target="_blank" class="text-success" href="{{ $services->user->instagram }}"
                ><i class="bx bxl-instagram-alt me-2"></i>Instagram</a
              >
            </p>
            <p class="fs-4">
              <a target="_blank" class="text-success" href="{{ $services->user->email }}"
                ><i class="bx bxl-gmail me-2"></i>Gmail</a
              >
            </p>
            <p class="fs-4">
              <a target="_blank" class="text-success" href=""
                ><i class="bx bxl-whatsapp me-2"></i>{{ $services->user->tele }}</a
              >
            </p>
            <p class="fs-4">
              <a target="_blank" class="text-success" href="{{ $services->user->linkden }}"
                ><i class="bx bxl-linkedin-square me-2"></i>Linkden</a
              >
            </p>
          </div>
        </div>
      </div>
  </div>

    </div>

  </section>


  @endsection
