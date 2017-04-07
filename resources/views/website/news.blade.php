@extends('website.layout')
@section('content')
    <style>
        p{
            text-align: right;
        }
    </style>

    <div data-on="false" data-md-on="true" class="rd-parallax">
        <div data-speed="0.35" data-type="media" style="margin-top: 90px" data-url="{{ Request::root() }}/website/images/bg-02-1920x660.jpg" class="rd-parallax-layer"></div>
        <div data-speed="0" data-type="html" class="rd-parallax-layer">
            <!-- Classic Breadcrumbs-->
            <section class="breadcrumb-classic context-dark">
                <div class="shell section-35 section-lg-top-85 text-sm-left">
                    <div style="direction: rtl;text-align: right;" class="offset-lg-top-75 offset-sm-top-40">
                        <ul style="direction: rtl;text-align: right;" class="list-inline list-inline-lg list-inline-dashed p">
                            <li><a href="{{ url('/') }}" class="text-light">الرئيسية</a></li>
                            <li><a href="{{ url('all_news') }}" class="text-light">الاخبار</a></li>
                            <li class="text-light">{{ $news->title }}
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </div>
<!-- Page Content-->
<main class="page-content">
    <!-- Latest news-->
    <section class="section-70 section-md-90">
        <div class="shell">
            <div class="range text-sm-left range-xs-center">
                <div class="cell-xs-10 cell-md-8" style="direction: rtl">
                    <article class="post-default">
                        <div style="text-align: right;">
                            <h2 class="text-uppercase text-bold">{{ $news->title }}</h2>
                        </div>
                        <div class="offset-top-10">
                            <hr class="divider divider-lg bg-primary hr-sm-right-0">
                        </div>
                        <div class="offset-top-50"><img src="{{ Request::root() }}/{{ $news->path }}{{ $news->filename }}" width="770" height="520" alt="" class="img-responsive"></div>
                        <div class="offset-top-25">
                            <div class="post-meta">
                                <ul class="list-inline" style="text-align: right;">
                                    <li><span class="icon icon-xxs fa-calendar text-gray text-middle"></span>
                                        <time datetime="2016-01-01" class="text-gray inset-left-5 text-middle">{{ $news->date }}</time>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <p style="text-align: right;">{!! $news->desc !!}</p>

                        <div class="offset-top-20" style="text-align: right;"><span class="text-gray text-light text-middle">مشاركة : </span>
                            <ul class="list-inline reveal-inline-block inset-left-15 list-inline-dark">
                                <li>
                                    <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="large" data-mobile-iframe="true"><a style="padding: 5px;" class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">مشاركة</a></div>
                                </li>
                                <li><a class="twitter-share-button"
                                       style="background-color: #1b95e0;color: #fff;padding: 2px 8px;border-radius: 5px;"
                                       href="https://twitter.com/share"
                                       data-size="large"
                                       data-text="custom share text"
                                       data-url="https://dev.twitter.com/web/tweet-button"
                                       data-hashtags="example,demo"
                                       data-via="twitterdev"
                                       data-related="twitterapi,twitter">
                                        تغريد <i class="fa fa-twitter"></i>
                                    </a></li>
                                <li><a style="    background-color: #c53929;color: #ffffff;padding: 2px 5px;border-radius: 5px;" href="https://plus.google.com/share?url={{ url('show_news') .'/'. $news->n_id}}" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">مشاركة <i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </article>

                    <div class="offset-top-70 offset-md-top-90">
                        <h2 class="text-uppercase text-bold" style="direction: rtl;text-align: right;">مواضيع مشابهة</h2>
                        <hr class="divider divider-lg bg-primary hr-sm-right-0">
                        <div class="range range-xs-center offset-top-50">
                            @foreach($related as $relate)
                                <div class="cell-sm-6">
                                    <article class="post-default"><a class="thumbnail-default" href="{{ url('show_news') . '/' . $relate->n_id }}" target="_self">
                                            <figure><img width="770" height="520" src="{{ Request::root() }}/{{ $relate->path }}{{ $relate->filename }}" alt="" class="img-responsive"/></figure><span class="icon icon-xxs fa-link"></span></a>
                                        <div class="offset-top-10">
                                            <h5 style="direction: rtl;text-align: right;" class="text-primary text-bold post-default-title"><a href="{{ url('show_news') . '/' . $relate->n_id }}">{{ $relate->title }}</a></h5>
                                        </div>
                                        <div class="offset-top-15">
                                            <div class="post-meta">
                                                <ul class="list-inline" style="text-align: right;direction: rtl;color: #ffffff">
                                                    <li><span class="icon icon-xxs fa-calendar text-gray text-middle"></span>
                                                        <time datetime="2016-01-01" class="text-gray inset-left-5 text-middle">{{ $relate->date }}</time>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p>
                                            @if(strlen($relate->desc) > 150)
                                                {!! substr($relate->desc, 0, 100) . '...' !!}
                                            @else
                                                {!! $relate->desc !!}
                                            @endif
                                        </p>
                                        <div class="offset-top-20"><a href="{{ url('show_news') . '/' . $relate->n_id }}" class="btn btn-primary btn-sm">اقرأ المزيد</a></div>
                                    </article>
                                </div>
                            @endforeach
                            {{--<div class="cell-sm-6 offset-top-70 offset-sm-top-0">--}}
                                {{--<article class="post-default"><a class="thumbnail-default" href="#" target="_self">--}}
                                        {{--<figure><img width="770" height="520" src="{{ Request::root() }}/{{ $news->path }}{{ $news->filename }}" alt="" class="img-responsive"/></figure><span class="icon icon-xxs fa-link"></span></a>--}}
                                    {{--<div class="offset-top-10">--}}
                                        {{--<h5 class="text-primary text-bold post-default-title"><a href="#">Don’t Push for Profitability Pull! You Need to Know:</a></h5>--}}
                                    {{--</div>--}}
                                    {{--<div class="offset-top-15">--}}
                                        {{--<div class="post-meta">--}}
                                            {{--<ul class="list-inline">--}}
                                                {{--<li><span class="icon icon-xxs fa-calendar text-gray text-middle"></span>--}}
                                                    {{--<time datetime="2016-01-01" class="text-gray inset-left-5 text-middle">January 10, 2016, 16:40</time>--}}
                                                {{--</li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<p>Operational costs consume much of the revenue a carrier can earn and is therefore suspect in being the biggest drain on profits for most carriers. The majority of operational costs are incurred the moment the driver is dispatched to the customer’s facility for a pick up or delivery. Along the way to the customer’s dock, costs impact the carrier’s earnings in the form of fuel/oil costs, tractor/trailer payments, repair...</p>--}}
                                    {{--<div class="offset-top-20"><a href="#" class="btn btn-primary btn-sm">learn more</a></div>--}}
                                {{--</article>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    <div class="offset-top-70 offset-md-top-90">
                        <h2 class="text-uppercase text-bold" style="direction: rtl;text-align: right;">التعليقات</h2>
                        <hr class="divider divider-lg bg-primary hr-sm-right-0">
                        <div class="offset-top-30">
                            <!-- Box Comment-->
                            <div class="fb-comments" data-href="{{ url('show_news') . '/' . $news->n_id }}" data-width="800" data-numposts="5"></div>

                        </div>
                    </div>
                </div>
                <div class="cell-xs-10 cell-sm-8 cell-md-4 offset-top-90 offset-md-top-0">
                    <div class="inset-lg-left-30 inset-md-left-15">
                        <div class="range">
                            <aside class="text-right">
                                <div class="cell-xs-12 cell-xs-push-1 cell-md-push-1">
                                    <!-- Aside post-->
                                    <h5 style="direction: rtl;text-align: right">عن الرحاب</h5>
                                    <div class="text-subline"></div>
                                    <article class="post-default text-right">
                                        <div class="offset-top-30"><img src="{{ Request::root() }}/{{ $photo->path }}{{ $photo->filename }}" width="340" height="220" alt="" class="img-responsive reveal-inline-block"></div>
                                        <div class="offset-top-20">
                                            <p>
                                                @if(strlen($about->desc) > 250)
                                                    {!! substr($about->desc, 0, 250) . '...' !!}
                                                @else
                                                    {!! $about->desc !!}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="offset-top-20"><a href="{{ url('about_us') }}" class="btn btn-primary btn-sm"> اقرأ المزيد</a></div>
                                    </article>
                                </div>
                                <div class="offset-top-60 cell-xs-push-2 cell-xs-6 cell-md-push-1 cell-md-12">
                                    <!-- Category-->
                                    <h5>اخر الاخبار</h5>
                                    <div class="text-subline"></div>
                                    <ul style="direction: rtl;text-align: right" class="list list-marked list-marked-primary offset-top-30">
                                        @foreach($lastNews as $news)
                                            <li><a href="{{ url('show_news') . '/' . $news->n_id }}">{{ $news->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="cell-xs-12 offset-top-60 cell-xs-push-4 cell-md-push-1">
                                    <!-- Flickr Feed-->
                                    <h5>اهم الصور</h5>
                                    <div class="text-subline"></div>
                                    <div class="offset-top-30 text-center">
                                        <div data-photo-swipe-gallery="" class="group-sm">
                                            @foreach($lastNews as $news)
                                                <a data-photo-swipe-item="" href="{{ Request::root() }}/{{ $news->path }}{{ $news->filename }}" data-image_c="href" data-size="800x800" data-type="flickr-item" class="flickr-item thumbnail-classic">
                                                    <img width="165" height="165" data-title="alt" src="{{ Request::root() }}/{{ $news->path }}{{ $news->filename }}" alt="" data-image_q="src">
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="cell-xs-12 offset-top-60 cell-xs-push-5 cell-md-push-1">
                                    <!-- Recent Posts-->
                                    <h5>اهم الاخبار</h5>
                                    <div class="text-subline"></div>
                                    @foreach($bestNews as $news)
                                        <div class="offset-top-30">
                                            <p class="text-bold text-primary font-accent text-line-height-125"><a href="{{ url('show_news') .'/'. $news->id }}">{{ $news->title }}</a></p>
                                            <ul class="list-inline" style="direction: rtl">
                                                <li><span class="icon icon-xxs fa-calendar text-gray text-middle"></span>
                                                    <time datetime="2016-01-01" class="text-gray inset-left-5 text-middle">{{ $news->date }}</time>
                                                </li>
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>

                                {{--<div class="cell-xs-12 offset-top-60 text-center cell-xs-push-7 cell-md-push-1"><a href="#"><img src="{{ Request::root() }}/website/images/banner-340x500.jpg" width="340" height="500" alt="" class="img-responsive reveal-inline-block"></a></div>--}}
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@stop