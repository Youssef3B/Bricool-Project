@extends('layouts.app')

@section('content')
<section class="admin">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="left">
            <img src="assets/imgs/team-1.jpg" alt="" />
            <h4 class="text-center fw-bolder">Youssef Ababou</h4>
            <ul>
              <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li><a href="">List Of Users</a></li>
              <li><a href="">List Of Admins</a></li>
              <li><a href="">List Of Services</a></li>
              <li><a href="">Messages</a></li>
              <li><a href="">Add-Admin</a></li>
              <li><a href="">Add-Post</a></li>
              <li><a href="">Manage Your Blog</a></li>
            </ul>
          </div>
        </div>
        @yield('content')




@endsection

