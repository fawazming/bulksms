@extends('layouts.admin')

@section('title','Page Create')

@section('extra-css')
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12 mx-auto col-sm-10 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">@lang('admin.new_page')</h2>
                        <a class="btn btn-info float-right" href="{{route('admin.page.index')}}">@lang('admin.back')</a>
                    </div>
                    <form method="post" role="form" id="pageCreateForm" action="{{route('admin.page.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            @include('admin.createPage.form')
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">@lang('customer.submit')</button>
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
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
@endsection

