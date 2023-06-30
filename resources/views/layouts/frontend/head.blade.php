<link rel="icon" type="image/png" sizes="32x32" href="{{asset("assets/frontend/images/favicon/32x32.png")}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset("assets/frontend/images/favicon/16x16.png")}}">
<title>Revenue & Forest Department | @yield('title')</title>
<meta name="keywords" content="@yield('keywords')">
<meta name="description" content="@yield('description')">

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="author" content="Tejas Shinde" />
<!-- Styles -->
<link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/material-design-color-palette.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/line-awesome.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/frontend/pojo-accessibility/assets/css/style.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/pojo-accessibility/assets/css/style.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/owl.theme.default.min.css') }}">
<!-- /Styles -->
<!-- language select -->
<style>
    .ct-topbar {
        text-align: right;
        /* background: #eee; */
    }

    .ct-topbar__list {
        margin-bottom: 0px;
    }

    .ct-language__dropdown {
        padding-top: 8px;
        max-height: 0;
        overflow: hidden;
        position: absolute;
        top: 110%;
        left: -3px;
        -webkit-transition: all 0.25s ease-in-out;
        transition: all 0.25s ease-in-out;
        width: 100px;
        text-align: center;
        padding-top: 0;
        z-index: 200;
    }

    .ct-language__dropdown li {
        background: #222;
        padding: 5px;
    }

    .ct-language__dropdown li a {
        display: block;
    }

    .ct-language__dropdown li:first-child {
        padding-top: 10px;
        border-radius: 3px 3px 0 0;
    }

    .ct-language__dropdown li:last-child {
        padding-bottom: 10px;
        border-radius: 0 0 3px 3px;
    }

    .ct-language__dropdown li:hover {
        background: #444;
    }

    .ct-language__dropdown:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        margin: auto;
        width: 8px;
        height: 0;
        border: 0 solid transparent;
        border-right-width: 8px;
        border-left-width: 8px;
        border-bottom: 8px solid #222;
    }

    .ct-language {
        position: relative;
        background: #9c524c;
        color: #fff;
        padding: 10px 0;
    }

    .ct-language:hover .ct-language__dropdown {
        max-height: 200px;
        padding-top: 8px;
    }

    .list-unstyled {
        padding-left: 0;
        list-style: none;
    }
</style>

<style>
    .back-to-top {
        display: none;
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 64px;
        height: 64px;
        z-index: 9999;
        cursor: pointer;
        text-decoration: none;
        transition: opacity 0.2s ease-out;
        background-image: url('assets/frontend/images/top.png');
    }

    .back-to-top:hover {
        opacity: 0.7;
    }
</style>

@stack('styles')
