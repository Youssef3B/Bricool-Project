@extends('layouts.app')

@section('content')

<section class="editaccount">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <div class="cards">
            <h4>Create Your Portfolio</h4>
            <div class="container">
              <div
                class="col-lg-10 col-lg-offset-2 col-md-10 col-md-offset-2 col-sm-12 col-xs-12 edit_information"
              >
                <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="profile_details_text"
                          >Title Portfolio:</label
                        >
                        <input
                          type="text"
                          name="title"
                          class="form-control"
                          value=""
                          required
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2">
                      <div class="form-group">
                        <label class="profile_details_text">Image:</label>
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
                          ></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label class="profile_details_text"
                            >link Portfolio:</label
                          >
                          <input
                            type="text"
                            name="link"
                            class="form-control"
                            value=""
                            required
                          />
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
                          value="Add"
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
