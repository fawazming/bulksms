@extends('layouts.front')

@section('title') Contact @endsection

@section('content')
    <div class="container container-margin-top">
        <div class="page-banner">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-md-6">
                    <nav aria-label="Breadcrumb">
                        <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                            <li class="breadcrumb-item"><a href="{{route('front.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Contact</li>
                        </ul>
                    </nav>
                    <h1 class="text-center">Contact Us</h1>
                </div>
            </div>
        </div>
    </div>
    <main>
        <div class="page-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 py-3">
                        <h2 class="title-section">Get in Touch</h2>
                        <div class="divider"></div>
                        <p>{{isset($template->sec_thr_description)?$template->sec_thr_description:''}}</p>

                        <ul class="contact-list">
                            <li>
                                <div class="icon"><span class="mai-map"></span></div>
                                <div class="content">{{isset($template->address)?$template->address:''}}</div>
                            </li>
                            <li>
                                <div class="icon"><span class="mai-mail"></span></div>
                                <div class="content"><a href="#">{{isset($template->email)?$template->email:''}}</a></div>
                            </li>
                            <li>
                                <div class="icon"><span class="mai-phone-portrait"></span></div>
                                <div class="content"><a href="#">{{isset($template->phone_number)?$template->phone_number:''}}</a></div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 py-3">
                        <div class="subhead">Contact Us</div>
                        <h2 class="title-section">Drop Us a Line</h2>
                        <div class="divider"></div>

                        <form action="{{route('front.customer.contact.store')}}" method="post">
                            @csrf
                            <div class="py-2">
                                <input type="text" name="name" class="form-control" placeholder="Full name">
                            </div>
                            <div class="py-2">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="py-2">
                                <textarea rows="6" name="message" class="form-control" placeholder="Enter message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-pill mt-4">Send Message</button>
                        </form>
                    </div>
                </div>
            </div> <!-- .container -->
        </div> <!-- .page-section -->
    </main>
@endsection

@section('extra-scripts')

@endsection
