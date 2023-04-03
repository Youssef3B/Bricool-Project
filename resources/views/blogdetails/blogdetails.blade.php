@extends('layouts.app')

@section('content')

<section class="blog">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="cards">
            <div class="up">
              <div class="up_left">
                <img
                  class="img-fluid"
                  src="{{ url('imgs/'.$blogs->image) }}"
                  alt=""
                />
              </div>
              <div>
                {{ $blogs->category }}

                <div
                  class="bg-white p-3 w-100 mt-2 rounded-2 border border-dark"
                >
                  <h3>{{ $blogs->title }}</h3>
                </div>
                <div
                  class="d-flex mt-4 justify-content-between align-items-center"
                >
                  <div class="up-profile d-flex align-items-center">
                    <img
                      class="img-fluid"
                      src="{{ url('imgs/'.$blogs->user->image) }}"
                      alt=""
                    />
                    <p class="fw-bold ms-1">{{ $blogs->user->name }} {{ $blogs->user->last_name }}</p>
                  </div>
                  <div>
                    <p class="fw-bolder">
                      Last Update:
                      <span class="fw-light">{{ $blogs->updated_at }}</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="down mt-4">
              <p>
                {{ $blogs->description }}
              </p>
            </div>
          </div>
          <div class="cards2 mt-4 text-center p-4">
            <img src="{{ url('imgs/'.$blogs->user->image) }}" alt="" />
            <h4 class="mt-2">{{ $blogs->user->name }} {{ $blogs->user->last_name }}</h4>
            <p>{{ $blogs->user->servece }}</p>
            <div>
              <a href="{{ $blogs->user->facebook}}"><i class="bx bxl-facebook-circle"></i></a>
              <a href="{{ $blogs->user->instagram}}"><i class="bx bxl-instagram"></i></a>
              <a href="{{ $blogs->user->linkden}}"><i class="bx bxl-linkedin-square"></i></a>
            </div>
            <p class="">
                {{ $blogs->user->dscription}}
            </p>
            <a href="{{ route('profiles.profiles', ['id' => $blogs->user->id]) }}" class="btn btn-success mt-2">View My Profile</a>
          </div>
          <div class="comments-services mt-4">
            <h3>Comments</h3>

            @auth
                <form method="POST" action="{{ route('comments.blog', $blogs->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="description">Comment</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success mb-4">Add A comment</button>
                </form>
            @else
                <p>Please <a href="{{ route('login') }}">login</a> to leave a comment.</p>
            @endauth

            @foreach ($commentaires as $commentaire)
                <div class="about-seller mt-1 shadow p-3 mb-5 bg-body rounded">
                    <div class="">
                        <div class="d-flex align-items-center">
                            <div>
                                <img id="profile" src="{{ url('imgs/'.$commentaire->user->image) }}" alt="" />
                            </div>
                            <div class="ms-2">
                                <p class="fw-bolder">{{ $commentaire->user->name}}</p>
                                <p class="text-secondary">{{ $commentaire->user->city }}</p>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3">{{ $commentaire->description }}</p>
                </div>
            @endforeach
        </div>

        </div>
        <div class="col-lg-4">
          <div id="pr2" class="profile">
            <div class="text-center shadow-lg p-3 mb-3 bg-body rounded">
              <img class="img-profile" src="{{ url('imgs/'.$blogs->user->image) }}" alt="" />
              <h5 class="mt-2">{{ $blogs->user->name}} {{ $blogs->user->last_name}}</h5>
              <p class="mt-2">{{ $blogs->user->city}}</p>
              <p class="mt-2">{{ $blogs->user->servece}}</p>
            </div>
            <div class="shadow-lg p-3 mb-5 bg-body rounded">
              <h5>Description</h5>
              <p>
                {{ $blogs->user->dscription}}
              </p>
              <h5 class="mt-3">Linked Account</h5>

              <div class="mt-3">
                <p class="fs-4">
                  <a class="text-success" href="{{ $blogs->user->facebook}}"
                    ><i class="bx bxl-facebook-circle me-2"></i>Facebook</a
                  >
                </p>
                <p class="fs-4">
                  <a class="text-success" href="{{ $blogs->user->instagram}}"
                    ><i class="bx bxl-instagram-alt me-2"></i>Instagram</a
                  >
                </p>
                <p class="fs-4">
                  <a class="text-success" href="{{ $blogs->user->email}}"
                    ><i class="bx bxl-gmail me-2"></i>Gmail</a
                  >
                </p>
                <p class="fs-4">
                  <a class="text-success" href=""
                    ><i class="bx bxl-whatsapp me-2"></i>{{ $blogs->user->tele}}</a
                  >
                </p>
                <p class="fs-4">
                  <a class="text-success" href="{{ $blogs->user->linkden}}"
                    ><i class="bx bxl-linkedin-square me-2"></i>Linkden</a
                  >
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



@endsection






