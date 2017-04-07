@extends('admin.layouts.layout')
@section('style')
    <link href="{{ Request::root() }}/admin/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ Request::root() }}/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css" rel="stylesheet" type="text/css" />
@stop

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ url('admin_test') }}">الرئيسية</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ url('payment') }}">المشتركين</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ url('payment/create') }}">قائمة المشتركين</a>
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
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> قائمة المشتركين</span>
                </div>
                <a href="#" onclick="window.print()" class="btn btn-success" style="float: left"> تنزيل قائمة المشتركين</a>
            </div>
        </div>
    </div>
    <div id="editor"></div>
    <div id="list">
    @foreach($users as $user)
        <div class="row" style="border: 1px solid #000000;margin: 10px;">
            <div class="col-md-5">
                <table style="width: 400px;margin-top: 20px" class="table table-hover">
                    <tbody>
                    <tr>
                        <td style="font-size: 20px;">الاسم : </td>
                        <td style="font-size: 20px;">{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td style="font-size: 20px;">الاشتراك : </td>
                        <td style="font-size: 20px;">{{ $user->part }}</td>
                    </tr>
                    <tr>
                        <td style="font-size: 20px;">الرسوم : </td>
                        <td style="font-size: 20px;">{{ \App\Cities::where('city',$user->address)->first()->cost }} جنية</td>
                    </tr>
                        <tr>
                            <td style="font-size: 20px;">المدفوع : </td>
                            <td style="font-size: 20px;">
                                @foreach(\App\Payments::where('user_id',$user->id)->get() as $pay)
                                    <span>{{ $pay->month }} ,</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-7" style="text-align: left;">
                <img class="img-thumbnail" style="height: 320px;margin: 20px;" src="{{ Request::root() }}/{{ \App\Files::where('linkedid',$user->id)->first()->path }}{{ \App\Files::where('linkedid',$user->id)->first()->filename }}" alt="">
            </div>
            <div class="modal fade" id="{{ $user->id }}" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">حذف المشترك</h4>
                        </div>
                        <div class="modal-body">
                            <p>هل تريد حذف المشترك {{ $user->name }} ؟؟</p>
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
        </div>
    @endforeach
    </div>


@stop
@section('script')
    <script src="{{ Request::root() }}/admin/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="{{ Request::root() }}/admin/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="{{ Request::root() }}/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <script src="{{ Request::root() }}/admin/pages/scripts/table-datatables-editable.min.js" type="text/javascript"></script>
@stop

