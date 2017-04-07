@extends('admin.layouts.layout')
@section('content')


    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ url('admin_test') }}">الرئيسية</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ url('team') }}">فريق العمل</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="#">{{ $team->t_name }}</a>
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
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase">{{ $team->t_name }}</span>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('team') . '/' . $team->n_id .'/edit' }}" class="btn btn-success">تعديل الخبر</a>
                        <a href="#" data-toggle="modal" data-target="#{{ $team->n_id }}" class="btn btn-danger">حذف الخبر</a>
                    </div>
                </div>
                    <div class="portlet-body">
                        <div class="col-md-12 text-center">
                            <img class="img-thumbnail" src="{{ Request::root() }}/{{ $team->path }}{{ $team->filename }}" alt="">
                            <h1 class="title">{{ $team->t_name }}</h1>
                            <p>{!! $team->desc !!}</p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="{{ $team->n_id }}" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">حذف  {{ $team->t_name }}</h4>
                </div>
                <div class="modal-body">
                    <p>هل تريد حذف {{ $team->t_name }} ؟؟</p>
                </div>
                <div class="modal-footer">
                    {!! Form::open(['url'=>'team/'.$team->n_id , 'method'=>'delete']) !!}
                    <input type="submit" value="نعم" class="btn btn-danger">
                    <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop