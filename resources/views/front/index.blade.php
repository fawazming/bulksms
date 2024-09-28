@extends('layouts.front')

@section('title') Home @endsection

@section('content')
    <div class="page-banner home-banner">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-lg-6 py-3 wow fadeInUp">
                    <h1 class="mb-4">{{isset($template->title)?$template->title:''}}</h1>
                    <p class="text-lg mb-5">{{isset($template->description)?$template->description:''}}</p>
                    <a href="{{route('login')}}" class="btn btn-primary btn-split ml-2 pr-4">Login</a>
                    <a href="{{route('signup')}}" class="btn btn-primary btn-split ml-2 pr-4">Sign Up</a>
                </div>
                <div class="col-lg-6 py-3 wow zoomIn">
                    <div class="img-place">
                        @if(isset($template->bg_image_file_name) && $template->bg_image_file_name)
                            <img src="{{asset('uploads/'.$template->bg_image_file_name)}}" class="img-fluid" alt="">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main>
        <div class="page-section features">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4 py-3 wow fadeInUp">
                        <div class="d-flex flex-row">
                            <div class="img-fluid mr-3">
                                @if(isset($template->first_brand_img) && $template->first_brand_img)
                                    <img src="{{asset('uploads/'.$template->first_brand_img)}}" class="img-fluid" alt="">
                                @endif
                            </div>
                            <div>
                                <h5>{{isset($template->first_brand_title)?$template->first_brand_title:''}}</h5>
                                <p>{{isset($template->first_brand_description)?$template->first_brand_description:''}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 py-3 wow fadeInUp">
                        <div class="d-flex flex-row">
                            <div class="img-fluid mr-3">
                                @if(isset($template->sec_brand_img) && $template->sec_brand_img)
                                    <img src="{{asset('uploads/'.$template->sec_brand_img)}}" class="img-fluid" alt="">
                                @endif
                            </div>
                            <div>
                                <h5>{{isset($template->sec_brand_title)?$template->sec_brand_title:''}}</h5>
                                <p>{{isset($template->sec_brand_description)?$template->sec_brand_description:''}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 py-3 wow fadeInUp">
                        <div class="d-flex flex-row">
                            <div class="img-fluid mr-3">
                                @if(isset($template->thr_brand_img) && $template->thr_brand_img)
                                    <img src="{{asset('uploads/'.$template->thr_brand_img)}}" class="img-fluid" alt="">
                                @endif
                            </div>
                            <div>
                                <h5>{{isset($template->thr_brand_title)?$template->thr_brand_title:''}}</h5>
                                <p>{{isset($template->thr_brand_description)?$template->thr_brand_description:''}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- .container -->
        </div> <!-- .page-section -->

        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 py-3 wow zoomIn">
                        <div class="img-place text-center">
                            @if(isset($template->sec_thr_bg_image_file) && $template->sec_thr_bg_image_file)
                                <img src="{{asset('uploads/'.$template->sec_thr_bg_image_file)}}" class="img-fluid" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 py-3 wow fadeInRight">
                        <h2 class="title-section">{{isset($template->sec_thr_title)?$template->sec_thr_title:''}}</h2>
                        <div class="divider"></div>
                        <p>{{isset($template->sec_thr_description)?$template->sec_thr_description:''}}</p>
                        <a href="{{route('front.about')}}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div> <!-- .container -->
        </div> <!-- .page-section -->

        <div class="page-section">
            <div class="container">
                <div class="text-center wow fadeInUp">
                    <div class="subhead">{{isset($template->section_marketing_tool_main_title)?$template->section_marketing_tool_main_title:''}}</div>
                    <h2 class="title-section">{{isset($template->section_marketing_tool_sub_title)?$template->section_marketing_tool_sub_title:''}}</h2>
                    <div class="divider mx-auto"></div>
                </div>

                <div class="row mt-5 text-center">
                    <div class="col-lg-4 py-3 wow fadeInUp">
                        <div class="display-3">
                            @if(isset($template->first_img_file_name) && $template->first_img_file_name)
                                <img src="{{asset('uploads/'.$template->first_img_file_name)}}" class="img-info" alt="">
                            @endif
                        </div>
                        <h5>{{isset($template->first_title)?$template->first_title:''}}</h5>
                        <p>{{isset($template->first_description)?$template->first_description:''}}</p>
                    </div>
                    <div class="col-lg-4 py-3 wow fadeInUp">
                        <div class="display-3">
                            @if(isset($template->sec_img_file_name) && $template->sec_img_file_name)
                                <img src="{{asset('uploads/'.$template->sec_img_file_name)}}" class="img-info" alt="">
                            @endif
                        </div>
                        <h5>{{isset($template->sec_title)?$template->sec_title:''}}</h5>
                        <p>{{isset($template->sec_description)?$template->sec_description:''}}</p>
                    </div>
                    <div class="col-lg-4 py-3 wow fadeInUp">
                        <div class="display-3">
                            @if(isset($template->thr_img_file_name) && $template->thr_img_file_name)
                                <img src="{{asset('uploads/'.$template->thr_img_file_name)}}" class="img-info" alt="">
                            @endif
                        </div>
                        <h5>{{isset($template->thr_title)?$template->thr_title:''}}</h5>
                        <p>{{isset($template->thr_description)?$template->thr_description:''}}</p>
                    </div>
                </div>
            </div> <!-- .container -->
        </div> <!-- .page-section -->

        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 py-3 wow fadeInLeft">
                        <h2 class="title-section">{{isset($template->sec_seven_title)?$template->sec_seven_title:''}}</h2>
                        <div class="divider"></div>
                        <p class="mb-5">{{isset($template->sec_seven_description)?$template->sec_seven_description:''}}</p>
                        <a href="{{route('front.features')}}" class="btn btn-primary">More Features</a>
                    </div>
                    <div class="col-lg-6 py-3 wow zoomIn">
                        <div class="img-place text-center">
                            @if(isset($template->sec_seven_bg_image_file) && $template->sec_seven_bg_image_file)
                                <img src="{{asset('uploads/'.$template->sec_seven_bg_image_file)}}" class="img-fluid" alt="">
                            @endif
                        </div>
                    </div>
                </div>
            </div> <!-- .container -->
        </div> <!-- .page-section -->

        @if($plans->isNotempty())
            <div class="page-section border-top">
                <div class="container">
                    <div class="text-center wow fadeInUp">
                        <h2 class="title-section">{{isset($template->sec_six_title)?$template->sec_six_title:''}}</h2>
                        <div class="divider mx-auto"></div>
                    </div>

                    <div class="row justify-content-center">
                        @foreach($plans as $key=>$plan)
                            <div class="col-12 col-lg-auto py-3 wow fadeInLeft">
                                <div class="card-pricing {{$key==0?'active':''}}">
                                    <div class="header">
                                        <div class="price-icon"><span class="mai-people"></span></div>
                                        <div class="price-title">{{$plan->title}}</div>
                                    </div>
                                    <div class="body py-3">
                                        <div class="price-tag">
                                            <h2 class="display-4">{{formatNumberWithCurrSymbol($plan->price)}}</h2>
                                            <span class="period">/{{$plan->recurring_type}}</span>
                                        </div>
                                        <div class="price-info">
                                            <p>Contact Limit {{$plan->contact_limit}}</p>
                                            <p>Daily Send Limit {{$plan->daily_send_limit}}</p>
                                            <p>Daily Receive Limit {{$plan->daily_receive_limit}}</p>
                                            <p>Device Limit {{$plan->device_limit}}</p>
                                            <p>Choose the plan that right for you</p>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        @if(auth('customer')->check())
                                            @if(Module::has('PaymentGateway') && Module::find('PaymentGateway')->isEnabled())
                                                <form action="{{route('paymentgateway::process')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$plan->id}}">
                                                    <button type="submit" class="btn btn-outline rounded-pill">Choose Plan</button>
                                                </form>
                                            @endif
                                        @elseif(get_settings('registration_status')=='enable')
                                            <a href="{{route('signup',['plan'=>$plan->id])}}"
                                               class="btn btn-outline rounded-pill">Choose Plan</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div> <!-- .container -->
            </div> <!-- .page-section -->
        @endif

        <div class="page-section bg-light">
            <div class="container">
                <div class="owl-carousel wow fadeInUp" id="testimonials">
                    <div class="item">
                        <div class="row align-items-center">
                            <div class="col-md-6 py-3">
                                <div class="testi-image">
                                    @if(isset($template->first_commenter_img) && $template->first_commenter_img)
                                        <img src="{{asset('uploads/'.$template->first_commenter_img)}}" alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 py-3">
                                <div class="testi-content">
                                    <p>{{isset($template->first_commenter_comment)?$template->first_commenter_comment:''}}</p>
                                    <div class="entry-footer">
                                        <strong>{{isset($template->first_commenter_name)?$template->first_commenter_name:''}}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="row align-items-center">
                            <div class="col-md-6 py-3">
                                <div class="testi-image">
                                    @if(isset($template->sec_commenter_img) && $template->sec_commenter_img)
                                        <img src="{{asset('uploads/'.$template->sec_commenter_img)}}" alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 py-3">
                                <div class="testi-content">
                                    <p>{{isset($template->sec_commenter_comment)?$template->sec_commenter_comment:''}}</p>
                                    <div class="entry-footer">
                                        <strong>{{isset($template->sec_commenter_comment)?$template->sec_commenter_comment:''}}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div> <!-- .container -->
        </div> <!-- .page-section -->

        <div class="page-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 py-3 wow fadeInUp">
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
                    <div class="col-lg-6 py-3 wow fadeInUp">
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
