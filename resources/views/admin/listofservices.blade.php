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
                <form class="form" action="{{ route('servicessearch2') }}" method="GET">
                    <button>
                      <svg
                        width="17"
                        height="16"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        role="img"
                        aria-labelledby="search"
                      >
                        <path
                          d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9"
                          stroke="currentColor"
                          stroke-width="1.333"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        ></path>
                      </svg>
                    </button>

                    <input class="input" placeholder="Type your text" required="" type="text" name="query" />

                    <button class="reset" type="reset">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M6 18L18 6M6 6l12 12"
                        ></path>
                      </svg>
                    </button>
                    <button type="submit" class="btn btn-success">Search</button>
                  </form>
                  <div class="row">
                    @if (session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif
                    @foreach ($services as $service)

                    <div class="col-lg-4 mt-4">
                      <div class="cards_service">
                        <div class="up">
                          <img src="{{ url('imgs/'.$service->image_one) }}" alt="" />
                        </div>
                        <div class="down">
                          <div class="d-flex">
                            <div>
                                @if (isset($service->user->image))
                                <img class="img-profile" src="{{ url('imgs/'.$service->user->image) }}" alt="" />
                              @else
                                <img class="img-profile" src="{{ url('imgs/default.jpg') }}" alt="" />
                              @endif
                            </div>
                            <div class="ms-2">
                              <h5 class="p-0 m-0">{{ $service->user->name  }}</h5>
                              <p class="text-secondary p-0 m-0">{{ $service->user->city  }}</p>
                              <p class="p-0 m-0">{{ $service->user->servece  }}</p>
                            </div>
                          </div>
                          <div class="mt-2 pb-2">
                            <h5>{{$service->title }}</h5>
                          </div>
                          <div class="d-flex justify-content-center">
                            <a href="{{ route('details.details', ['id' => $service->id]) }}"
                              ><i class="bx bxs-bullseye text-success"></i
                            ></a>
                            {{-- <a href=""
                              ><i class="bx bx-trash-alt fs-6 text-danger"></i
                            ></a> --}}
                            <form action="{{ route('services.delete', ['service' => $service->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button id="del" type="submit" class=""><i class="bx bx-trash-alt fs-6 text-danger"></i
                                    ></button>
                            </form>

                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach

                  </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection

