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
                <a href="{{ url('time') }}">مواعيد التوصيل</a>
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
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> تسجيل دفع المشتركين</span>
                    </div>
                    {!! Form::open(['url'=>'payment','method'=>'post']) !!}
                    <div class="actions">
                        <div style="float: left;" class="btn-group btn-group-devided">
                            <input type="submit" value="حفظ" class="btn btn-success">
                            <a href="#" class="btn btn-danger">حذف</a>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group pull-right">
                                    <select name="month" class="form-control">
                                        <option value="يناير">يناير</option>
                                        <option value="فبراير">فبراير</option>
                                        <option value="مارس">مارس</option>
                                        <option value="ابريل">ابريل</option>
                                        <option value="مايو">مايو</option>
                                        <option value="يونيو">يونيو</option>
                                        <option value="يوليو">يوليو</option>
                                        <option value="اغسطس">اغسطس</option>
                                        <option value="سبتمبر">سبتمبر</option>
                                        <option value="اكتوبر">اكتوبر</option>
                                        <option value="نوفمبر">نوفمبر</option>
                                        <option value="ديسمبر">ديسمبر</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                        <thead>
                        <tr>
                            <th>م</th>
                            <th width="250px;" style="text-align: center"> الاسم </th>
                            <th> العنوان </th>
                            <th> الاشتراك </th>
                            <th> التكلفة </th>
                            <th> الاشهر المدفوعة </th>
                            <th>
                         اختيار الكل<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="group-checkable" onclick="toggle(this)" />
                                    <span></span>
                                    </label>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @for($i=0;$i < count($users);$i++)
                            <tr class="odd gradeX">
                                <td>{{ $i + 1 }}</td>
                                <td style="text-align: center"> {{ $users[$i]['name'] }} </td>
                                <td>{{ $users[$i]['address'] }}</td>
                                <td>{{ $users[$i]['part'] }}</td>
                                <td class="center"> {{ \App\Cities::where('city',$users[$i]['address'])->first()->cost }} جنية</td>
                                <td>
                                    @foreach(App\Payments::where('user_id',$users[$i]['id'])->get() as $pay)
                                        <span>{{ $pay->month }} ,</span>
                                    @endforeach
                                </td>
                                <td>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" name="user_id[]" class="checkboxes" value="{{ $users[$i]['id'] }}" />
                                        <span></span>
                                    </label>
                                </td>
                            </tr>
                        @endfor
                        {!! Form::close() !!}
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>


    <script>
        function toggle(source) {
            checkboxes = document.getElementsByName('user_id[]');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
            }
        }
    </script>


@stop
@section('script')
    <script src="{{ Request::root() }}/admin/global/scripts/app.min.js" type="text/javascript"></script>
    <script src="{{ Request::root() }}/admin/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
@stop

