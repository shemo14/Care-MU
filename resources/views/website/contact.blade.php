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
                            <li class="text-light">الاخبار
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <main class="page-content">
       <div class="row" style="margin-top: 80px">
           <div class="col-md-12 text-center">
               <h2 style="text-align: right;margin-right: 5px;">اتصل بنا</h2>
               <hr class="divider divider-lg bg-primary hr-sm-right-0">
               <section class="bg-dark-blue bg-white">
                   <div id="map" style="height:400px"></div>
                   <p style="text-align: center">فرع دكرنس بشارع المتاجر</p>
               </section>

               <section class="bg-dark-blue bg-white">
                   <div id="map2" style="height:400px"></div>
                   <p style="text-align: center">فرع دكرنس بشارع المتاجر</p>
               </section>
           </div>
       </div>

        <section class="section-skew bg-dark-blue section-skew-wide context-dark section-md-65 section-80">
            <div class="skew-block"></div>
            <div class="shell">
                <div class="range text-md-left range-xs-center">
                    <div class="cell-sm-8 cell-md-4">
                        <div class="unit unit-md unit-md-horizontal text-md-left">
                            <div class="unit-left"><span class="icon icon-lg icon-circle icon-primary-filled fa-map-marker"></span></div>
                            <div class="unit-body contact-info">
                                <h5>Post Address</h5>
                                <address><a href="#">9863 - 9867 Mill Road, <br> Cambridge, MG09 99HT.</a></address>
                            </div>
                        </div>
                    </div>
                    <div class="cell-sm-8 cell-md-4 offset-top-30 offset-md-top-0">
                        <div class="unit unit-md unit-md-horizontal text-md-left">
                            <div class="unit-left"><span class="icon icon-lg icon-circle icon-primary-filled fa-phone"></span></div>
                            <div class="unit-body contact-info">
                                <h5>Phones</h5>
                                <dl>
                                    <dt>Phone:</dt>
                                    <dd><a href="callto:#">+1 800 603 6035</a></dd>
                                </dl>
                                <dl>
                                    <dt>Fax:</dt>
                                    <dd><a href="callto:#" class="inset-sm-left-20">+1 800 889 9898</a></dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="cell-sm-8 cell-md-4 offset-top-30 offset-md-top-0">
                        <div class="unit unit-md unit-md-horizontal text-md-left">
                            <div class="unit-left"><span class="icon icon-lg icon-circle icon-primary-filled mdi fa-clock-o"></span></div>
                            <div class="unit-body">
                                <h5>Opening Hours</h5>
                                <p>8:00 - 18:00 Mon - Sat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>




    <script>
        function initMap() {
            var myLatLng = {lat: 31.046722, lng: 31.388018};

            // Create a map object and specify the DOM element for display.
            var map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                scrollwheel: false,
                zoom: 18
            });

            // Create a marker and set its position.
            var marker = new google.maps.Marker({
                map: map,
                position: myLatLng,
                title: 'مكتب الرحاب'
            });
        }
    </script>

    <script>
        function initMap() {
            var myLatLng = {lat: 31.046722, lng: 31.388018};

            // Create a map object and specify the DOM element for display.
            var map = new google.maps.Map(document.getElementById('map2'), {
                center: myLatLng,
                scrollwheel: false,
                zoom: 18
            });

            // Create a marker and set its position.
            var marker = new google.maps.Marker({
                map: map,
                position: myLatLng,
                title: 'مكتب الرحاب'
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdJk3toq4vco3pkhcRGvwfifqQoLgc9y4&callback=initMap"
            type="text/javascript"></script>











@stop