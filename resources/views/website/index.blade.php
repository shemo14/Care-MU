@extends('website.layout')
@section('content')
  <style>
    p{
      text-align: center;
    }
    .about{
      text-align: right;
    }
    .about p{
      text-align: right;
    }
  </style>

<!-- Page Content-->
  <section class="context-dark bg-dark-blue">
    <!-- Swiper-->
    <div data-height="35.5%" data-loop="true" data-dragable="false" data-min-height="480px" data-slide-effect="true" class="swiper-container swiper-slider">
      <div class="swiper-wrapper">
        <div data-slide-bg="{{ Request::root() }}/website/images/bg-02-1920x660.jpg" style="background-position: center center" class="swiper-slide">
             <div class="swiper-slide-caption">
            <div class="container">
              <div class="range range-xs-center range-lg-right">
                <div class="cell-lg-7 text-lg-right cell-xs-10">
                  <div data-caption-animate="fadeInUp" data-caption-delay="150" class="offset-top-30">
                    <h4 class="font-default text-light text-spacing-20 veil-sm">Learn more about Air Freight</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div data-slide-bg="{{ Request::root() }}/website/images/bg-03-1918x761.jpg" style="background-position: center center" class="swiper-slide">
     <div class="swiper-slide-caption">
            <div class="container">
              <div class="range range-xs-center range-lg-left">
                <div class="cell-lg-7 text-lg-left cell-xs-10">
                  <div data-caption-animate="fadeInUp" data-caption-delay="100">
                  </div>
                  <div data-caption-animate="fadeInUp" data-caption-delay="150" class="offset-top-30">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div data-slide-bg="{{ Request::root() }}/website/images/bg-04-1918x660.jpg" style="background-position: center center" class="swiper-slide">
          <div class="swiper-slide-caption">
            <div class="container">
              <div class="range range-xs-center range-lg-left">
                <div class="cell-lg-7 text-lg-left cell-xs-10">
                  <div data-caption-animate="fadeInUp" data-caption-delay="200">
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Swiper Pagination-->
      <div class="swiper-pagination"></div>

    </div>
  </section>
  <!-- Classic Thumbnail-->
  <section class="section-80 section-lg-top-90 section-lg-bottom-120">
    <div class="shell text-sm-right">
      <h2>الرحاب لتوصيل الجامعات</h2>
      <hr class="divider divider-lg bg-primary hr-sm-right-0">
      <div class="range range-xs-center range-sm-right offset-top-50">
        <div style="margin: auto;" class="cell-xs-10 cell-sm-8">
          <center>
            <p style="text-align: center;direction: rtl;">يساهم مكتب الرحاب في توصيل الطلاب الجامعيين الي اكبر الجامعات علي مستوي الدقهلية مثل جامعة المنصورة و معهد مصر العالي للتكولوجيا (جامعة السلاب)</p>
          </center>
        </div>
      </div>

      <div class="offset-top-50" style="text-align: center;"><a href="{{ url('register') }}" class="btn btn-default btn-sm">للاشتراك من هنا</a></div>
    </div>
  </section>
  <!-- Why choose us-->
  <section class="section-80 section-md-top-65 section-md-bottom-120 bg-dark-blue context-dark section-skew section-skew-wide">
    <div class="skew-block"></div>
    <div class="shell text-md-right">
      <h2>مميزات مكتب الرحاب</h2>
      <hr class="divider divider-lg bg-primary hr-md-right-0">
      <div class="range text-md-left offset-top-50 range-xs-center">
        <div class="cell-sm-8 cell-md-4">
          <div class="unit unit-md unit-md-horizontal text-md-right">
            <div class="unit-body">
              <h4 class="text-bold">Packaging and Storage</h4>
              <p>Our mission is to attract and retain customers by providing Best in Class transportation solutions and fostering a profitable, disciplined culture of safety, service, and trust.</p>
            </div>
            <div style="margin-left: 15px;" class="unit-left"><span class="icon icon-lg icon-circle icon-primary-filled fa-thumbs-up"></span></div>
          </div>
        </div>
        <div class="cell-sm-8 cell-md-4 offset-top-50 offset-md-top-0">
          <div class="unit unit-md unit-md-horizontal text-md-right">
            <div class="unit-body">
              <h4 class="text-bold">Warehousing service </h4>
              <p>We have established a strong presence in the transportation industry. Our award-winning services earn a reputation for quality and excellence that few can rival.</p>
            </div>
            <div style="margin-left: 15px;" class="unit-left"><span class="icon icon-lg icon-circle icon-primary-filled fa-users"></span></div>
          </div>
        </div>
        <div class="cell-sm-8 cell-md-4 offset-top-50 offset-md-top-0">
          <div class="unit unit-md unit-md-horizontal text-md-right">
            <div class="unit-body">
              <h4 class="text-bold">Ground Transport </h4>
              <p>Safety for our employees, customers and motoring public will always remain our primary focus in all the policies, procedures and programs that govern our business.</p>
            </div>
            <div style="margin-left: 15px;" class="unit-left"><span class="icon icon-lg icon-circle icon-primary-filled mdi fa-clock-o"></span></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Our Mission-->
  <section class="bg-lightest section-skew">
    <div class="skew-block"></div>
    <div class="shell text-sm-left">
      <div class="range range-xs-center range-lg-right offset-top-0">
        <div class="cell-xs-10 cell-sm-12 cell-lg-8 section-image-aside section-image-aside-left">
          <div style="background-image: url({{ Request::root() }}/website/images/home-01-746-561.jpg)" class="section-image-aside-img veil reveal-lg-block"></div>
          <div class="section-image-aside-body section-80 offset-lg-top-0 section-lg-90 inset-lg-left-100">
            <h2 style="direction: rtl;text-align: right;">نبذة عن مكتب الرحاب</h2>
            <hr class="divider divider-lg bg-primary hr-sm-right-0">
            <div class="offset-top-20 offset-lg-top-50 about">
              <p style="direction: rtl;text-align: right;">{!! $about->desc !!}</p>
            </div>
            <div class="offset-top-20 text-center"><a href="{{ url('about_us') }}" class="btn btn-primary btn-sm">المزيد</a></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Classic Thumbnail-->
<section class="section-80 section-md-top-65 section-md-bottom-100 bg-dark-blue context-dark section-skew section-skew-wide">
  <div class="skew-block"></div>
  <div class="shell text-md-right">
    <h2>فريق العمل</h2>
    <hr class="divider divider-lg bg-primary hr-md-right-0">
    <div class="offset-top-50">
      <div data-loop="false" data-items="1" data-dots="true" data-mouse-drag="false" data-sm-items="2" data-nav="false" data-margin="30" class="owl-carousel owl-carousel-default">
        @foreach($teams as $team)
          <div>
            <div class="quote">
              <div class="unit unit-md unit-md-horizontal text-md-left">
                <div class="unit-left"><img style="width: 170px;height: 170px" src="{{ Request::root() }}/{{ $team->path }}{{ $team->filename }}" width="140" height="140" alt="" class="img-responsive reveal-inline-block img-circle"></div>
                <div class="unit-body" style="direction: rtl;">
                  <div class="inset-md-right-40">
                    <p>
                      <q>{!! $team->desc !!}</q>
                    </p>
                    <p>
                      <cite>{{ $team->t_name }}</cite>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
  <!-- Latest news-->
  <section class="section-80 section-md-bottom-120">
    <div class="shell text-md-right">
      <h2>اخر الاخبار</h2>
      <hr class="divider divider-lg bg-primary hr-md-right-0">
      <div class="range text-md-left offset-top-50 range-xs-center">
        @foreach($allNews as $news)
          <div class="cell-sm-8 cell-md-4">
            <article class="post-news"><a class="thumbnail-default" href="{{ url('show_news') .'/'. $news->n_id }}" target="_self">
                        <figure><img width="370" height="270" src="{{ Request::root() }}/{{ $news->path }}{{ $news->filename }}" alt="" class="img-responsive"></figure><span class="icon icon-xxs fa-link"></span></a>
              <div class="offset-top-10" style="direction: rtl;text-align: center;">
                <h5 class="text-primary text-bold"><a href="{{ url('show_news') .'/'. $news->n_id }}" class="post-news-title">{{ $news->title }}</a></h5>
              </div>
              <div class="offset-top-15" style="text-align: center">
                <div class="post-meta">
                  <time datetime="2016-01-01" class="text-gray inset-left-5 text-middle">{{ $news->date }}</time>
                  <span style="margin-left: 10px" class="icon icon-xxs fa-calendar text-gray text-middle"></span>
                </div>
              </div>
              <p class="pulled_right news" style="direction: rtl;text-align: center;">
                @if(strlen($news->desc) > 100)
                  {!! substr($news->desc, 0, 80) . '...' !!}
                @else
                  {!! $news->desc !!}
                @endif
              </p>
            </article>
          </div>
        @endforeach
      </div>
      <div class="offset-top-50 text-center"><a href="{{ url('all_news') }}" class="btn btn-primary btn-sm">كل الاخبار</a></div>
    </div>
  </section>
  <!-- Testimonials-->


@stop
