@extends('user.layouts.layout')
@section('content')


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
                        <span>جدول المواعيد</span>
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
            <h1 class="page-title" style="margin-bottom: 10px">جدول المواعيد</h1>

            <div class="row">
                <div class="col-md-12">

                    {!! Form::open(['url'=>'user','method'=>'post','files'=>'true']) !!}
                    @if(Auth::user()->part == 'شهر كامل' || Auth::user()->part == 'اخوة' || Auth::user()->part == 'نصف شهر')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <col>
                                    <colgroup span="2"></colgroup>
                                    <colgroup span="2"></colgroup>
                                    <tr>
                                        <td rowspan="2"></td>
                                        <th colspan="{{ count($go) }}" style="text-align: center;" scope="colgroup">مواعيد الذهاب</th>
                                        <th colspan="{{ count($come) }}" style="text-align: center;" scope="colgroup">مواعيد العودة</th>
                                    </tr>
                                    <tr>
                                        @foreach($times as $time)
                                            <th scope="col">{{ date("g:i", strtotime($time->time)) }}</th>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <th scope="row">السبت</th>
                                        @for($i=0;$i < count($times);$i++)
                                            @if($times[$i]['type'] == 'ذهاب')
                                                <td>
                                                    <div class="md-radio">
                                                        <input type="radio" id="{{ $times[$i]['id'] }}sat" name="go_sat" value="{{ $times[$i]['time'] }}" class="md-radiobtn">
                                                        <label for="{{ $times[$i]['id'] }}sat">
                                                            <span class="inc"></span>
                                                            <span class="check"></span>
                                                            <span style="border: none;" class="box"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            @else
                                                <td>
                                                    <div class="md-radio">
                                                        <input type="radio" id="{{ $times[$i]['id'] }}sat" name="come_sat" value="{{ $times[$i]['time'] }}" class="md-radiobtn">
                                                        <label for="{{ $times[$i]['id'] }}sat">
                                                            <span class="inc"></span>
                                                            <span class="check"></span>
                                                            <span style="border: none;" class="box"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            @endif
                                        @endfor
                                    </tr>
                                    <tr>
                                        <th scope="row">الأحد</th>
                                        @for($i=0;$i < count($times);$i++)
                                            @if($times[$i]['type'] == 'ذهاب')
                                                <td>
                                                    <div class="md-radio">
                                                        <input type="radio" id="{{ $times[$i]['id'] }}sun" name="go_sun" value="{{ $times[$i]['time'] }}" class="md-radiobtn">
                                                        <label for="{{ $times[$i]['id'] }}sun">
                                                            <span class="inc"></span>
                                                            <span class="check"></span>
                                                            <span style="border: none;" class="box"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            @else
                                                <td>
                                                    <div class="md-radio">
                                                        <input type="radio" id="{{ $times[$i]['id'] }}sun" name="come_sun" value="{{ $times[$i]['time'] }}" class="md-radiobtn">
                                                        <label for="{{ $times[$i]['id'] }}sun">
                                                            <span class="inc"></span>
                                                            <span class="check"></span>
                                                            <span style="border: none;" class="box"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            @endif
                                        @endfor
                                    </tr>
                                    <tr>
                                        <th scope="row">الاثنين</th>
                                        @for($i=0;$i < count($times);$i++)
                                            @if($times[$i]['type'] == 'ذهاب')
                                                <td>
                                                    <div class="md-radio">
                                                        <input type="radio" id="{{ $times[$i]['id'] }}mon" name="go_mon" value="{{ $times[$i]['time'] }}" class="md-radiobtn">
                                                        <label for="{{ $times[$i]['id'] }}mon">
                                                            <span class="inc"></span>
                                                            <span class="check"></span>
                                                            <span style="border: none;" class="box"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            @else
                                                <td>
                                                    <div class="md-radio">
                                                        <input type="radio" id="{{ $times[$i]['id'] }}mon" name="come_mon" value="{{ $times[$i]['time'] }}" class="md-radiobtn">
                                                        <label for="{{ $times[$i]['id'] }}mon">
                                                            <span class="inc"></span>
                                                            <span class="check"></span>
                                                            <span style="border: none;" class="box"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            @endif
                                        @endfor
                                    </tr>
                                    <tr>
                                        <th scope="row">الثلاثاء</th>
                                        @for($i=0;$i < count($times);$i++)
                                            @if($times[$i]['type'] == 'ذهاب')
                                                <td>
                                                    <div class="md-radio">
                                                        <input type="radio" id="{{ $times[$i]['id'] }}tus" name="go_tus" value="{{ $times[$i]['time'] }}" class="md-radiobtn">
                                                        <label for="{{ $times[$i]['id'] }}tus">
                                                            <span class="inc"></span>
                                                            <span class="check"></span>
                                                            <span style="border: none;" class="box"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            @else
                                                <td>
                                                    <div class="md-radio">
                                                        <input type="radio" id="{{ $times[$i]['id'] }}tus" name="come_tus" value="{{ $times[$i]['time'] }}" class="md-radiobtn">
                                                        <label for="{{ $times[$i]['id'] }}tus">
                                                            <span class="inc"></span>
                                                            <span class="check"></span>
                                                            <span style="border: none;" class="box"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            @endif
                                        @endfor
                                    </tr>
                                    <tr>
                                        <th scope="row">الاربعاء</th>
                                        @for($i=0;$i < count($times);$i++)
                                            @if($times[$i]['type'] == 'ذهاب')
                                                <td>
                                                    <div class="md-radio">
                                                        <input type="radio" id="{{ $times[$i]['id'] }}wen" name="go_wen" value="{{ $times[$i]['time'] }}" class="md-radiobtn">
                                                        <label for="{{ $times[$i]['id'] }}wen">
                                                            <span class="inc"></span>
                                                            <span class="check"></span>
                                                            <span style="border: none;" class="box"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            @else
                                                <td>
                                                    <div class="md-radio">
                                                        <input type="radio" id="{{ $times[$i]['id'] }}wen" name="come_wen" value="{{ $times[$i]['time'] }}" class="md-radiobtn">
                                                        <label for="{{ $times[$i]['id'] }}wen">
                                                            <span class="inc"></span>
                                                            <span class="check"></span>
                                                            <span style="border: none;" class="box"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            @endif
                                        @endfor
                                    </tr>
                                    <tr>
                                        <th scope="row">الخميس</th>
                                        @for($i=0;$i < count($times);$i++)
                                            @if($times[$i]['type'] == 'ذهاب')
                                                <td>
                                                    <div class="md-radio">
                                                        <input type="radio" id="{{ $times[$i]['id'] }}ther" name="go_ther" value="{{ $times[$i]['time'] }}" class="md-radiobtn">
                                                        <label for="{{ $times[$i]['id'] }}ther">
                                                            <span class="inc"></span>
                                                            <span class="check"></span>
                                                            <span style="border: none;" class="box"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            @else
                                                <td>
                                                    <div class="md-radio">
                                                        <input type="radio" id="{{ $times[$i]['id'] }}ther" name="come_ther" value="{{ $times[$i]['time'] }}" class="md-radiobtn">
                                                        <label for="{{ $times[$i]['id'] }}ther">
                                                            <span class="inc"></span>
                                                            <span class="check"></span>
                                                            <span style="border: none;" class="box"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            @endif
                                        @endfor
                                    </tr>
                                </table>
                               </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <input type="submit" value="حفظ" class="btn btn-success">
                                <input type="reset" value="مسح" class="btn btn-defult">
                            </div>
                        </div>
                    @elseif(Auth::user()->part == 'ذهاب فقط')
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="table-responsive">
                                    <table style="width: 500px;margin: 10px auto;overflow: auto" class="table table-bordered table-striped table-condensed flip-content table-hover">
                                        <col>
                                        <colgroup span="2"></colgroup>
                                        <colgroup span="2"></colgroup>
                                        <tr>
                                            <td rowspan="2"></td>
                                            <th colspan="{{ count($go) }}" style="text-align: center;" scope="colgroup">مواعيد الذهاب</th>
                                        </tr>
                                        <tr>
                                            @foreach($times as $time)
                                                @if($time->type == 'ذهاب')
                                                    <th style="text-align: center" scope="col">{{ date("g:i", strtotime($time->time)) }}</th>
                                                @endif
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th scope="row">السبت</th>
                                            @for($i=0;$i < count($times);$i++)
                                                @if($times[$i]['type'] == 'ذهاب')
                                                    <td>
                                                        <div class="md-radio">
                                                            <input type="radio" id="{{ $times[$i]['id'] }}sat" name="go_sat" value="{{ $times[$i]['time'] }}" class="md-radiobtn">
                                                            <label for="{{ $times[$i]['id'] }}sat">
                                                                <span class="inc" style="right: 0"></span>
                                                                <span class="check" style="margin-right: 20%"></span>
                                                                <span style="border: none;" class="box"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                @endif
                                            @endfor
                                        </tr>
                                        <tr>
                                            <th scope="row">الأحد</th>
                                            @for($i=0;$i < count($times);$i++)
                                                @if($times[$i]['type'] == 'ذهاب')
                                                    <td>
                                                        <div class="md-radio">
                                                            <input type="radio" id="{{ $times[$i]['id'] }}sun" name="go_sun" value="{{ $times[$i]['time'] }}" class="md-radiobtn">
                                                            <label for="{{ $times[$i]['id'] }}sun">
                                                                <span class="inc" style="right: 0"></span>
                                                                <span class="check" style="margin-right: 20%"></span>
                                                                <span style="border: none;" class="box"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                @endif
                                            @endfor
                                        </tr>
                                        <tr>
                                            <th scope="row">الاثنين</th>
                                            @for($i=0;$i < count($times);$i++)
                                                @if($times[$i]['type'] == 'ذهاب')
                                                    <td>
                                                        <div class="md-radio">
                                                            <input type="radio" id="{{ $times[$i]['id'] }}mon" name="go_mon" value="{{ $times[$i]['time'] }}" class="md-radiobtn">
                                                            <label for="{{ $times[$i]['id'] }}mon">
                                                                <span class="inc" style="right: 0"></span>
                                                                <span class="check" style="margin-right: 20%"></span>
                                                                <span style="border: none;" class="box"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                @endif
                                            @endfor
                                        </tr>
                                        <tr>
                                            <th scope="row">الثلاثاء</th>
                                            @for($i=0;$i < count($times);$i++)
                                                @if($times[$i]['type'] == 'ذهاب')
                                                    <td>
                                                        <div class="md-radio">
                                                            <input type="radio" id="{{ $times[$i]['id'] }}tus" name="go_tus" value="{{ $times[$i]['time'] }}" class="md-radiobtn">
                                                            <label for="{{ $times[$i]['id'] }}tus">
                                                                <span class="inc" style="right: 0"></span>
                                                                <span class="check" style="margin-right: 20%"></span>
                                                                <span style="border: none;" class="box"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                @endif
                                            @endfor
                                        </tr>
                                        <tr>
                                            <th scope="row">الاربعاء</th>
                                            @for($i=0;$i < count($times);$i++)
                                                @if($times[$i]['type'] == 'ذهاب')
                                                    <td>
                                                        <div class="md-radio">
                                                            <input type="radio" id="{{ $times[$i]['id'] }}wen" name="go_wen" value="{{ $times[$i]['time'] }}" class="md-radiobtn">
                                                            <label for="{{ $times[$i]['id'] }}wen">
                                                                <span class="inc" style="right: 0"></span>
                                                                <span class="check" style="margin-right: 20%"></span>
                                                                <span style="border: none;" class="box"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                @endif
                                            @endfor
                                        </tr>
                                        <tr>
                                            <th scope="row">الخميس</th>
                                            @for($i=0;$i < count($times);$i++)
                                                @if($times[$i]['type'] == 'ذهاب')
                                                    <td>
                                                        <div class="md-radio">
                                                            <input type="radio" id="{{ $times[$i]['id'] }}ther" name="go_ther" value="{{ $times[$i]['time'] }}" class="md-radiobtn">
                                                            <label for="{{ $times[$i]['id'] }}ther">
                                                                <span class="inc" style="right: 0"></span>
                                                                <span class="check" style="margin-right: 20%"></span>
                                                                <span style="border: none;" class="box"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                @endif
                                            @endfor
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <input type="submit" value="حفظ" class="btn btn-success">
                                <input type="reset" value="مسح" class="btn btn-defult">
                            </div>
                        </div>
                    @elseif(Auth::user()->part == 'عودة فقط')
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="table-responsive">
                                    <table style="width: 700px;margin: 10px auto;overflow: auto" class="table table-bordered table-striped table-condensed flip-content table-hover">
                                        <col>
                                        <colgroup span="2"></colgroup>
                                        <colgroup span="2"></colgroup>
                                        <tr>
                                            <td rowspan="2"></td>
                                            <th colspan="{{ count($come) }}" style="text-align: center;" scope="colgroup">مواعيد العودة</th>
                                        </tr>
                                        <tr>
                                            @foreach($times as $time)
                                                @if($time->type == 'عودة')
                                                    <th style="text-align: center" scope="col">{{ date("g:i", strtotime($time->time)) }}</th>
                                                @endif
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th scope="row">السبت</th>
                                            @for($i=0;$i < count($times);$i++)
                                                @if($times[$i]['type'] == 'عودة')
                                                    <td>
                                                        <div class="md-radio">
                                                            <input type="radio" id="{{ $times[$i]['id'] }}sat" name="come_sat" value="{{ $times[$i]['time'] }}" class="md-radiobtn">
                                                            <label for="{{ $times[$i]['id'] }}sat">
                                                                <span class="inc" style="right: 0"></span>
                                                                <span class="check" style="margin-right: 20%"></span>
                                                                <span style="border: none;" class="box"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                @endif
                                            @endfor
                                        </tr>
                                        <tr>
                                            <th scope="row">الأحد</th>
                                            @for($i=0;$i < count($times);$i++)
                                                @if($times[$i]['type'] == 'عودة')
                                                    <td>
                                                        <div class="md-radio">
                                                            <input type="radio" id="{{ $times[$i]['id'] }}sun" name="come_sun" value="{{ $times[$i]['time'] }}" class="md-radiobtn">
                                                            <label for="{{ $times[$i]['id'] }}sun">
                                                                <span class="inc" style="right: 0"></span>
                                                                <span class="check" style="margin-right: 20%"></span>
                                                                <span style="border: none;" class="box"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                @endif
                                            @endfor
                                        </tr>
                                        <tr>
                                            <th scope="row">الاثنين</th>
                                            @for($i=0;$i < count($times);$i++)
                                                @if($times[$i]['type'] == 'عودة')
                                                    <td>
                                                        <div class="md-radio">
                                                            <input type="radio" id="{{ $times[$i]['id'] }}mon" name="come_mon" value="{{ $times[$i]['time'] }}" class="md-radiobtn">
                                                            <label for="{{ $times[$i]['id'] }}mon">
                                                                <span class="inc" style="right: 0"></span>
                                                                <span class="check" style="margin-right: 20%"></span>
                                                                <span style="border: none;" class="box"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                @endif
                                            @endfor
                                        </tr>
                                        <tr>
                                            <th scope="row">الثلاثاء</th>
                                            @for($i=0;$i < count($times);$i++)
                                                @if($times[$i]['type'] == 'عودة')
                                                    <td>
                                                        <div class="md-radio">
                                                            <input type="radio" id="{{ $times[$i]['id'] }}tus" name="come_tus" value="{{ $times[$i]['time'] }}" class="md-radiobtn">
                                                            <label for="{{ $times[$i]['id'] }}tus">
                                                                <span class="inc" style="right: 0"></span>
                                                                <span class="check" style="margin-right: 20%"></span>
                                                                <span style="border: none;" class="box"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                @endif
                                            @endfor
                                        </tr>
                                        <tr>
                                            <th scope="row">الاربعاء</th>
                                            @for($i=0;$i < count($times);$i++)
                                                @if($times[$i]['type'] == 'عودة')
                                                    <td>
                                                        <div class="md-radio">
                                                            <input type="radio" id="{{ $times[$i]['id'] }}wen" name="come_wen" value="{{ $times[$i]['time'] }}" class="md-radiobtn">
                                                            <label for="{{ $times[$i]['id'] }}wen">
                                                                <span class="inc" style="right: 0"></span>
                                                                <span class="check" style="margin-right: 20%"></span>
                                                                <span style="border: none;" class="box"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                @endif
                                            @endfor
                                        </tr>
                                        <tr>
                                            <th scope="row">الخميس</th>
                                            @for($i=0;$i < count($times);$i++)
                                                @if($times[$i]['type'] == 'عودة')
                                                    <td>
                                                        <div class="md-radio">
                                                            <input type="radio" id="{{ $times[$i]['id'] }}ther" name="come_ther" value="{{ $times[$i]['time'] }}" class="md-radiobtn">
                                                            <label for="{{ $times[$i]['id'] }}ther">
                                                                <span class="inc" style="right: 0"></span>
                                                                <span class="check" style="margin-right: 20%"></span>
                                                                <span style="border: none;" class="box"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                @endif
                                            @endfor
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <input type="submit" value="حفظ" class="btn btn-success">
                                <input type="reset" value="مسح" class="btn btn-defult">
                            </div>
                        </div>
                    @endif
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
        <!-- END CONTENT BODY -->
    </div>

@stop
