@extends('layouts.app')

@section('content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<section class="profile">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="text-center shadow-lg p-3 mb-3 bg-body rounded position-relative">
            <a id="edit-profile" href="{{route('profile.edit',Auth::user()->id)}}"><i class='bx bx-edit' ></i></a>
            @if (isset(Auth::user()->image))
            <img class="img-profile" src="{{ url('imgs/'.Auth::user()->image) }}" alt="" />
              @else
              <img class="img-profile" src="{{ url('imgs/default.jpg') }}" alt="" />
              @endif
            <h5 class="mt-2">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</h5>
            <p class="mt-2">{{ Auth::user()->city }}</p>
            <p class="mt-2">{{ Auth::user()->servece }}</p>
            <a href="{{route('service.create')}}"><button class="btn btn-success mt-2">Ajouter un service</button></a>
            <a href="{{ route('portfolio.create') }}"><button class="btn btn-success mt-2">Ajouter un Portfolio</button></a>

          </div>
          <div class="shadow-lg p-3 mb-5 bg-body rounded">
            <h5>Description</h5>
            <p>
              @if (isset(Auth::user()->dscription))
                {{Auth::user()->dscription}}
              @else
                Aucun description
              @endif
            </p>
            <a href="{{ route("portfolio", ['userId' => auth()->user()->id]) }}" class="btn btn-warning mt-2">See The Portfolio</a>
            <h5 class="mt-3">Linked Account</h5>

            <div class="mt-3">
              <p class="fs-4">
                <a class="text-success" href="{{ Auth::user()->facebook }}"
                  ><i class="bx bxl-facebook-circle me-2"></i>Facebook</a
                >
              </p>
              <p class="fs-4">
                <a class="text-success" href="{{ Auth::user()->instagram }}"
                  ><i class="bx bxl-instagram-alt me-2"></i>Instagram</a
                >
              </p>
              <p class="fs-4">
                <a class="text-success" href=""
                  ><i class="bx bxl-gmail me-2"></i>Gmail</a
                >
              </p>
              <p class="fs-4">
                <a class="text-success" href=""
                  ><i class="bx bxl-whatsapp me-2"></i>{{ Auth::user()->tele }}</a
                >
              </p>
              <p class="fs-4">
                <a class="text-success" href="{{ Auth::user()->linkden }}"
                  ><i class="bx bxl-linkedin-square me-2"></i>Linkden</a
                >
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="right">
            <h4>{{ Auth::user()->name }} {{ Auth::user()->last_name }} Services</h4>
            @foreach ($services as $service)
              <a href="{{ route('details.details', ['id' => $service->id]) }}">
                <div class="card">
                  <div class="up d-flex">
                      <div class="left">
                          <img src="{{ url('imgs/'.$service->image_one) }}" alt="">
                      </div>
                      <div class="right">
                        <i id="heart" class="bx bx-heart"></i>
                        <div class="d-flex mb-3">
                              <div>
                                  @if (isset(Auth::user()->image))
                                      <img src="{{ url('imgs/'.Auth::user()->image) }}" alt="" />
                                  @else
                                      <img src="{{ url('imgs/default.jpg') }}" alt="" />
                                  @endif
                              </div>
                              <div>
                                  <a href="#" class="text-success">{{ Auth::user()->name }}</a>
                                  <p class="fw-bold">{{ Auth::user()->servece }}</p>
                                  <p class="text-secondary">{{ Auth::user()->city }}</p>
                                  <p class="text-secondary">{{ $service->title }}</p>
                              </div>
                          </div>
                          <p>
                            {{ \Illuminate\Support\Str::limit($service->description, $limit = 200, $end = '...') }}
                        </p>
                      </div>
                  </div>
              </div>
              </a>
            @endforeach
{{ $services->links() }}

          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
