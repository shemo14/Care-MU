@extends('admin.layouts.layout')
@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ url('/') }}">الرئيسية</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ url('beds') }}">الاسره</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ url('beds/create') }}">اضافة سرير</a>
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
                        <span class="caption-subject font-dark sbold uppercase">اضافة سرير جديد</span>
                    </div>
                </div>
                <div class="portlet-body">

                    {!! Form::open(['url'=>'beds','method'=>'post','class'=>'form-horizontal', 'files'=>'true']) !!}
                    <div class="form-body">
                        <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">رقم السرير
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                             <i class="fa fa-clock-o"></i>
                                        </span>
                                    <input type="text" name="number" class="form-control" placeholder="رقم السرير ...">
                                </div>
                                @if ($errors->has('number'))
                                    <span class="help-block help-block-error">
                                        <strong style="color: #e73d4a">{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('care') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">العناية التابعة
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <div class="input-group" style="width: 100%">
                                    <select name="care" class="form-control" id="select">
                                        <option value="">--- اختر العناية المركزة ---</option>
                                        @foreach(\App\Care::where('hospital',Auth::user()->id)->get() as $care)
                                            <option value="{{ $care->id }}">{{ $care->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('care'))
                                    <span class="help-block help-block-error">
                                        <strong style="color: #e73d4a">{{ $errors->first('care') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">تحت الصيانة
                                <span class="required"> </span>
                            </label>
                            <div class="col-md-9">
                              <label class="mt-checkbox mt-checkbox-outline">
                                    <input type="checkbox" value="1" name="test">
                                    <span></span>
                              </label>
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
    <script type="text/javascript">
        $("select[name='hospital']").change(function(){
            var hospital = $(this).val();
            var token = $("input[name='_token']").val();
            $.ajax({
                url: "<?php echo url('select_care') ?>",
                method: 'GET',
                data: {hospital:hospital, _token:token},
                success: function(data) {
                    $('#select').empty();
                    $.each(data, function (index, careObject) {
                        $('#select').append('<option value="'+careObject.id+'">'+careObject.name+'</option>')
                    });
                }
            });
        });
    </script>

@stop
