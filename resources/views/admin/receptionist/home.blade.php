@extends('admin.layouts.layout')
@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ url('/') }}">الرئيسية</a>
                <i class="fa fa-circle"></i>
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
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <!-- BEGIN DASHBOARD STATS 1-->
    <div class="clearfix"></div>
    <!-- END DASHBOARD STATS 1-->
    <h1 class="page-title"> السرير
    </h1>
    @if(count($cares) > 0)
        @foreach($cares as $care)
            <div class="hospital" style="border-bottom: 1px solid #ddd;padding-bottom: 20px;">
                <h2><i class="fa fa-hospital-o" style="margin-left: 10px;font-size: 24px;color: #36c6d3;"></i>{{ $care->name }}</h2>
                <div style="height: 2px;width: 100px;background-color: #000;"></div>
                        <div class="row">
                            @if(count(\App\Bed::where('hospital',Auth::user()->hospital)->where('care',$care->id)->get()) > 0)
                                @foreach(\App\Bed::where('hospital',Auth::user()->hospital)->where('care',$care->id)->get() as $bed)
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center" style="margin-top: 20px;">
                                        <div class="dashboard-stat dashboard-stat-v2" style="background-color: #eee;">
                                            @if($bed->type == 'empty')
                                                <i class="fa fa-bed" style="font-size: 55px;color:#36c6d3;border-radius: 50%;border: 1px solid;padding: 35px 15px;margin-top: 10px;"></i>
                                                <p style="font-size: 20px;margin: 10px 0;">{{ $bed->number }}</p>
                                            @else
                                                <i class="fa fa-bed" style="font-size: 55px;border-radius: 50%;color:#D91E18;border: 1px solid;padding: 35px 15px;margin-top: 10px;"></i>
                                                <p style="font-size: 20px;margin: 10px 0;">{{ $bed->number }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="modal fade" id="{{ $bed->id }}" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">حذف السرير رقم {{ $bed->number }}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>هل تريد حذف السرير رقم  {{ $bed->number }} ؟؟</p>
                                                </div>
                                                <div class="modal-footer">
                                                    {!! Form::open(['url'=>'beds/'.$bed->id , 'method'=>'delete']) !!}
                                                    <input type="submit" value="نعم" class="btn btn-danger">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-center" style="color: #D91E18;font-size: 20px"> لا يوجد سرير بهذه العناية</p>
                            @endif
                        </div>
            </div>
        @endforeach
    @else
        <p class="text-center" style="color: #D91E18;font-size: 20px"> لا توجد عنايات مركزة</p>
    @endif

    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
    <a href="javascript:;" class="page-quick-sidebar-toggler">
        <i class="icon-login"></i>
    </a>

    <!-- END QUICK SIDEBAR -->



@stop
