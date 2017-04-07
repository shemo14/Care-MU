@extends('admin.layouts.layout')
@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ url('/') }}">الرئيسية</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ url('patients') }}">المرضي</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ url('patients/create') }}">اضافة مريض</a>
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

                    {!! Form::open(['url'=>'patients','method'=>'post','class'=>'form-horizontal', 'files'=>'true']) !!}
                    <div class="form-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">اسم المريض
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                             <i class="fa fa-clock-o"></i>
                                        </span>
                                    <input type="text" name="name" class="form-control" placeholder="اسم المريض ...">
                                </div>
                                @if ($errors->has('name'))
                                    <span class="help-block help-block-error">
                                        <strong style="color: #e73d4a">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nat_id') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">الرقم القومي
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                             <i class="fa fa-clock-o"></i>
                                        </span>
                                    <input type="text" name="nat_id" class="form-control" placeholder="الرقم القومي ...">
                                </div>
                                @if ($errors->has('nat_id'))
                                    <span class="help-block help-block-error">
                                        <strong style="color: #e73d4a">{{ $errors->first('nat_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('care') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">العناية المركزية
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <div class="input-group" style="width: 100%">
                                    <select name="care" class="form-control" id="">
                                        <option value="">--- اختر العناية المركزية ---</option>
                                        @foreach($cares as $care)
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

                        <div class="form-group{{ $errors->has('bed') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">السرير
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <div class="input-group" style="width: 100%">
                                    <select name="bed" class="form-control" id="select">
                                        <option value="">--- اختر السرير ---</option>
                                    </select>
                                </div>
                                @if ($errors->has('bed'))
                                    <span class="help-block help-block-error">
                                        <strong style="color: #e73d4a">{{ $errors->first('bed') }}</strong>
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
    <script type="text/javascript">
        $("select[name='care']").change(function(){
            var care = $(this).val();
            var token = $("input[name='_token']").val();
            $.ajax({
                url: "<?php echo url('select_bed') ?>",
                method: 'GET',
                data: {care:care, _token:token},
                success: function(data) {
                    $('#select').empty();
                    $.each(data, function (index, careObject) {
                        $('#select').append('<option value="'+careObject.id+'">'+careObject.number+'</option>')
                    });
                }
            });
        });
    </script>

@stop