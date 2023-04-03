@extends('layouts.app')

@section('content')

<div class="accueil">
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <h3>Blog Postes</h3>
            @foreach ($blogs as $blog)

          <div class="cards mt-4">
            <div class="row">
              <div class="col-lg-3">
                <img
                  class="img-fluid h-100"
                  src="{{ url('imgs/'.$blog->image) }}"
                  alt=""
                />
              </div>
              <div class="col-lg-8 p-4">
                <div class="">
                  <div>{{ $blog->category }}</div>
                  <p>{{ \Carbon\Carbon::parse($blog->created_at)->format('l j F') }}</p>

                  <p>{{ $blog->created_at }}</p>
                </div>
                <h4 class="mt-2">
                    {{ $blog->Title }}
                </h4>
                <p>
                    {{ \Illuminate\Support\Str::limit($blog->description, $limit = 200, $end = '...') }}
                    <div>
                  <a href="{{ route('blog.details', ['id' => $blog->id]) }}" class="btn btn-success mt-3">
                    Continue Reading
                  </a>
                  <div class="d-flex align-items-center mt-3">
                    <img id="profile" src="{{ url('imgs/'.$blog->user->image) }}" alt="" />
                    <p class="ms-1">{{ $blog->user->name }} {{ $blog->user->last_name }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          {{ $blogs->links() }}


        </div>

      </div>
    </div>
  </div>


@endsection


