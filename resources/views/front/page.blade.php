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
                            <li class="breadcrumb-item active">{{$page->name}}</li>
                        </ul>
                    </nav>
                    <h1 class="text-center">{{$page->name}}</h1>
                </div>
            </div>
        </div>
    </div>
    <main>
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 py-3">
                        <h2 class="title-section custom-title">{{get_settings('app_name')}} - <span class="marked">{{$page->title}}</span></h2>
                        <div class="divider"></div>
                        <p class="mb-5">{{$page->description}}</p>
                    </div>
                </div>
            </div> <!-- .container -->
        </div> <!-- .page-section -->
    </main>
@endsection

@section('extra-scripts')

@endsection
