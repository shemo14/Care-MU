@extends('admin.layouts.layout')
@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ url('/') }}">الرئيسية</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ url('#') }}">العنايات المركزة</a>
            </li>

        </ul>
        <div class="page-toolbar">
            <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                <i class="icon-calendar"></i>&nbsp;
                <span class="thin uppercase hidden-xs"></span>&nbsp;
                <i class="fa fa-angle-down"></i>
            </div>
        </div>
        @include('admin.layouts.alert')
    </div>


    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light portlet-fit bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-red"></i>
                        <span class="caption-subject font-red sbold uppercase">العنايات المركزة</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a href="{{ url('time/create') }}"></a>
                                    <a class="btn green" href="{{ url('intensive_care/create') }}">اضافة جديدة
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <th> اسم العناية</th>
                            <th> المستشفي التابعة</th>
                            <th>تعديلات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cares as $care)
                            <tr>
                                <td>  {{ $care->c_name }}</td>
                                <td> {{ $care->h_name }} </td>

                                <td>
                                    <a href="{{ url('intensive_care') . '/' . $care->c_id . '/edit' }}" title="تعديل"> <i style="font-size: 26px;margin-left: 10px;" class="fa fa-pencil-square-o"></i></a>
                                    <a data-toggle="modal" data-target="#{{ $care->c_id }}" href="#" title="حذف"> <i style="font-size: 26px;color: #e7505a" class="fa fa-trash-o"></i> </a>
                                </td>
                            </tr>
                            <div class="modal fade" id="{{ $care->c_id }}" role="dialog">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">حذف العناية {{ $care->c_name }}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>هل تريد حذف  {{ $care->c_name }} ؟؟</p>
                                        </div>
                                        <div class="modal-footer">
                                            {!! Form::open(['url'=>'intensive_care/'.$care->c_id , 'method'=>'delete']) !!}
                                            <input type="submit" value="نعم" class="btn btn-danger">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="text-align: left">
                        {{ $cares->links() }}
                    </div>
                </div>
            </div>
@stop


