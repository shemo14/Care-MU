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
                <a href="#">تعديل {{ $team->t_name }}</a>
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
                        <span class="caption-subject font-dark sbold uppercase">تعديل {{ $team->name }}</span>
                    </div>
                </div>
                <div class="portlet-body">

                    {!! Form::open(['url'=>'team/'.$team->n_id,'method'=>'put','class'=>'form-horizontal', 'files'=>'true']) !!}
                    <div class="form-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">الاسم
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                             <i class="fa fa-clock-o"></i>
                                        </span>
                                    <input value="{{ $team->t_name }}" type="text" name="name" class="form-control" placeholder="العنوان ...">
                                </div>
                                @if ($errors->has('name'))
                                    <span class="help-block help-block-error">
                                        <strong style="color: #e73d4a">{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">التفاصيل
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <textarea class="ckeditor form-control" name="desc" id="" rows="6" data-error-container="#editor2_error">{!! $team->desc !!}</textarea>
                                </div>
                                @if ($errors->has('desc'))
                                    <span class="help-block help-block-error">
                                        <strong style="color: #e73d4a">{{ $errors->first('desc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">صورة
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <img id="blah" class="img-thumbnail" style="height: 350px;width: 100%;" src="{{ Request::root() }}/{{ $team->path }}{{ $team->fileName }}" alt="">
                                    <input type="file" name="photo" style="display: none" id="imgInp">
                                    <label for="imgInp" class="btn btn-success">اختار صورة ...</label>
                                </div>
                                @if ($errors->has('photo'))
                                    <span class="help-block help-block-error">
                                        <strong style="color: #e73d4a">{{ $errors->first('photo') }}</strong>
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
    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imgInp").change(function(){
            readURL(this);
        });
    </script>

@stop
@section('script')
    <script src="{{ Request::root() }}/admin/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
@stop
