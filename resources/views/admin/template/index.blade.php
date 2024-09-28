@extends('layouts.admin')

@section('title',trans('admin.template'))

@section('extra-css')

@endsection

@section('content')
    @php $template = json_decode(get_settings('template')); @endphp
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form method="post" role="form" id="planForm" action="{{route('admin.template.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="custom_body">
                            <div class="card-header">
                                <div class="card-title font-title">@lang('admin.section_banner')</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title">{{trans('admin.form.title')}}</label>
                                            <input value="{{isset($template->title)?$template->title:''}}" type="text" name="title" class="form-control" id="title"
                                                   placeholder="{{trans('admin.form.title')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="profile">@lang('admin.background_image') <span class="text-danger">(@lang('admin.expecting_image_size'): 400px by 343px)</span> </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="bg_image" type="file" class="custom-file-input" id="profile">
                                                    <label class="custom-file-label" for="profile">@lang('admin.form.input.choose_file')</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="description">@lang('admin.description')</label>
                                            <textarea name="description" id="description" class="form-control"
                                                      placeholder="{{trans('admin.description')}}">{{isset($template)?$template->description:''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="custom_body">
                            <div class="card-header">
                                <div class="card-title font-title">@lang('admin.branding_section')</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title">{{trans('admin.first_brand_title')}}</label>
                                            <input value="{{isset($template->first_brand_title)?$template->first_brand_title:''}}" type="text" name="first_brand_title" class="form-control" id="title"
                                                   placeholder="{{trans('admin.first_brand_title')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="profile">@lang('admin.first_brand_image') <span class="text-danger">(@lang('admin.expecting_image_size'): 400px by 343px)</span> </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="first_brand_image" type="file" class="custom-file-input" id="profile">
                                                    <label class="custom-file-label" for="profile">@lang('admin.form.input.choose_file')</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="description">@lang('admin.first_brand_description')</label>
                                            <textarea name="first_brand_description" id="first_brand_description" class="form-control"
                                                      placeholder="{{trans('admin.first_brand_description')}}">{{isset($template->first_brand_description)?$template->first_brand_description:''}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title">{{trans('admin.sec_brand_title')}}</label>
                                            <input value="{{isset($template->sec_brand_title)?$template->sec_brand_title:''}}" type="text" name="sec_brand_title" class="form-control" id="title"
                                                   placeholder="{{trans('admin.sec_brand_title')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="profile">@lang('admin.sec_brand_image') <span class="text-danger">(@lang('admin.expecting_image_size'): 400px by 343px)</span> </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="sec_brand_image" type="file" class="custom-file-input" id="profile">
                                                    <label class="custom-file-label" for="profile">@lang('admin.form.input.choose_file')</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="description">@lang('admin.sec_brand_description')</label>
                                            <textarea name="sec_brand_description" id="sec_brand_description" class="form-control"
                                                      placeholder="{{trans('admin.sec_brand_description')}}">{{isset($template->sec_brand_description)?$template->sec_brand_description:''}}</textarea>
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title">{{trans('admin.thr_brand_title')}}</label>
                                            <input value="{{isset($template->thr_brand_title)?$template->thr_brand_title:''}}" type="text" name="thr_brand_title" class="form-control" id="title"
                                                   placeholder="{{trans('admin.thr_brand_title')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="profile">@lang('admin.thr_brand_image') <span class="text-danger">(@lang('admin.expecting_image_size'): 400px by 343px)</span> </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="thr_brand_image" type="file" class="custom-file-input" id="profile">
                                                    <label class="custom-file-label" for="profile">@lang('admin.form.input.choose_file')</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="description">@lang('admin.thr_brand_description')</label>
                                            <textarea name="thr_brand_description" id="description" class="form-control"
                                                      placeholder="{{trans('admin.thr_brand_description')}}">{{isset($template->thr_brand_description)?$template->thr_brand_description:''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="custom_body">
                            <div class="card-header">
                                <div class="card-title font-title">@lang('admin.section_about')</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="sec_thr_title">{{trans('admin.form.title')}}</label>
                                            <input value="{{isset($template->sec_thr_title)?$template->sec_thr_title:''}}" type="text" name="sec_thr_title" class="form-control" id="sec_thr_title"
                                                   placeholder="{{trans('admin.form.title')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="profile">@lang('admin.background_image') <span class="text-danger">(@lang('admin.expecting_image_size'): 400px by 343px)</span></label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="sec_thr_bg_image" type="file" class="custom-file-input" id="profile">
                                                    <label class="custom-file-label" for="profile">@lang('admin.form.input.choose_file')</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="description">@lang('admin.description')</label>
                                            <textarea name="sec_thr_description" id="sec_thr_description" class="form-control"
                                                      placeholder="{{trans('admin.description')}}">{{isset($template->sec_thr_description)?$template->sec_thr_description:''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="custom_body">
                            <div class="card-header">
                                <div class="card-title font-title">@lang('admin.section_create_features')</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title">{{trans('admin.form.title')}}</label>
                                            <input value="{{isset($template->sec_seven_title)?$template->sec_seven_title:''}}" type="text" name="sec_seven_title" class="form-control" id="sec_seven_title"
                                                   placeholder="{{trans('admin.form.title')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="profile">@lang('admin.background_image') <span class="text-danger">(@lang('admin.expecting_image_size'): 400px by 343px)</span></label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="sec_seven_bg_image" type="file" class="custom-file-input" id="profile">
                                                    <label class="custom-file-label" for="profile">@lang('admin.form.input.choose_file')</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="description">@lang('admin.description')</label>
                                            <textarea name="sec_seven_description" id="description" class="form-control"
                                                      placeholder="{{trans('admin.description')}}">{{isset($template->sec_seven_description)?$template->sec_seven_description:''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="custom_body">
                            <div class="card-header">
                                <div class="card-title font-title">@lang('admin.section_marketing_tool')</div>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title">{{trans('admin.section_marketing_tool_main_title')}}</label>
                                            <input value="{{isset($template->section_marketing_tool_main_title)?$template->section_marketing_tool_main_title:''}}" type="text" name="section_marketing_tool_main_title" class="form-control" id="first_title"
                                                   placeholder="{{trans('admin.section_marketing_tool_main_title')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title">{{trans('admin.section_marketing_tool_sub_title')}}</label>
                                            <input value="{{isset($template->section_marketing_tool_sub_title)?$template->section_marketing_tool_sub_title:''}}" type="text" name="section_marketing_tool_sub_title" class="form-control" id="first_title"
                                                   placeholder="{{trans('admin.section_marketing_tool_sub_title')}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title">{{trans('admin.first_title')}}</label>
                                            <input value="{{isset($template->first_title)?$template->first_title:''}}" type="text" name="first_title" class="form-control" id="first_title"
                                                   placeholder="{{trans('admin.first_title')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="profile">@lang('admin.first_img') <span class="text-danger">(@lang('admin.expecting_image_size'): 100px by 100px)</span></label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="first_img" type="file" class="custom-file-input" id="first_img">
                                                    <label class="custom-file-label" for="profile">@lang('admin.form.input.choose_file')</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="description">@lang('admin.first_description')</label>
                                            <textarea name="first_description" id="first_description" class="form-control"
                                                      placeholder="{{trans('admin.first_description')}}">{{isset($template->first_description)?$template->first_description:''}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title">{{trans('admin.sec_title')}}</label>
                                            <input value="{{isset($template->sec_title)?$template->sec_title:''}}" type="text" name="sec_title" class="form-control" id="sec_title"
                                                   placeholder="{{trans('admin.sec_title')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="profile">@lang('admin.sec_img') <span class="text-danger">(@lang('admin.expecting_image_size'): 100px by 100px)</span></label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="sec_img" type="file" class="custom-file-input" id="sec_img">
                                                    <label class="custom-file-label" for="profile">@lang('admin.form.input.choose_file')</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="description">@lang('admin.sec_description')</label>
                                            <textarea name="sec_description" id="sec_description" class="form-control"
                                                      placeholder="{{trans('admin.sec_description')}}">{{isset($template->sec_description)?$template->sec_description:''}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title">{{trans('admin.thr_title')}}</label>
                                            <input value="{{isset($template->thr_title)?$template->thr_title:''}}" type="text" name="thr_title" class="form-control" id="thr_title"
                                                   placeholder="{{trans('admin.thr_title')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="profile">@lang('admin.thr_img') <span class="text-danger">(@lang('admin.expecting_image_size'): 100px by 100px)</span></label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="thr_img" type="file" class="custom-file-input" id="thr_img">
                                                    <label class="custom-file-label" for="profile">@lang('admin.form.input.choose_file')</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="description">@lang('admin.thr_description')</label>
                                            <textarea name="thr_description" id="thr_description" class="form-control"
                                                      placeholder="{{trans('admin.thr_description')}}">{{isset($template->thr_description)?$template->thr_description:''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="custom_body">
                            <div class="card-header">
                                <div class="card-title font-title">@lang('admin.section_features')</div>
                            </div>
                            <div class="card-body" id="add_row">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="sec_thr_title">{{trans('admin.main_title')}}</label>
                                            <input value="{{isset($template->main_title)?$template->main_title:''}}" type="text" name="main_title" class="form-control" id="main_title"
                                                   placeholder="{{trans('admin.main_title')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-11">
                                        <div class="form-group">
                                            <label for="sec_thr_title">{{trans('admin.form.title')}}</label>
                                            <input value="" type="text" name="sec_four_title[]" class="form-control" id="sec_four_title"
                                                   placeholder="{{trans('admin.form.title')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <button id="plus" type="button" class="btn btn-primary float-right add-btn"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="description">@lang('admin.description')</label>
                                            <textarea name="sec_four_description[]" id="sec_four_description" class="form-control"
                                                      placeholder="{{trans('admin.description')}}"></textarea>
                                        </div>
                                    </div>
                                </div>
                                @if(isset($template->sec_four_description) && isset($template->sec_four_title ))
                                    @foreach($template->sec_four_description as $key=>$secFourDescription)
                                        @foreach($template->sec_four_title as $keyOne=>$secFourtitle)
                                            @if($key == $keyOne && $secFourDescription && $secFourtitle)
                                                <div class="row" id="delete_row_{{$key}}">
                                                    <div class="col-lg-11">
                                                        <div class="form-group">
                                                            <label for="sec_thr_title">{{trans('admin.form.title')}}</label>
                                                            <input value="{{$secFourtitle}}" type="text" name="sec_four_title[]"
                                                                   class="form-control" id="sec_four_title"
                                                                   placeholder="{{trans('admin.form.title')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1 add-btn">
                                                        <div class="form-group">
                                                            <button type="button" data-number="{{$key}}"
                                                                    class="faq_row btn-sm btn-danger mt-1 d-block float-right">
                                                                <i class="fa fa-trash  c-pointer"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="description">@lang('admin.description')</label>
                                                            <textarea name="sec_four_description[]" id="sec_four_description"
                                                                      class="form-control"
                                                                      placeholder="{{trans('admin.description')}}">{{$secFourDescription}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="custom_body">
                            <div class="card-header">
                                <div class="card-title font-title">@lang('admin.section_comment')</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title">{{trans('admin.first_commenter_name')}}</label>
                                            <input value="{{isset($template->first_commenter_name)?$template->first_commenter_name:''}}" type="text" name="first_commenter_name" class="form-control" id="sec_title"
                                                   placeholder="{{trans('admin.first_commenter_name')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="profile">@lang('admin.first_commenter_image') <span class="text-danger">(@lang('admin.expecting_image_size'): 100px by 100px)</span></label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="first_commenter_image" type="file" class="custom-file-input" id="first_commenter_image">
                                                    <label class="custom-file-label" for="profile">@lang('admin.form.input.choose_file')</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="description">@lang('admin.first_commenter_comment')</label>
                                            <textarea name="first_commenter_comment" id="first_commenter_comment" class="form-control"
                                                      placeholder="{{trans('admin.first_commenter_comment')}}">{{isset($template->first_commenter_comment)?$template->first_commenter_comment:''}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title">{{trans('admin.sec_commenter_name')}}</label>
                                            <input value="{{isset($template->sec_commenter_name)?$template->sec_commenter_name:''}}" type="text" name="sec_commenter_name" class="form-control" id="sec_title"
                                                   placeholder="{{trans('admin.sec_commenter_name')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="profile">@lang('admin.sec_commenter_image') <span class="text-danger">(@lang('admin.expecting_image_size'): 100px by 100px)</span></label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="sec_commenter_image" type="file" class="custom-file-input" id="sec_commenter_image">
                                                    <label class="custom-file-label" for="profile">@lang('admin.form.input.choose_file')</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="description">@lang('admin.sec_commenter_comment')</label>
                                            <textarea name="sec_commenter_comment" id="first_commenter_comment" class="form-control"
                                                      placeholder="{{trans('admin.sec_commenter_comment')}}">{{isset($template->sec_commenter_comment)?$template->sec_commenter_comment:''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="custom_body">
                            <div class="card-header">
                                <div class="card-title font-title">@lang('admin.section_plan')</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="title">{{trans('admin.form.title')}}</label>
                                            <input value="{{isset($template->sec_six_title)?$template->sec_six_title:''}}" type="text" name="sec_six_title" class="form-control" id="sec_six_title"
                                                   placeholder="{{trans('admin.form.title')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="custom_body">
                            <div class="card-header">
                                <div class="card-title font-title">@lang('admin.contact_info')</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title">{{trans('admin.form.email')}}</label>
                                            <input value="{{isset($template->email)?$template->email:''}}" type="email" name="email" class="form-control" id="email"
                                                   placeholder="{{trans('admin.form.email')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title">{{trans('admin.customers.phone_number')}}</label>
                                            <input value="{{isset($template->phone_number)?$template->phone_number:''}}" type="text" name="phone_number" class="form-control" id="phone_number"
                                                   placeholder="{{trans('admin.customers.phone_number')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="description">@lang('admin.address')</label>
                                            <input value="{{isset($template->address)?$template->address:''}}" type="text" name="address" class="form-control" id="address"
                                                   placeholder="{{trans('admin.address')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">@lang('admin.form.button.submit')</button>
                        </div>
                    </form>
                </div>


            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('extra-scripts')
    <script src="{{asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script !src="">
        "use strict";
        $('#planForm').validate({
            rules: {
                question: {
                    required: true
                },
                answer: {
                    required: true
                },
                status: {
                    required: true
                },
            },
            messages: {
                question: { required:"Please provide plan title"},
                answer:  { required:"Please provide sms limit"},
                status:  { required:"Please select a status"}
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        let rowNumber = 1;

        $(document).on('click', '#plus', function (e){
            rowNumber++
            $('#add_row').prepend(`<div class="row" id="delete_row_${rowNumber}">
                                <div class="col-lg-11">
                                    <div class="form-group">
                                        <label for="sec_thr_title">{{trans('admin.form.title')}}</label>
                                        <input value="" type="text" name="sec_four_title[]" class="form-control" id="sec_four_title"
                                               placeholder="{{trans('admin.form.title')}}">
                                    </div>
                                </div>
                                <div class="col-lg-1 add-btn">
                                    <div class="form-group">
                                        <button type="button" data-number="${rowNumber}" class="faq_row btn-sm btn-danger mb-2 d-block float-right"><i class="fa fa-trash  c-pointer" ></i></button>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="description">@lang('admin.description')</label>
                                        <textarea name="sec_four_description[]" id="sec_four_description" class="form-control"
                                                  placeholder="{{trans('admin.description')}}">{{isset($page) && $page->description?$page->description:old('description')}}</textarea>
                                    </div>
                                </div>
                            </div>`);
        });

        $(document).on('click', '.faq_row', function (e){
            const number =$(this).attr('data-number');

            $('#delete_row_'+ number).remove();
        })
    </script>
@endsection

