@extends('layouts.admin')

@section('title') Page @endsection

@section('extra-css')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">@lang('admin.list')</h2>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{route('admin.page.create')}}">@lang('admin.new_page')</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-body">
                        <table id="pages" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th>@lang('admin.name')</th>
                                <th>@lang('admin.title')</th>
                                <th>@lang('admin.description')</th>
                                <th>@lang('admin.position')</th>
                                <th>@lang('admin.status')</th>
                                <th>@lang('admin.action')</th>
                            </tr>
                            </thead>

                        </table>
                    </div>
                    <!-- /.card-body -->
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
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/readmore.min.js')}}"></script>

    <script>
        "use strict";
        $('#pages').DataTable({
            processing: true,
            serverSide: true,
            responsive:true,
            ajax:'{{route('admin.page.get.all')}}',
            columns: [
                { "data": "name" },
                { "data": "title" },
                { "data": "description" },
                { "data": "position" },
                { "data": "status" },
                { "data": "action" },
            ],
            fnInitComplete: function(oSettings, json) {
                $(".show-more").css('overflow', 'hidden').readmore({collapsedHeight: 20,moreLink: '<a href="#">More</a>',lessLink: '<a href="#">Less</a>'});
            }
        });


    </script>
@endsection
