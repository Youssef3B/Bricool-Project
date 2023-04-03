@extends('layouts.app')

@section('content')

<section class="editaccount">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <div class="cards">
            <h4>edit Your Service</h4>
            <div class="container">
              <div
                class="col-lg-10 col-lg-offset-2 col-md-10 col-md-offset-2 col-sm-12 col-xs-12 edit_information"
              >
              <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PATCH')
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
                          value="{{ $service->title }}"
                          required
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2">
                      <div class="form-group">
                        <label class="profile_details_text">picture1:</label>
                        <img id="imgser" src="{{ url('imgs/'.$service->image_one) }}" alt="">
                        <input
                          type="file"
                          id="img"
                          name="image_one"
                          accept="image/*"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2">
                      <div class="form-group">
                        <label class="profile_details_text">picture2:</label>
                        <img id="imgser" src="{{ url('imgs/'.$service->image_two) }}" alt="">
                        <input
                          type="file"
                          id="img"
                          name="image_two"
                          accept="image/*"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2">
                      <div class="form-group">
                        <label class="profile_details_text">picture3:</label>
                        <img id="imgser" src="{{ url('imgs/'.$service->image_three) }}" alt="">
                        <input
                          type="file"
                          id="img"
                          name="image_three"
                          accept="image/*"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2">
                      <div class="form-group">
                        <label class="profile_details_text">picture4:</label>
                        <img id="imgser" src="{{ url('imgs/'.$service->image_four) }}" alt="">
                        <input
                          type="file"
                          id="img"
                          name="image_four"
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
                            rows="3"
                            name="description">{{ $service->description }}</textarea
                          >
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div
                      class="col-lg-12 col-md-12 col-sm-12 col-xs-12 submit"
                    >
                      <div class="form-group">
                        <input
                          type="submit"
                          class="btn btn-success mt-3"
                          value="Edit Service"
                          name="edit"
                        />
                      </div>
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

@endsection

