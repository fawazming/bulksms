@extends('layouts.front')

@section('title') Features @endsection

@section('content')
    <div class="container container-margin-top">
        <div class="page-banner">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-md-6">
                    <nav aria-label="Breadcrumb">
                        <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                            <li class="breadcrumb-item"><a href="{{route('front.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Features</li>
                        </ul>
                    </nav>
                    <h1 class="text-center">Features</h1>
                </div>
            </div>
        </div>
    </div>
    <main>
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 py-3">
                        <h2 class="title-section">{{isset($template->sec_seven_title)?$template->sec_seven_title:''}}</h2>
                        <div class="divider"></div>
                        <p class="mb-5">{{isset($template->sec_seven_description)?$template->sec_seven_description:''}}</p>
                    </div>
                    <div class="col-lg-6 py-3">
                        <div class="img-place text-center">
                            @if(isset($template->sec_seven_bg_image_file) && $template->sec_seven_bg_image_file)
                                <img src="{{asset('uploads/'.$template->sec_seven_bg_image_file)}}" class="img-fluid" alt="">
                            @endif
                        </div>
                    </div>
                </div>
            </div> <!-- .container -->
        </div> <!-- .page-section -->

        <div class="page-section">
            <div class="container">
                <div class="text-center">
                    <h2 class="title-section">{{isset($template->main_title)?$template->main_title:''}}</h2>
                    <div class="divider mx-auto"></div>
                </div>

                <div class="row mt-5 text-center">
                    @if(isset($template->sec_four_description) && isset($template->sec_four_title ))
                        @foreach($template->sec_four_description as $key=>$secFourDescription)
                            @foreach($template->sec_four_title as $keyOne=>$secFourtitle)
                                @if($key == $keyOne && $secFourDescription && $secFourtitle)
                                    <div class="col-lg-4 py-3">
                                        <div class="display-3"><span class="mai-list-circle-outline"></span></div>
                                        <h5>{{$secFourtitle}}</h5>
                                        <p>{{$secFourDescription}}</p>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    @endif
                </div>
            </div> <!-- .container -->
        </div> <!-- .page-section -->
    </main>
@endsection

@section('extra-scripts')

@endsection
