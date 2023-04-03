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
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                        <div class="row">
                            <form class="form">
                                <!-- Your search form code here -->
                            </form>
                        </div>
                        <h1>Manage Your Blog</h1>
                        <table class="table mt-5">
                            <thead>
                            <tr class="table-info rounded-3">
                                <th scope="col">blog_profile</th>
                                <th scope="col">Image_Profile</th>
                                <th scope="col">User_name</th>
                                <th scope="col">Title</th>
                                <th scope="col">Categorie</th>
                                <th scope="col">Poste Posted</th>
                                <th scope="col">View Poste</th>
                                <th scope="col">edit Poste</th>
                                <th scope="col">delete Poste</th>
                            </tr>
                            </thead>

                            @foreach ($blogs as $blog)


                            <tbody class="table-light">
                              <tr>
                                <th class="" scope="row">
                                    <img class="img-profile" src="{{ url('imgs/'.$blog->image) }}" alt="" />

                                  {{-- <img src="{{ url('imgs/'.$user->image) }}" alt="" /> --}}
                                </th>
                                <th class="" scope="row">
                                    @if($blog->image)
                                    <img class="img-profile" src="{{ url('imgs/'.$blog->user->image) }}" alt="" />
                                @else
                                    <img class="img-profile" src="{{ url('imgs/default.jpg') }}" alt="" />
                                @endif
                                  {{-- <img src="{{ url('imgs/'.$user->image) }}" alt="" /> --}}
                                </th>
                                <td>{{$blog->user->name }} {{$blog->user->last_name }}</td>
                                <td>{{$blog->title }} </td>
                                <td>{{$blog->category }} </td>
                                <td>{{ \Carbon\Carbon::parse($blog->created_at)->format('l j F') }}</td>
                                <td><a href="{{ route('blogdetails', ['id' => $blog->id]) }}" class="btn btn-success">View</a></td>
                                <td><a href="{{ route('editblog', ['id' => $blog->id]) }}" class="btn btn-primary">Edit</a></td>
                                <td>

                                    <form method="POST" action="{{ route('deleteblog', ['id' => $blog->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>

                              </tr>
                            </tbody>

                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
