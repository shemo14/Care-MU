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
                        <span>البيانات الشخصية</span>
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
            <h1 class="page-title" style="margin-bottom: 10px">{{ Auth::user()->name }} </h1>
            <div class="row">
                <div class="col-md-7">
                    <table style="width: 400px;margin-top: 20px" class="table table-hover">
                        <tbody>
                        <tr>
                            <td>العنوان</td>
                            <td>{{ Auth::user()->address }}</td>
                        </tr>
                        <tr>
                            <td>الهاتف</td>
                            <td>{{ Auth::user()->phone }}</td>
                        </tr>
                        <tr>
                            <td>البريد</td>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                            <td>الجامعة</td>
                            <td>{{ Auth::user()->university }}</td>
                        </tr>
                        <tr>
                            <td>الكلية</td>
                            <td>{{ Auth::user()->faculity }}</td>
                        </tr>
                        <tr>
                            <td>الاشتراك</td>
                            <td>{{ Auth::user()->part }}</td>
                        </tr>
                        <tr>
                            <td>الرسوم</td>
                            <td>{{ \App\Cities::where('city',Auth::user()->address)->first()->cost }} جنية</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-5 text-center" style="margin-top: -30px;">
                    <img id="blah" class="img-circle text-center" style="width: 230px;border: 1px solid #36c6d3;padding: 4px;height: 230px;margin-top: -5px;" src="{{ Request::root() }}/{{ \App\Files::where('linkedid',Auth::user()->id)->first()->path }}{{ \App\Files::where('linkedid',Auth::user()->id)->first()->filename }}" alt="الصورة الشخصية" />
                    <a href="{{ url('user') .'/'. Auth::user()->id. '/edit' }}" style="display: block;margin: auto;width: 200px;margin-top: 10px;margin-bottom: 10px;" class="btn btn-success">تعديل الحساب<i style="font-size: 20px;color: #ffffff;margin-right: 5px;" class="fa fa-pencil-square-o"></i></a>
                    <a data-toggle="modal" data-target="#{{ Auth::user()->id }}" href="#" style="display: block;margin: auto;width: 200px" class="btn btn-danger">حذف الحساب<i style="font-size: 20px;color: #ffffff;margin-right: 5px" class="fa fa-trash-o"></i></a>
                </div>
            </div>

            <div class="modal fade" id="{{ Auth::user()->id }}" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">حذف الحساب</h4>
                        </div>
                        <div class="modal-body">
                            <p>هل تريد حذف حساب {{ Auth::user()->name }} ؟؟</p>
                        </div>
                        <div class="modal-footer">
                            {!! Form::open(['url'=>'user/'.Auth::user()->id , 'method'=>'delete']) !!}
                            <input type="submit" value="نعم" class="btn btn-danger">
                            <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

            <h1 class="page-title" style="margin-bottom: 10px">جدول المواعيد</h1>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a href="{{ url('user/create') }}"></a>
                                <a class="btn green" href="{{ url('user/create') }}">تعديل جدول المواعيد
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                </div>
                @if(Auth::user()->part == 'شهر كامل' || Auth::user()->part == 'نصف شهر' || Auth::user()->part == 'اخوه')
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <th style="font-size: 20px"> اليوم</th>
                            <th style="font-size: 20px"> مواعيد الذهاب</th>
                            <th style="font-size: 20px">مواعيد العودة</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Tables::where('user_id',Auth::user()->id)->get() as $table)
                            <tr>
                                <td>{{ $table->day }}</td>
                                <td>{{ $table->go }} </td>
                                <td>{{ $table->come != '' ? date("g:i", strtotime($table->come)) : '-' }}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @elseif(Auth::user()->part == 'ذهاب فقط')
                    <table style="margin: auto;width: 500px" class="table table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <th style="font-size: 20px;width: 50%;text-align: center"> اليوم</th>
                            <th style="font-size: 20px;text-align: center"> مواعيد الذهاب</th>
                        </tr>
                        </thead>
                        <tbody style="text-align: center;">
                        @foreach(\App\Tables::where('user_id',Auth::user()->id)->get() as $table)
                            <tr>
                                <td>{{ $table->day }}</td>
                                <td>{{ $table->go }} </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @elseif(Auth::user()->part == 'عودة فقط')
                    <table style="margin: auto;width: 500px" class="table table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <th style="font-size: 20px;width: 50%;text-align: center"> اليوم</th>
                            <th style="font-size: 20px;text-align: center">مواعيد العودة</th>
                        </tr>
                        </thead>
                        <tbody style="text-align: center;">
                        @foreach(\App\Tables::where('user_id',Auth::user()->id)->get() as $table)
                            <tr>
                                <td>{{ $table->day }}</td>
                                <td>{{ $table->come != '' ? date("g:i", strtotime($table->come)) : '-' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>


        </div>
        <!-- END CONTENT BODY -->
    </div>



@stop
