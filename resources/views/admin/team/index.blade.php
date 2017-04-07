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
                <a href="{{ url('team') }}">فريق العمل</a>
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
                        <span class="caption-subject font-red sbold uppercase">فريق العمل</span>
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
                                    <a href="{{ url('city/create') }}"></a>
                                    <a class="btn green" href="{{ url('team/create') }}">اضافة جديدة
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
                            <th style="font-size: 20px">الاسم</th>
                            <th style="font-size: 20px"> التفاصيل</th>
                            <th style="font-size: 20px">عرض</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teams as $team)
                            <tr>
                                <td>{{ $team->name }}</td>
                                <td>
                                    @if(strlen($team->desc) > 100)
                                        {!! substr($team->desc, 0, 80) . '...' !!}
                                    @else
                                        {!! $team->desc !!}
                                    @endif
                                </td>
                                <td style="text-align: center">
                                    <a href="{{ url('team') . '/' . $team->id  }}" title="عرض"> <i style="font-size: 30px;margin-left: 10px;margin-top: 10px;" class="fa fa-desktop"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="text-align: left">
                        {{ $teams->links() }}
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

