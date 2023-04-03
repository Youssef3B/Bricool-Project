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
                <form class="form">
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
                    />
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
                    <button class="btn btn-success">Search</button>
                  </form>
                <table class="table mt-5">
                    <thead>
                      <tr class="table-info rounded-3">
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">subject</th>
                        <th scope="col">message</th>
                        <th scope="col">Date</th>
                        <th scope="col">Delete This Message</th>
                      </tr>
                    </thead>
                    @if (session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif
                    @foreach ($contacts as $contact)


                    <tbody class="table-light">
                      <tr>

                        <td>{{$contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>{{ \Carbon\Carbon::parse($contact->created_at)->format('l j F') }}</td>
                        <td>
                            <form action="{{ route('contacts.delete', ['contact' => $contact->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete Message</button>
                            </form>
                        </td>



                      </tr>
                    </tbody>

                    @endforeach


                  </table>
                  {{-- {{ $contacts->links() }} --}}

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection

