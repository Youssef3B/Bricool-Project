@extends('layouts.app')

@section('content')

<section class="contact">
    <div class="container">
      <h3>Contact us</h3>
      <div class="row box">

        <div class="col-lg-4 text-white">
          <h3>Let's get in touch</h3>
          <p>We're open for any suggestion or just to have a chat</p>
          <div class="d-flex align-items-center">
            <i class="bx bx-map"></i>
            <p>
              <span>Address:</span> 198 West 21th Street, Suite 721 New York
              NY 10016
            </p>
          </div>
          <div class="d-flex align-items-center">
            <i class="bx bxs-phone"></i>
            <p><span>Phone:</span> + 1235 2355 98</p>
          </div>
          <div class="d-flex align-items-center">
            <i class="bx bxl-telegram"></i>
            <p><span>Email:</span> info@yoursite.com</p>
          </div>
        </div>
        <div class="col-lg-8 bg-white p-5">






            <form method="post" class="contactForm" name="contactForm" id="contactForm" action="{{ route('contact.store') }}">
                @csrf

                <h3 class="mb-4">Get in touch</h3>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="label mb-2" for="name">Full Name</label>
                      <input
                        type="text"
                        class="form-control mb-3"
                        name="name"
                        id="name"
                        placeholder="Name"
                        required=""
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="label mb-2" for="email">Email Address</label>
                      <input
                        type="email"
                        class="form-control"
                        name="email"
                        id="email"
                        placeholder="Email"
                        required=""
                      />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="label mb-2" for="subject">Subject</label>
                      <input
                        type="text"
                        class="form-control mb-3"
                        name="subject"
                        id="subject"
                        placeholder="Subject"
                        required=""
                      />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="label mb-2" for="#">Message</label>
                      <textarea
                        name="message"
                        class="form-control mb-3"
                        id="message"
                        cols="30"
                        rows="4"
                        placeholder="Message"
                        required=""
                      ></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <button type="submit" class="button">Send Message</button>
                      <div class="submitting"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    @if (session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif
                  </div>
                </div>


            </form>






        </div>
      </div>
    </div>
  </section>





@endsection


