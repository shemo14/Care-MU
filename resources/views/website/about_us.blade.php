@extends('website.layout')
@section('content')


    <div data-on="false" data-md-on="true" class="rd-parallax">
        <div data-speed="0.35" data-type="media" style="margin-top: 90px" data-url="{{ Request::root() }}/website/images/bg-02-1920x660.jpg" class="rd-parallax-layer"></div>
        <div data-speed="0" data-type="html" class="rd-parallax-layer">
            <!-- Classic Breadcrumbs-->
            <section class="breadcrumb-classic context-dark">
                <div class="shell section-35 section-lg-top-85 text-sm-left">
                    <div style="direction: rtl;text-align: right;" class="offset-lg-top-75 offset-sm-top-40">
                        <ul style="direction: rtl;text-align: right;" class="list-inline list-inline-lg list-inline-dashed p">
                            <li><a href="{{ url('/') }}" class="text-light">الرئيسية</a></li>
                            <li class="text-light">من نحن
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </div>

<main class="page-content section-top-70 section-md-top-90">
    <section>
        <div class="shell text-sm-right">
            <h2>عن مكتب الرحاب</h2>
            <hr class="divider divider-lg bg-primary hr-sm-right-0">
            <div class="range range-xs-center range-sm-left offset-top-50">
                <div class="cell-xs-10 cell-sm-5 text-sm-left"><img src="{{ Request::root() }}/{{ $photo->path }}{{ $photo->filename }}" width="451" height="304" alt="" class="img-responsive"></div>
                <div class="cell-xs-10 cell-sm-7 offset-top-50 offset-sm-top-0">
                    <p>{!! $about->desc !!}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- counters-->
    <section class="section-65 section-sm-bottom-95 bg-dark-blue context-dark section-skew section-skew-wide offset-top-110">
        <div class="skew-block"></div>
        <div class="shell text-md-right">
            <h2>متابعينا</h2>
            <hr class="divider divider-lg bg-primary hr-md-right-0">
            <div class="range range-xs-center range-md-left offset-top-50 text-center counters">
                <div class="cell-sm-6 cell-md-3">
                    <!-- Counter type 1-->
                    <div class="counter-type-1">
                        <div>
                            <div class="h2 font-accent"><span data-step="300" data-from="0" data-to="10324" class="counter"></span></div>
                        </div>
                        <div class="offset-top-12">
                            <h6 class="text-gray">زائر</h6>
                        </div>
                    </div>
                </div>
                <div class="cell-sm-6 cell-md-3 offset-top-65 offset-sm-top-0">
                    <!-- Counter type 1-->
                    <div class="counter-type-1">
                        <div>
                            <div class="h2 font-accent"><span data-step="20" data-from="0" data-to="500" class="counter"></span></div>
                        </div>
                        <div class="offset-top-12">
                            <h6 class="text-gray">مشترك</h6>
                        </div>
                    </div>
                </div>
                <div class="cell-sm-6 cell-md-3 offset-top-65 offset-md-top-0">
                    <!-- Counter type 1-->
                    <div class="counter-type-1">
                        <div>
                            <div class="h2 font-accent"><span data-step="1" data-from="0" data-to="10" class="counter"></span></div>
                        </div>
                        <div class="offset-top-12">
                            <h6 class="text-gray">مشرف</h6>
                        </div>
                    </div>
                </div>
                <div class="cell-sm-6 cell-md-3 offset-top-65 offset-md-top-0">
                    <!-- Counter type 1-->
                    <div class="counter-type-1">
                        <div>
                            <div class="h2 font-accent"><span data-step="50" data-from="0" data-to="480" class="counter"></span></div>
                        </div>
                        <div class="offset-top-12">
                            <h6 class="text-gray">عضو</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-85 section-md-top-65 section-skew section-skew-wide bg-white">
        <div class="skew-block"></div>
        <div class="shell text-sm-right">
            <h2>فريق العمل و الادارة</h2>
            <hr class="divider divider-lg bg-primary hr-sm-right-0">
            <div class="range range-xs-center range-sm-left offset-top-50">
                @foreach($teams as $team)
                    <div class="cell-xs-10 cell-sm-6 cell-md-3"><img style="width: 270px;height: 270px;" src="{{ Request::root() }}/{{ $team->path }}{{ $team->filename }}" width="270" height="270" alt="" class="img-responsive reveal-inline-block">
                        <div class="offset-top-20">
                            <h5 class="text-primary"><a href="#">{{ $team->t_name }}</a></h5>
                        </div>
                        <p>{!! $team->desc !!}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>

@stop