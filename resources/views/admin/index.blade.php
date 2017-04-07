@extends('admin.layouts.layout')
@section('content')

            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">الرئيسية</a>
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
            {{--<div class="row">--}}
                {{--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">--}}
                    {{--<a class="dashboard-stat dashboard-stat-v2 blue" href="#">--}}
                        {{--<div class="visual">--}}
                            {{--<i class="fa fa-comments"></i>--}}
                        {{--</div>--}}
                        {{--<div class="details">--}}
                            {{--<div class="number">--}}
                                {{--<span data-counter="counterup" data-value="1349">0</span>--}}
                            {{--</div>--}}
                            {{--<div class="desc"> New Feedbacks </div>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">--}}
                    {{--<a class="dashboard-stat dashboard-stat-v2 red" href="#">--}}
                        {{--<div class="visual">--}}
                            {{--<i class="fa fa-bar-chart-o"></i>--}}
                        {{--</div>--}}
                        {{--<div class="details">--}}
                            {{--<div class="number">--}}
                                {{--<span data-counter="counterup" data-value="12,5">0</span>M$ </div>--}}
                            {{--<div class="desc"> Total Profit </div>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">--}}
                    {{--<a class="dashboard-stat dashboard-stat-v2 green" href="#">--}}
                        {{--<div class="visual">--}}
                            {{--<i class="fa fa-shopping-cart"></i>--}}
                        {{--</div>--}}
                        {{--<div class="details">--}}
                            {{--<div class="number">--}}
                                {{--<span data-counter="counterup" data-value="549">0</span>--}}
                            {{--</div>--}}
                            {{--<div class="desc"> New Orders </div>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">--}}
                    {{--<a class="dashboard-stat dashboard-stat-v2 purple" href="#">--}}
                        {{--<div class="visual">--}}
                            {{--<i class="fa fa-globe"></i>--}}
                        {{--</div>--}}
                        {{--<div class="details">--}}
                            {{--<div class="number"> +--}}
                                {{--<span data-counter="counterup" data-value="89"></span>% </div>--}}
                            {{--<div class="desc"> Brand Popularity </div>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="clearfix"></div>
            <!-- END DASHBOARD STATS 1-->
            <h1 class="page-title"> المستشفيات
                <a href="{{ url('hospital/create') }}" class="btn btn-success pull-right">اضافة جديدة + </a>
            </h1>
            <div class="row">
                @foreach($hospitals as $hospital)
                    <a href="{{ url('hospital') .'/'. $hospital->id }}">
                        <div class="col-md-4 text-center" >
                            <div class="dashboard-stat dashboard-stat-v2" style="background-color: #eee;">
                                @if($hospital->path != '' && $hospital->filename != '')
                                    <img class="img-circle text-center" style="width: 150px;border: 1px solid #36c6d3;padding: 4px;height: 150px;margin-top: 10px;" src="{{ Request::root() }}/{{ $hospital->path }}{{ $hospital->filename }}" alt="شعار المستشفى" />
                                    <h2>{{ $hospital->name }}</h2>
                                @else
                                    <img class="img-circle text-center" style="width: 150px;border: 1px solid #36c6d3;padding: 4px;height: 150px;margin-top: 10px;" src="{{ Request::root() }}/admin/hospital.png" alt="شعار المستشفى" />
                                    <h2>{{ $hospital->name }}</h2>
                                @endif
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
    <a href="javascript:;" class="page-quick-sidebar-toggler">
        <i class="icon-login"></i>
    </a>

    <!-- END QUICK SIDEBAR -->



@stop
