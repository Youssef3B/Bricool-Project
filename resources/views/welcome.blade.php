@extends('layouts.app')

@section('content')
            <!-----------------------------------------------NAVBAR------------------------------------>
            {{-- <header>
                <nav class="navbar navbar-expand-lg position-fixed w-100 top-0">
                    <div class="container">
                        <a class="navbar-brand" href="#"
                            ><img src="{{ url('imgs/logo.png') }}" alt=""
                        /></a>
                        <button
                            class="navbar-toggler"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                        >
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div
                            class="collapse navbar-collapse"
                            id="navbarSupportedContent"
                        >
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item">
                                    <a
                                        class="nav-link active"
                                        aria-current="page"
                                        href="index.html"
                                        ><i class="bx bxs-home-alt-2 me-1"></i
                                        >Home</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="services.html"
                                        ><i class="bx bxs-briefcase me-1"></i
                                        >Services</a
                                    >
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html"
                                        ><i class="bi bi-person-lines-fill me-1"></i
                                        >Contact</a
                                    >
                                </li>
                            </ul>
                            <form class="d-flex" role="search">
                                <input
                                    class="form-control"
                                    type="search"
                                    placeholder="Search"
                                    aria-label="Search"
                                />
                                <button
                                    id="btn-search-nav"
                                    class="btn btn-outline-success"
                                    type="submit"
                                >
                                    <i class="bx bx-search-alt-2"></i>
                                </button>
                            </form>
                            <a
                                href="{{ route('auth.login') }}"
                                class="btn btn-outline-success ms-2"
                                >Login</a
                            >
                            <a
                                href="{{ route('auth.register') }}"
                                class="btn btn-outline-success ms-2"
                                >inscription</a
                            >


                        </div>
                    </div>
                </nav>
            </header> --}}
            <!-----------------------------------------------HERO-SECTION------------------------------------>
            <section class="hero_section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <h1>
                                    FIND THE BEST <span>FREELANCE</span> SERVICES
                                    FOR YOUR BUSINESS.
                                </h1>
                                <form action="{{ route('services.search') }}" method="get">
                                    <div class="input-group mb-3">
                                        <i class="bx bx-search-alt-2"></i>
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="What service are you looking for today?"
                                            aria-label="Recipient's username"
                                            aria-describedby="basic-addon2"
                                            name="q"
                                        />
                                        <button type="submit" class="btn btn-success">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-----------------------------------------------END-HERO-SECTION------------------------------------>
            <!-----------------------------------------------Most Wanted Services-SECTION------------------------------------>
            <section class="services-home">
                <div class="container">
                    <h2>Most Wanted Services</h2>
                    <div class="row slick_slide">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="cards">
                                <img
                                    src="{{ url('imgs/designer.jpg') }}"
                                    alt=""
                                    class="img-fluid"
                                />
                                <div class="overlay_cards">
                                    <h3>Motion Design</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="cards">
                                <img
                                    src="{{ url('imgs/dyer.png') }}"
                                    alt=""
                                    class="img-fluid"
                                />
                                <div class="overlay_cards">
                                    <h3>Dyer profession</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="cards">
                                <img
                                    src="{{ url('imgs/njar.jpg ')}}"
                                    alt=""
                                    class="img-fluid"
                                />
                                <div class="overlay_cards">
                                    <h3>Carpenter</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="cards">
                                <img
                                    src="{{ url('imgs/plombier.jpg') }}"
                                    alt=""
                                    class="img-fluid"
                                />
                                <div class="overlay_cards">
                                    <h3>plumber</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="cards">
                                <img
                                    src="{{ url('imgs/video editing.jpg') }}"
                                    alt=""
                                    class="img-fluid"
                                />
                                <div class="overlay_cards">
                                    <h3>Video Editing</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="cards">
                                <img
                                    src="{{ url('imgs/web development.jpg') }}"
                                    alt=""
                                    class="img-fluid"
                                />
                                <div class="overlay_cards">
                                    <h3>
                                        Programming, developing websites and
                                        applications
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-----------------------------------------------END-Most Wanted Services-SECTION------------------------------------>
            <!-----------------------------------------------Start About------------------------------------>
            <section class="about">
                <div class="container">
                    <h2 class="text-center">
                        DO YOU HAVE WORK YOU WANT TO GET DONE?
                    </h2>
                    <div class="row mt-5">
                        <div class="col-lg-6">
                            <div class="mt-3">
                                <h5>
                                    <span><i class="bx bx-check"></i></span>Quality
                                    services for all budgets
                                </h5>
                                <p class="">
                                    Find high quality services at all price points.
                                    No hourly rates, but pricing based on projects.
                                </p>
                            </div>
                            <div class="mt-3">
                                <h5>
                                    <span><i class="bx bx-check"></i></span>Choose
                                    the right freelancer
                                </h5>
                                <p>
                                    Compare offers of freelancers, browse their
                                    files, reviews and works, negotiate with them
                                    via messages and choose the best one to
                                    implement your project.
                                </p>
                            </div>
                            <div class="mt-3">
                                <h5>
                                    <span><i class="bx bx-check"></i></span>Receive
                                    the project
                                </h5>
                                <p>
                                    The freelancer you choose will work on your
                                    project and follow up with you until you have
                                    the agreed work results and project delivery.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <iframe
                                src="https://www.youtube.com/embed/yduoGZhxpO8?"
                            >
                            </iframe>
                        </div>
                    </div>
                </div>
            </section>
            <!-----------------------------------------------End About------------------------------------>
            <!----------------------------------------------- About Helper------------------------------------>
            <section class="about_help">
                <div class="container">
                    <h2 class="text-center">
                        HOW A FREELANCER HELPS YOU GET YOUR BUSINESS DONE
                    </h2>
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 mt-4">
                            <div class="cards text-center">
                                <img
                                    src="{{ url('imgs/iconehelper1.svg')}}"
                                    alt=""
                                    class="img-fluid"
                                />
                                <h5 class="text-center">
                                    Get your work done quickly and easily
                                </h5>
                                <p class="text-center">
                                    Find the best professional freelancers
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mt-4">
                            <div class="cards text-center">
                                <img
                                    src="{{ url('imgs/iconehelper2.svg') }}"
                                    alt=""
                                    class="img-fluid"
                                />
                                <h5 class="text-center">
                                    Hire the best freelancers
                                </h5>
                                <p class="text-center">
                                    Browse the profiles of freelancers, see their
                                    skills, work, and customer ratings, and choose
                                    the most suitable one
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mt-4">
                            <div class="cards text-center">
                                <img
                                    src="{{ url('imgs/iconehelper3.svg') }}"
                                    alt=""
                                    class="img-fluid"
                                />
                                <h5 class="text-center">
                                    Do your projects a set bit lower
                                </h5>
                                <p class="text-center">
                                    Determine the appropriate budget for your
                                    project and choose among the expert freelancers
                                    to work on achieving the required
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mt-4">
                            <div class="cards text-center">
                                <img
                                    src="{{ url('imgs/iconehelper4.svg') }}"
                                    alt=""
                                    class="img-fluid"
                                />
                                <h5 class="text-center">
                                    Pay comfortably and securely
                                </h5>
                                <p class="text-center">
                                    Pay the value of the required work through
                                    secure payment methods with full guarantee of
                                    your financial rights
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mt-4">
                            <div class="cards text-center">
                                <img
                                    src="{{ url('imgs/iconehelper5.svg') }}"
                                    alt=""
                                    class="img-fluid"
                                />
                                <h5 class="text-center">Cover your skill needs</h5>
                                <p class="text-center">
                                    Hire experts in different fields to implement
                                    the projects you need
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mt-4">
                            <div class="cards text-center">
                                <img
                                    src="{{ url('imgs/iconehelper6.svg') }}"
                                    alt=""
                                    class="img-fluid"
                                />
                                <h5 class="text-center">Guarantee your rights</h5>
                                <p class="text-center">
                                    Fully preserve your rights, as an independent
                                    site plays the role of mediator between you and
                                    the freelancer
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-----------------------------------------------End About-Helper------------------------------------>
            <!----------------------------------------------- Categories------------------------------------>
            <section class="categories_home">
                <div class="container">
                    <h3 class="text-center">Find freelancers in all fields</h3>
                    <div class="row">
                        <div class="col-lg-3 col-sm-4 xs-6 mt-4">
                            <div class="cards text-center">
                                <img
                                    src="{{ url('imgs/offer1.svg') }}"
                                    alt=""
                                    class="img-fluid"
                                />
                                <div class="line"></div>
                                <p>Graphics & Design</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-4 xs-6 mt-4">
                            <div class="cards text-center">
                                <img
                                    src="{{ url('imgs/offer2.svg') }}"
                                    alt=""
                                    class="img-fluid"
                                />
                                <div class="line"></div>
                                <p>Digital Marketing</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-4 xs-6 mt-4">
                            <div class="cards text-center">
                                <img
                                    src="{{ url('imgs/offer3.svg') }}"
                                    alt=""
                                    class="img-fluid"
                                />
                                <div class="line"></div>
                                <p>Video & Animation</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-4 xs-6 mt-4">
                            <div class="cards text-center">
                                <img
                                    src="{{ url('imgs/offer4.svg') }}"
                                    alt=""
                                    class="img-fluid"
                                />
                                <div class="line"></div>
                                <p>Photography</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-4 xs-6 mt-4">
                            <div class="cards text-center">
                                <img
                                    src="{{ url('imgs/offer5.svg') }}"
                                    alt=""
                                    class="img-fluid"
                                />
                                <div class="line"></div>
                                <p>Programming & Tech</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-4 xs-6 mt-4">
                            <div class="cards text-center">
                                <img
                                    src="{{ url('imgs/offer6.svg') }}"
                                    alt=""
                                    class="img-fluid"
                                />
                                <div class="line"></div>
                                <p>Business</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-4 xs-6 mt-4">
                            <div class="cards text-center">
                                <img
                                    src="{{ url('imgs/offer7.svg') }}"
                                    alt=""
                                    class="img-fluid"
                                />
                                <div class="line"></div>
                                <p>Digital Marketing</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-4 xs-6 mt-4">
                            <div class="cards text-center">
                                <img
                                    src="{{ url('imgs/offer8.svg') }}"
                                    alt=""
                                    class="img-fluid"
                                />
                                <div class="line"></div>
                                <p>Music & Audio</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!----------------------------------------------- END-Categories------------------------------------>
            <!----------------------------------------------- FAQ------------------------------------>
            <section class="faq">
                <div class="container">
                    <h3 class="text-center">COMMON QUESTIONS</h3>
                    <div class="row">
                        <div class="accordion">
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <h2>What type of services are you planning to sell on your website?</h2>
                                    <span class="icon">+</span>
                                </div>
                                <div class="accordion-content">
                                    <p>
                                        It is important to have a clear idea of the types of services you plan to offer. This will help you determine the layout, design, and content of your website.
                                    </p>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <h2>How will you market your website and services to potential customers?</h2>
                                    <span class="icon">+</span>
                                </div>
                                <div class="accordion-content">
                                    <p>
                                        You can use a variety of digital marketing tactics, such as SEO, social media advertising, and email marketing. It's important to have a solid marketing strategy in place to ensure your website gets the visibility it needs.
                                    </p>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <h2>How will you handle customer support and inquiries?</h2>
                                    <span class="icon">+</span>
                                </div>
                                <div class="accordion-content">
                                    <p>
                                        You will need to have a system in place for handling customer inquiries and support requests. This could include an email address, live chat support, or a phone number for customers to call.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!----------------------------------------------- END-FAQ------------------------------------>
            <!----------------------------------------------- JOIN-Us------------------------------------>
            <section class="join_us">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="cards">
                                <h3>
                                    FIND THE BEST FREELANCE SERVICES FOR YOUR
                                    BUSINESS.
                                </h3>
                                <a
                                    class="btn btn-success w-25 mt-1"
                                    href="{{ route('register') }}"
                                    >JOIN US</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!----------------------------------------------- END-JOIN-Us------------------------------------>


@endsection
