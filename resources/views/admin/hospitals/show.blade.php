@extends('admin.layouts.layout')
@section('content')

<style>
    .table-bordered, .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
        border: 1px solid #999;
    }
</style>


        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ url('/') }}">الرئيسية</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>{{ $hospital->name }}</span>
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
        <h1 class="page-title" style="margin-bottom: 10px">{{ $hospital->name }}</h1>
        <div class="row">
            <div class="col-md-7">
                <table style="width: 400px;margin-top: 20px" class="table table-hover">
                    <tbody>
                    <tr>
                        <td>العنوان</td>
                        <td>{{ $hospital->address }}</td>
                    </tr>
                    <tr>
                        <td>الهاتف</td>
                        <td>{{ $hospital->phone }}</td>
                    </tr>
                    <tr>
                        <td>اسم المستخدم</td>
                        <td>{{ $hospital->username }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-5 text-center" style="margin-top: -30px;">
                @if($hospital->path && $hospital->filename)
                    <img class="img-circle text-center" style="width: 150px;border: 1px solid #36c6d3;padding: 4px;height: 150px;margin-top: -5px;" src="{{ Request::root() }}/{{ $hospital->path }}{{ $hospital->filename }}" alt="شعار المستشفى" />
                @else
                    <img class="img-circle text-center" style="width: 150px;border: 1px solid #36c6d3;padding: 4px;height: 150px;margin-top: -5px;" src="{{ Request::root() }}/admin/hospital.png" alt="شعار المستشفى" />
                @endif
                <a href="{{ url('hospital') .'/'. $hospital->id . '/edit' }}" style="display: block;margin: auto;width: 200px;margin-top: 10px;margin-bottom: 10px;" class="btn btn-success">تعديل المستشفى<i style="font-size: 20px;color: #ffffff;margin-right: 5px;" class="fa fa-pencil-square-o"></i></a>
                <a data-toggle="modal" data-target="#{{ $hospital->id }}" href="#" style="display: block;margin: auto;width: 200px" class="btn btn-danger">حذف المستشفى<i style="font-size: 20px;color: #ffffff;margin-right: 5px" class="fa fa-trash-o"></i></a>
            </div>
        </div>

        <div class="modal fade" id="{{ $hospital->id }}" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">حذف المستشفى</h4>
                    </div>
                    <div class="modal-body">
                        <p>هل تريد حذف  {{ $hospital->name }} ؟؟</p>
                    </div>
                    <div class="modal-footer">
                        {!! Form::open(['url'=>'hospital/'.$hospital->id , 'method'=>'delete']) !!}
                        <input type="submit" value="نعم" class="btn btn-danger">
                        <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        @if(Auth::user()->type == 0)
        <h1 class="page-title" style="margin-bottom: 18px;margin-top: 29px;">العنايات المركزة <a class="btn green pull-right" href="{{ url('intensive_care/create') }}">اضافة عناية مركزة
                <i class="fa fa-plus"></i>
            </a></h1>
            <div class="portlet-body">
                @if(count(\App\Care::where('hospital',$hospital->id)->get()) > 0)
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <th style="font-size: 20px"> اسم العناية</th>
                            <th style="font-size: 20px"> اعدادات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Care::where('hospital',$hospital->id)->get() as $care)
                        <tr>
                            <td>{{ $care->name }}</td>
                            <td>
                                <a href="{{ url('intensive_care') . '/' . $care->id . '/edit' }}" title="تعديل"> <i style="font-size: 26px;margin-left: 10px;" class="fa fa-pencil-square-o"></i></a>
                                <a data-toggle="modal" data-target="#{{ $care->id }}" href="#" title="حذف"> <i style="font-size: 26px;color: #e7505a" class="fa fa-trash-o"></i> </a>
                            </td>
                        </tr>
                        <div class="modal fade" id="{{ $care->id }}" role="dialog">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">حذف العناية {{ $care->name }}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>هل تريد حذف  {{ $care->name }} ؟؟</p>
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open(['url'=>'intensive_care/'.$care->id , 'method'=>'delete']) !!}
                                        <input type="submit" value="نعم" class="btn btn-danger">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h2 class="text-center danger">لا توجد عنايات مركزة بهذه المستشفي</h2>
                @endif
            </div>
        @endif





@stop
