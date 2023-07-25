<!DOCTYPE html>
<html class="">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.getdivinitylabsketo.com/images/favicon.ico">
    <title>
      @stack('title')
    </title>
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/keto_assets/css/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/keto_assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/keto_assets/css/cart-from-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/keto_assets/css/common.css') }}">
    <!--<link rel="stylesheet" type="text/css" href="{{ asset('assets/keto_assets/css/checkout.css') }}" >-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/keto_assets/css/media.css') }}">
    <link href="{{ asset('assets/keto_assets/css/slick-theme.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/keto_assets/css/slick.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/keto_assets/css/easy-responsive-tabs.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/keto_assets/css/jquery.fancybox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/keto_assets/css/inner.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/keto_assets/css/wan-spinner.css') }}">
    <link href="{{ asset('assets/keto_assets/css/loading.css') }}" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="{{ asset('assets/keto_assets/css/css2') }}" rel="stylesheet">
    <style type="text/css">
      .fancybox-margin {
        margin-right: 17px;
      }
    </style>
  </head>
  <body>
    <div class="top-sec">
      <div class="container">
        <p class="top-txt2">
          <span class="hide-mob">Customer Support</span>
          <img src="{{ asset('assets/keto_assets/images/phone.svg') }}" class="phone-ic"> (877)202-5676 &nbsp;|&nbsp; <img src="{{ asset('assets/keto_assets/images/mail.svg') }}" class="phone-ic"> care@goldlabsolutions.com
        </p>
      </div>
    </div>
    <div class="top-fix-bar">
      <div class="menu-sec">
        <div class="container">
          <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('assets/keto_assets/images/logo.png') }}">
          </a>
          <ul class="menu-bar">
            <li>
              <a href="{{ route('home') }}" class="active">Home</a>
            </li>
            <li>
              <a href="javascript:bookmarkscroll.scrollTo(&#39;about&#39;);">About</a>
            </li>
            <li>
              <a href="{{ route('ingredients') }}" class="">Ingredients</a>
            </li>
            <li>
              <a href="{{ route('contact-us') }}" class="">Contact</a>
            </li>
          </ul>
          <a href="{{ route('cart') }}" class="cart_btn_mob" id="cart_btn_mob">
            <img src="{{ asset('assets/keto_assets/images/cart-ic.png') }}" class="crt-ic">
            <p class="crt">
              @if(Session::has('cart_items'))
                Cart<sup class="total-items">({{ session('cart_items') }})</sup>
              @else
                Cart<sup class="total-items">(0)</sup>
              @endif

            </p>
          </a>
          <div class="mob-menu-div show-mob">
            <div class="mob-mnu-ic">
              <button class="dl-trigger" id="mobMenuBtn">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
              </button>
            </div>
            <ul class="mobimenu" style="display:none;">
              <li>
                <a class="menu-link" href="#">Home</a>
              </li>
              <li>
                <a class="menu-link" href="#">About</a>
              </li>
              <li>
                <a class="menu-link" href="#">Ingredients</a>
              </li>
              <li>
                <a class="menu-link" href="#">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
