<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
    <title>Laravel BLOG - LaraBlog</title>
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    @section('stylesheets')
    <link href='http://fonts.googleapis.com/css?family=Irish+Grover' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=La+Belle+Aurore' rel='stylesheet' type='text/css'>
    {{HTML::style('css/screen.css')}}
    {{HTML::style('css/bootstrap.min.css')}}
    @show
    @section('javascript')
        {{HTML::script('js/jquery.min.js')}}
        {{HTML::script('js/bootstrap.min.js')}}
        {{HTML::script('js/main.js')}}
    @show
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<body>
@if(isset($querylog))
{{var_dump($querylog)}}
@endif
@if(Session::has('message'))
<script>
var message = '{{Session::get('message')}}';
showFlashMessage(message);
</script>
@endif
<section id="wrapper">
    <header id="header">
        <div id="language">
        @section('lang')

        @stop
        </div>
        <div class="top">
            <nav>
                <ul class="navigation">
                @section('nav')
                    <li>{{HTML::linkRoute('home', 'Home')}}</li>
                    <li>{{HTML::linkRoute('about', 'About')}}</li>
                    <li>{{HTML::linkRoute('contact', 'Contact')}}</li>
                @show
                </ul>
            </nav>
        </div>

        <hgroup>
            <h2><a href="{{URL::route('home')}}">larablog</a></h2>

            <h3><a href="{{URL::route('home')}}">@lang('main.creating_blog')</a></h3>
        </hgroup>
    </header>

    <section class="main-col">
        @yield('content')
    </section>
    <aside class="sidebar">
 @include('partials.sidebar')
    </aside>

    <div id="footer">
    @lang('main.footer_about') <a href="https://github.com/dsyph3r">dsyph3r</a>
    </div>
</section>
</body>
</html>