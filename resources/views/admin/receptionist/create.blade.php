@extends('admin.layouts.layout')
@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ url('/') }}">الرئيسية</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ url('receptionist') }}">موظفين الاسفقبال</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="#">اضافة جديدة</a>
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
                        <span class="caption-subject font-dark sbold uppercase">اضافة موظف استقبال</span>
                    </div>
                </div>
                <div class="portlet-body">

                    {!! Form::open(['url'=>'receptionist','method'=>'post','class'=>'form-horizontal', 'files'=>'true']) !!}
                    {{ csrf_field() }}

                    <div class="form-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">الاسم
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                             <i class="fa fa-pencil-square-o"></i>
                                        </span>
                                    <input type="text" name="name" class="form-control" placeholder="اسم الموظف ...">
                                </div>
                                @if ($errors->has('name'))
                                    <span class="help-block help-block-error">
                                        <strong style="color: #e73d4a">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">اسم المستخدم
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                             <i class="fa fa-user"></i>
                                        </span>
                                    <input type="text" name="username" class="form-control" placeholder="اسم المستخدم ...">
                                </div>
                                @if ($errors->has('username'))
                                    <span class="help-block help-block-error">
                                        <strong style="color: #e73d4a">{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">رقم الهاتف
                                <span class="required"> </span>
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                             <i class="fa fa-phone"></i>
                                        </span>
                                    <input type="text" name="phone" class="form-control" placeholder="رقم الهاتف ...">
                                </div>
                                @if ($errors->has('phone'))
                                    <span class="help-block help-block-error">
                                        <strong style="color: #e73d4a">{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">العنوان
                                <span class="required"> </span>
                            </label>
                            <div class="col-md-9">
                                <div class="input-group" style="width: 100%">
                                    <span class="input-group-addon">
                                             <i class="fa fa-map-marker"></i>
                                        </span>
                                    <textarea class="form-control" name="address" id="" placeholder="عنوان الموظف ..." rows="6"></textarea>
                                </div>
                                @if ($errors->has('address'))
                                    <span class="help-block help-block-error">
                                        <strong style="color: #e73d4a">{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">كلمة السر
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                             <i class="fa fa-key"></i>
                                        </span>
                                    <input type="password" name="password" class="form-control" placeholder="كلمة السر ...">
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block help-block-error">
                                        <strong style="color: #e73d4a">{{ $errors->first('password') }}</strong>
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
    </div>

@stop
