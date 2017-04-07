@extends('admin.layouts.layout')
@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ url('admin_test') }}">الرئيسية</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ url('city') }}">مناطق الوقوف</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="#">اضافة مدينة جديدة</a>
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
                        <span class="caption-subject font-dark sbold uppercase">اضافة مدينة جديدة</span>
                    </div>
                </div>
                <div class="portlet-body">

                    {!! Form::open(['url'=>'city','method'=>'post','class'=>'form-horizontal']) !!}
                    <div class="form-body">
                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label text-center">اسم المدينة
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                             <i class="fa fa-clock-o"></i>
                                        </span>
                                    <input type="text" name="city" class="form-control" placeholder="ادخل المدينة ...">
                                </div>
                                @if ($errors->has('city'))
                                    <span class="help-block help-block-error">
                                        <strong style="color: #e73d4a">{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cost') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label text-center">التكلفة الشهرية
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                             <i class="fa fa-clock-o"></i>
                                        </span>
                                    <input type="number" name="cost" class="form-control" placeholder="ادخل التكلفة ...">
                                </div>
                                @if ($errors->has('cost'))
                                    <span class="help-block help-block-error">
                                        <strong style="color: #e73d4a">{{ $errors->first('cost') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="form-actions" style="margin-right: 7px">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <input type="submit" class="btn green" value="حفظ">
                                <input type="reset" value="مسح" class="btn default">
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>

@stop

