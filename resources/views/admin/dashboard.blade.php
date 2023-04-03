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
              <div class="col-lg-4">
                <div
                  class="cards d-flex align-items-center justify-content-center"
                >
                  <div>
                    <i class="bx bx-user"></i>
                  </div>
                  <div>
                    <h4 class="m-0 p-0">{{ $userCount }}</h4>
                    <p class="m-0 p-0">Freelancer</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div
                  class="cards d-flex align-items-center justify-content-center"
                >
                  <div>
                    <i class="bx bx-briefcase"></i>
                  </div>
                  <div>
                    <h4 class="m-0 p-0">{{ $serviceCount }}</h4>
                    <p class="m-0 p-0">Services</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div
                  class="cards d-flex align-items-center justify-content-center"
                >
                  <div>
                    <i class='bx bxl-blogger'></i>
                  </div>
                  <div>
                    <h4 class="m-0 p-0">{{ $blogCount }}</h4>
                    <p class="m-0 p-0">Postes</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
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
                    @if($user->role)
                    @else

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
                    @endif
                    @endforeach


                  </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection

