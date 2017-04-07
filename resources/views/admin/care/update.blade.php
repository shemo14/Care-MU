@extends('admin.layouts.layout')
@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ url('/') }}">الرئيسية</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="#">العنايات المركزة</a>
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
                        <span class="caption-subject font-dark sbold uppercase">تعديل {{ $care->name }}</span>
                    </div>
                </div>
                <div class="portlet-body">

                    {!! Form::open(['url'=>'intensive_care/'.$care->id,'method'=>'put','class'=>'form-horizontal', 'files'=>'true']) !!}
                    <div class="form-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">اسم العناية
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                             <i class="fa fa-clock-o"></i>
                                        </span>
                                    <input type="text" value="{{ $care->name }}" name="name" class="form-control" placeholder="اسم العناية ...">
                                </div>
                                @if ($errors->has('name'))
                                    <span class="help-block help-block-error">
                                        <strong style="color: #e73d4a">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hospital') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">المستشفى التابعة
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <div class="input-group" style="width: 100%">
                                    <select name="hospital" class="form-control" id="">
                                        @foreach(\App\User::all() as $hospital)
                                            <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('hospital'))
                                    <span class="help-block help-block-error">
                                        <strong style="color: #e73d4a">{{ $errors->first('hospital') }}</strong>
                                    </span>
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
                </div>
            </div>
        </div>
    </div>

@stop