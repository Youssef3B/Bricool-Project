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
            <section class="editaccount">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-10 mx-auto">
                      <div class="cards">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                        <h4>Edit This Post</h4>
                        <div class="container">
                          <div
                            class="col-lg-10 col-lg-offset-2 col-md-10 col-md-offset-2 col-sm-12 col-xs-12 edit_information"
                          >
                            <form action="{{ route('editblog-post', ['id' => $blog->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                              <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                              <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <div class="form-group">
                                    <label class="profile_details_text"
                                      >Title Service:</label
                                    >
                                    <input
                                      type="text"
                                      name="title"
                                      class="form-control"
                                      value="{{ $blog->title }}"
                                      required
                                    />
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2">
                                  <div class="form-group">
                                    <label class="profile_details_text">picture:</label>
                                    <input
                                      type="file"
                                      id="img"
                                      name="image"
                                      accept="image/*"
                                    />
                                  </div>
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
                                      <textarea
                                        class="form-control"
                                        id="exampleFormControlTextarea1"
                                        rows="3" name="description"
                                      >{{ $blog->description }}</textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>


                              <div class="row">
                                <div class="col-md-12 mx-auto mt-4 mb-3">
                                    <select class="form-select" aria-label="Default select example" name="category" required="">
                                        <option disabled value="{{ $blog->category }}">Select Your services</option>
                                        <option value="Business and advisory services">Business and advisory services</option>
                                        <option value="Programming, developing websites and applications">Programming, developing websites and applications</option>
                                        <option value="Design, video and audio">Design, video and audio</option>
                                        <option value="Sales & Marketing">Sales & Marketing</option>
                                        <option value="Writing">Writing</option>
                                        <option value="Dyer profession">Dyer profession</option>
                                        <option value="plumber">plumber</option>

                                      </select>
                                </div>
                              </div>
                              <div class="col-md-12 mx-auto mb-4">
                                <div class="form-group">
                                  <button type="submit" class="btn btn-success">Edit post</button>

                                  <div class="submitting"></div>

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
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection

