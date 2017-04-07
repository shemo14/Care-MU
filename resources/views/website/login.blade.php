@extends('website.layout')
@section('content')


<div data-on="false" data-md-on="true" class="rd-parallax">
    <div data-speed="0.35" data-type="media" data-url="{{ Request::root() }}/website/images/bg-01-1920x400.jpg" class="rd-parallax-layer"></div>
    <div data-speed="0" data-type="html" class="rd-parallax-layer">
        <!-- Classic Breadcrumbs-->
        <section class="breadcrumb-classic context-dark">
            <div class="shell section-35 section-lg-top-85 text-sm-left">
                <h1 class="veil reveal-sm-block">Forms</h1>
                <div class="offset-lg-top-75 offset-sm-top-40">
                    <ul class="list-inline list-inline-lg list-inline-dashed p">
                        <li><a href="index.html" class="text-light">Home</a></li>
                        <li><a href="#" class="text-light">Additional Pages</a></li>
                        <li class="text-light">Forms
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
</div>

<main class="page-content section-top-70 section-md-top-98">
    <!-- login form-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Login</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-sign-in"></i> Login
                                        </button>

                                        <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact form-->
    {{--<section class="section-70 section-md-90 section-bottom-120">--}}
        {{--<div class="shell text-sm-left">--}}
            {{--<div class="range range-xs-center range-sm-left">--}}
                {{--<div class="cell-xs-10 cell-lg-8">--}}
                    {{--<h2>Contact us</h2>--}}
                    {{--<hr class="divider divider-lg bg-primary hr-sm-left-0">--}}
                    {{--<div class="offset-top-50">--}}
                        {{--<form data-form-output="form-output-global" data-form-type="contact" method="post" action="http://chipchipbook.com/template/transport/bat/rd-mailform.php" class="rd-mailform text-left">--}}
                            {{--<div class="range range-narrow">--}}
                                {{--<div class="cell-lg-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label for="contact-us-first-name" class="form-label">Your first name</label>--}}
                                        {{--<input id="contact-us-first-name" type="text" name="first-name" data-constraints="@Required" class="form-control form-validation-inside">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="cell-lg-6 offset-top-10 offset-lg-top-0">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label for="contact-us-last-name" class="form-label">Your last name</label>--}}
                                        {{--<input id="contact-us-last-name" type="text" name="last-name" data-constraints="@Required" class="form-control form-validation-inside">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="cell-lg-12 offset-top-10">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label for="contact-us-email" class="form-label">Your e-mail</label>--}}
                                        {{--<input id="contact-us-email" type="email" name="email" data-constraints="@Required @Email" class="form-control form-validation-inside">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="cell-lg-12 offset-top-10">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label for="contact-us-message" class="form-label">Message</label>--}}
                                        {{--<textarea id="contact-us-message" name="message" data-constraints="@Required" class="form-control form-validation-inside"></textarea>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="offset-top-10 text-center text-sm-left">--}}
                                {{--<button type="submit" class="btn btn-sm btn-primary">send message</button>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    <!-- Newsletter-->
    <section class="section-65 bg-dark-blue context-dark section-skew section-skew-wide">
        <div class="skew-block"></div>
        <div class="shell text-sm-left">
            <div class="range range-xs-center range-sm-left">
                <div class="cell-xs-10 cell-lg-6">
                    <h2>Newsletter</h2>
                    <hr class="divider divider-lg bg-primary hr-sm-left-0">
                    <div class="offset-top-50">
                        <p>Enter your email address to receive all news, updates, special offers and other discount information.</p>
                    </div>
                    <div class="offset-top-20">
                        <form data-form-output="form-subscribe-footer" data-form-type="subscribe" method="post" action="http://chipchipbook.com/template/transport/bat/rd-mailform.php" class="rd-mailform">
                            <div class="form-group">
                                <div class="input-group input-group-sm">
                                    <input placeholder="Your e-mail" type="email" name="email" data-constraints="@Required @Email" class="form-control"/><span class="input-group-btn">
                          <button type="submit" class="btn btn-sm btn-primary">Subscribe</button></span>
                                </div>
                            </div>
                            <div id="form-subscribe-footer" class="form-output"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@stop