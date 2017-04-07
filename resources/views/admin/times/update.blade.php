@extends('admin.layouts.layout')
@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ url('admin_test') }}">الرئيسية</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ url('time') }}">مواعيد التوصيل</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="#">تعديل موعيد</a>
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
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase">تعديل لمواعيد التوصيل</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    {!! Form::open(['url'=>'time/' . $time->id,'method'=>'put','class'=>'form-horizontal']) !!}
                    <div class="form-body">

                        <div class="form-group">
                            <label class="col-md-3 control-label text-center">ادخل التوقيت
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <div class="input-group{{ $errors->has('time') ? ' has-error' : '' }}">
                                        <span class="input-group-addon">
                                             <i class="fa fa-clock-o"></i>
                                        </span>
                                    <input value="{{ $time->time }}" type="time" name="time" class="form-control" placeholder="ادخل التوقيت ...">
                                </div>
                                @if ($errors->has('time'))
                                    <span class="help-block help-block-error">
                                        <strong style="color: #e73d4a">{{ $errors->first('time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                            <div class="form-group form-md-radios">
                                <label class="col-md-3 control-label text-center">النوع
                                    <span class="required"> * </span>
                                </label>
                                <div class="md-radio-inline">
                                    @if($time->type == 'ذهاب')
                                    <div class="md-radio">
                                        <input type="radio" id="radio14" name="type" checked class="md-radiobtn" value="ذهاب">
                                        <label for="radio14">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span>ذهاب</label>
                                    </div>

                                    <div class="md-radio">
                                        <input type="radio" id="radio15" name="type" class="md-radiobtn" value="عودة">
                                        <label for="radio15">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span> عودة</label>
                                    </div>
                                    @elseif($time->type == 'عودة')
                                        <div class="md-radio">
                                            <input type="radio" id="radio14" name="type" class="md-radiobtn" value="ذهاب">
                                            <label for="radio14">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span>ذهاب</label>
                                        </div>

                                        <div class="md-radio">
                                            <input checked type="radio" id="radio15" name="type" class="md-radiobtn" value="عودة">
                                            <label for="radio15">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span> عودة</label>
                                        </div>
                                    @endif
                                </div>
                            </div>
                    </div>
                    <div class="form-actions" style="margin-right: 7px">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <input type="submit" class="btn green" value="تعديل">
                                <input type="reset" value="مسح" class="btn default">
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
                <!-- END FORM-->
                </div>
                <!-- END VALIDATION STATES-->
            </div>
        </div>


@stop

