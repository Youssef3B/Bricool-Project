@extends('layouts.app')

@section('content')

<section class="profile">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="text-center shadow-lg p-3 mb-3 bg-body rounded">
            <img class="img-profile" src="{{ url('imgs/'.$user->image) }}" alt="" />
            <h5 class="mt-2">{{$user->name  }}</h5>
            <p class="mt-2">{{$user->city  }}</p>
            <p class="mt-2">{{$user->servece  }}</p>
            <a href="{{ route('portfolio', ['userId' => $user->id]) }}" class="btn btn-success mt-2">See Portfolio</a>
        </div>
          <div class="shadow-lg p-3 mb-5 bg-body rounded">
            <h5>Description</h5>
            <p>
                @if (!empty($user->dscription))
                <p>{{ $user->dscription }}</p>
            @else
                <p class="fst-italic">this user have no description</p>
            @endif
            </p>
            <h5 class="mt-3">Linked Account</h5>

            <div class="mt-3">
                <p class="fs-4">
                  <a class="text-success" href="{{ $user->facebook }}"
                    ><i class="bx bxl-facebook-circle me-2"></i>Facebook</a
                  >
                </p>
                <p class="fs-4">
                  <a class="text-success" href="{{ $user->instagram }}"
                    ><i class="bx bxl-instagram-alt me-2"></i>Instagram</a
                  >
                </p>
                <p class="fs-4">
                  <a class="text-success" href="{{ $user->email }}"
                    ><i class="bx bxl-gmail me-2"></i>Gmail</a
                  >
                </p>
                <p class="fs-4">
                  <a class="text-success" href=""
                    ><i class="bx bxl-whatsapp me-2"></i>{{ $user->tele }}</a
                  >
                </p>
                <p class="fs-4">
                  <a class="text-success" href="{{ $user->linkden }}"
                    ><i class="bx bxl-linkedin-square me-2"></i>Linkden</a
                  >
                </p>
              </div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="right">
            <h4>{{$user->name  }} Services</h4>
            @foreach ($user->services as $service)
            <a href="{{ route('details.details', ['id' => $service->id]) }}">


            <div class="card">



              <div class="up d-flex">
                <div class="left">
                    <img class="img-profile" src="{{ url('imgs/'.$service->image_one) }}" alt="" />
                </div>
                <div class="right">
                  <i id="heart" class="bx bx-heart"></i>

                  <div class="d-flex mb-3">
                    <div>
                        <a href="{{ route('details.details', ['id' => $service->id]) }}"> <img class="img-profile" src="{{ url('imgs/'.$user->image) }}" alt="" /></a>

                    </div>
                    <div>
                      <a href="{{ route('profiles.profiles', ['id' => $service->user->id]) }}" class="text-success">{{$user->name  }}</a>
                      <p class="fw-bold">{{$user->servece  }}r</p>
                      <p class="text-secondary">{{$user->city  }}</p>
                    </div>
                  </div>
                  <a class="text-black" href="{{ route('details.details', ['id' => $service->id]) }}"><h3 class="fw-bolder">{{$service->title  }}</h3></a>
                  <a class="text-black" href="{{ route('details.details', ['id' => $service->id]) }}"><p>
                    {{ \Illuminate\Support\Str::limit($service->description, $limit = 200, $end = '...') }}
                </p></a>
                </div>
              </div>
             </div>
             </a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection




