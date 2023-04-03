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

                <form class="form" action="{{ route('users.search') }}" method="GET">
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

                    <input
                        class="input"
                        placeholder="Type your text"
                        required=""
                        type="text"
                        name="query" <!-- add name attribute to input field -->

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
                  @if (session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
              @endif
                <table class="table mt-5">
                    <thead>
                      <tr class="table-info rounded-3">
                        <th scope="col">image_profile</th>
                        <th scope="col">User_name</th>
                        <th scope="col">Categorie</th>
                        <th scope="col">city</th>
                        <th scope="col">Date_Joined</th>
                        <th scope="col">View Profile</th>
                        <th scope="col">Block_user</th>
                      </tr>
                    </thead>
                    @foreach ($users as $user)


                    <tbody class="table-light">
                      <tr>
                        <th class="" scope="row">
                            @if($user->image)
                            <img class="img-profile" src="{{ url('imgs/'.$user->image) }}" alt="" />
                        @else
                            <img class="img-profile" src="{{ url('imgs/default.jpg') }}" alt="" />
                        @endif
                          {{-- <img src="{{ url('imgs/'.$user->image) }}" alt="" /> --}}
                        </th>
                        <td>{{$user->name }}</td>
                        <td>{{ $user->servece }}</td>
                        <td>{{ $user->city }}</td>
                        <td>{{ \Carbon\Carbon::parse($user->created_at)->format('l j F') }}</td>
                        <td>
                          <a href="{{ route('profiles.profiles', ['id' => $user->id]) }}" class="btn btn-success">View Profile</a>
                        </td>
                        <td><form action="{{ route('users.delete', ['user' => $user->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete User</button>
                        </form></td>

                      </tr>
                    </tbody>

                    @endforeach


                  </table>
                  {{ $users->links() }}

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection

