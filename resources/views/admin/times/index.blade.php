@extends('admin.layouts.layout')
@section('style')
    <link href="{{ Request::root() }}/admin/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ Request::root() }}/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css" rel="stylesheet" type="text/css" />
@stop

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ url('admin_test') }}">الرئيسية</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ url('time') }}">مواعيد التوصيل</a>
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
                        <span class="caption-subject font-red sbold uppercase">مواعيد التوصيل</span>
                    </div>
                    {{--<div class="actions">--}}
                        {{--<div class="btn-group btn-group-devided" data-toggle="buttons">--}}
                            {{--<label class="btn btn-transparent red btn-outline btn-circle btn-sm active">--}}
                                {{--<input type="radio" name="options" class="toggle" id="option1">Actions</label>--}}
                            {{--<label class="btn btn-transparent red btn-outline btn-circle btn-sm">--}}
                                {{--<input type="radio" name="options" class="toggle" id="option2">Settings</label>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a href="{{ url('time/create') }}"></a>
                                    <a class="btn green" href="{{ url('time/create') }}">اضافة جديدة
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                {{--<div class="btn-group pull-right">--}}
                                    {{--<button class="btn green btn-outline dropdown-toggle" data-toggle="dropdown">Tools--}}
                                        {{--<i class="fa fa-angle-down"></i>--}}
                                    {{--</button>--}}
                                    {{--<ul class="dropdown-menu pull-right">--}}
                                        {{--<li>--}}
                                            {{--<a href="javascript:;"> Print </a>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<a href="javascript:;"> Save as PDF </a>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<a href="javascript:;"> Export to Excel </a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <th> الموعد</th>
                            <th> النوع</th>
                            <th>تعديلات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($times as $time)
                            <tr>
                                <td>  {{ date("g:i", strtotime($time->time)) }} {{ $time->time >= '12:00' ? ' م' : ' ص' }} </td>
                                <td> {{ $time->type }} </td>

                                <td>
                                    <a href="{{ url('time') . '/' . $time->id . '/edit' }}" title="تعديل"> <i style="font-size: 26px;margin-left: 10px;" class="fa fa-pencil-square-o"></i></a>
                                    <a data-toggle="modal" data-target="#{{ $time->id }}" href="#" title="حذف"> <i style="font-size: 26px;color: #e7505a" class="fa fa-trash-o"></i> </a>
                                </td>
                            </tr>
                            <div class="modal fade" id="{{ $time->id }}" role="dialog">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">حذف موعد {{ date("g:i", strtotime($time->time)) }}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>هل تريد حذف موعد {{ date("g:i", strtotime($time->time)) }} ؟؟</p>
                                        </div>
                                        <div class="modal-footer">
                                            {!! Form::open(['url'=>'time/'.$time->id , 'method'=>'delete']) !!}
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
                        {{ $times->links() }}
                    </div>
                </div>
            </div>

@stop
@section('script')
            <script src="{{ Request::root() }}/admin/global/scripts/datatable.js" type="text/javascript"></script>
            <script src="{{ Request::root() }}/admin/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
            <script src="{{ Request::root() }}/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
            <script src="{{ Request::root() }}/admin/pages/scripts/table-datatables-editable.min.js" type="text/javascript"></script>
@stop

