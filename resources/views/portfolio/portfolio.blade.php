@extends('layouts.app')

@section('content')


<section class="portfolio">
    <div class="container">
        <div class="row text-center">
            <div class="portfolio-up">
                <h1>{{ $user->name }} {{ $user->last_name }} <span>Portfolio</span></h1>
                <img src="{{ url('imgs/'.$user->image) }}" alt="">
                <h5 class="mt-2">{{ $user->name }} {{ $user->last_name }}</h5>
                <p class="m-0 p-0">{{ $user->servece }}</p>
                <p class="m-0 p-0">{{ $user->city }}</p>
            </div>

            <div class="row mt-5 mb-5">
                @foreach ($user->portfolios as $item)
                <div class="col-lg-4 mt-3">
                    <div type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $item->id }}" class="cards">
                        <img src="{{ asset('imgs/' . $item->image) }}" alt="" class="img-fluid">
                        <div class="overlay">
                            <p>{{ $item->title }}</p>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $item->title }}</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <img src="{{ asset('imgs/' . $item->image) }}" class="img-fluid" alt="">
                            <p class="p-4">{{ $item->description }}</p>
                            <p class="p-4">link this project : <span><a target="_blank" href="https://www.youtube.com/">Click Here</a></span></p>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
            @endforeach
            </div>

    </div>

</section>


@endsection
