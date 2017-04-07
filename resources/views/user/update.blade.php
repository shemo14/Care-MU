@extends('user.layouts.layout')
@section('content')

    <style>
        .table-bordered, .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
            border: 1px solid #999;
        }
    </style>


    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">

        @include('user.layouts.sidebar')

    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->

            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="{{ url('user') }}">الرئيسية</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="{{ url('user') }}">البيانات الشخصية</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>تعديل</span>
                    </li>
                </ul>
                <div class="page-toolbar">
                    <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="تغير التاريخ">
                        <i class="icon-calendar"></i>&nbsp;
                        <span class="thin uppercase hidden-xs"></span>&nbsp;
                        <i class="fa fa-angle-down"></i>
                    </div>
                </div>
                @include('admin.layouts.alert')
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title" style="margin-bottom: 10px">تعديل البيانات الشخصية </h1>
            <small>الرجاء ان تكون الصورة الشخصية حديثة و واضحة لسهولة التعرف علي المشترك</small>

            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(['url'=>'user/'.$data->id ,'method'=>'put','files'=>'true','class'=>'form-horizontal']) !!}
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 text-center form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <img id="blah" class="img-circle text-center" style="width: 230px;border: 1px solid #36c6d3;padding: 4px;height: 230px;margin-top: -5px;" src="{{ Request::root() }}/{{ $file->path }}{{ $file->filename }}" alt="your image" />
                            <label for="imgInp" style="margin: auto;display: block;background-color: #36c6d3;width: 153px;height: 40px;color: #ffffff;margin-top: 10px;padding-top: 6px;font-size: 15px;cursor: pointer;">تعديل صورتك الشخصية</label>
                            <input type='file' name="image" style="display: none" class="form-control" id="imgInp"  />
                            @if ($errors->has('image'))
                                <span class="help-block help-block-error">
                                        <strong style="color: #e73d4a">{{ $errors->first('image') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-md-4"></div>
                    </div>

                    <div class="form-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label text-center">الاسم
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                             <i class="fa fa-pencil"></i>
                                        </span>
                                    <input type="text" name="name" value="{{ $data->name }}" class="form-control" placeholder="الاسم ...">
                                </div>
                                @if ($errors->has('name'))
                                    <span class="help-block help-block-error">
                                        <strong style="color: #e73d4a">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label text-center">الايميل
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                             <i class="fa fa-envelope-o"></i>
                                        </span>
                                    <input type="email" value="{{ $data->email }}" name="email" class="form-control" placeholder="الايميل ...">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block help-block-error">
                                        <strong style="color: #e73d4a">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label text-center">الهاتف
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                             <i class="fa fa-phone"></i>
                                        </span>
                                    <input type="text" value="{{ $data->phone }}" name="phone" maxlength="12" class="form-control" placeholder="الهاتف ...">
                                </div>
                                @if ($errors->has('phone'))
                                    <span class="help-block help-block-error">
                                        <strong style="color: #e73d4a">{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('university') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label text-center">الجامعة
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                             <i class="fa fa-university"></i>
                                        </span>
                                    <input type="text" value="{{ $data->university }}" name="university" class="form-control" placeholder="الجامعة ...">
                                </div>
                                @if ($errors->has('university'))
                                    <span class="help-block help-block-error">
                                        <strong style="color: #e73d4a">{{ $errors->first('university') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('faculity') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label text-center">الكلية
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                             <i class="fa fa-graduation-cap"></i>
                                        </span>
                                    <input type="text" value="{{ $data->faculity }}" name="faculity" class="form-control" placeholder="الكلية ...">
                                </div>
                                @if ($errors->has('faculity'))
                                    <span class="help-block help-block-error">
                                        <strong style="color: #e73d4a">{{ $errors->first('faculity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label text-center">العنوان
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <div class="input-group" style="width: 100%;">
                                     <span class="input-group-addon">
                                             <i class="fa fa-map-marker"></i>
                                     </span>
                                    <select class="form-control" value="{{ $data->address }}" name="address">
                                        @foreach(\App\Cities::all() as $city)
                                            <option value="{{ $city->city }}">{{ $city->city }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label text-center">الاشتراك
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-5">
                                <div class="input-group" style="width: 100%;">
                                    <span class="input-group-addon">
                                             <i class="fa fa-file-text-o"></i>
                                     </span>
                                    <select class="form-control" name="part" value="{{ $data->part }}">
                                        <option value="شهر كامل">شهر كامل</option>
                                        <option value="نصف شهر">نصف شهر</option>
                                        <option value="ذهاب فقط">ذهاب فقط</option>
                                        <option value="عودة فقط">عودة فقط</option>
                                        <option value="اخوة">اخوة</option>
                                    </select>
                                </div>
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
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
    <a href="javascript:;" class="page-quick-sidebar-toggler">
        <i class="icon-login"></i>
    </a>

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
