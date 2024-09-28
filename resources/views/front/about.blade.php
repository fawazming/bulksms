@extends('layouts.front')

@section('title') About @endsection

@section('content')
    <div class="container container-margin-top">
        <div class="page-banner">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-md-6">
                    <nav aria-label="Breadcrumb">
                        <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                            <li class="breadcrumb-item"><a href="{{route('front.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">About</li>
                        </ul>
                    </nav>
                    <h1 class="text-center">About Us</h1>
                </div>
            </div>
        </div>
    </div>
    <main>
        <div class="page-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 py-3">
                        <div class="img-fluid text-center">
                            @if(isset($template->sec_thr_bg_image_file) && $template->sec_thr_bg_image_file)
                                <img src="{{asset('uploads/'.$template->sec_thr_bg_image_file)}}" class="img-fluid" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 py-3 pr-lg-5">
                        <h2 class="title-section">{{isset($template->sec_thr_title)?$template->sec_thr_title:''}}</h2>
                        <div class="divider"></div>
                        <p>{{isset($template->sec_thr_description)?$template->sec_thr_description:''}}</p>
                    </div>
                </div>
            </div> <!-- .container -->
        </div> <!-- .page-section -->
    </main>
@endsection

@section('extra-scripts')

@endsection
