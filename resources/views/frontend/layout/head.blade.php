<head>

<meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="app-url" content="//127.0.0.1:8000/">
    <meta name="file-base-url" content="/">

    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="Medicrest Kidney Medicine Online Pharmacy" />
    <meta name="keywords" content="">


    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Medicrest">
    <meta itemprop="description" content="Medicrest Kidney Medicine Online Pharmacy">
    <meta itemprop="image" content="{{asset('frontend/uploads/all/JGCvXKfaEWuLMeGKSFdAY4pCAiPsg6lRueoz4Htj.png')}}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="Medicrest">
    <meta name="twitter:description" content="Medicrest Kidney Medicine Online Pharmacy">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{asset('frontend/uploads/all/JGCvXKfaEWuLMeGKSFdAY4pCAiPsg6lRueoz4Htj.png')}}">

    <!-- Open Graph data -->
    <meta property="og:title" content="Medicrest" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://127.0.0.1:8000" />
    <meta property="og:image" content="{{asset('frontend/uploads/all/JGCvXKfaEWuLMeGKSFdAY4pCAiPsg6lRueoz4Htj.png')}}" />
    <meta property="og:description" content="Medicrest Kidney Medicine Online Pharmacy" />
    <meta property="og:site_name" content="Medicrest" />
    <meta property="fb:app_id" content="">

    <!-- Favicon -->
    <link rel="icon" href="{{asset('frontend/uploads/all/JGCvXKfaEWuLMeGKSFdAY4pCAiPsg6lRueoz4Htj.png')}}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendors.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/aiz-core.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/y-design.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/custom-style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('frontend/theme/assets/css/plugins/animate.min.css')}}" />
    <!-- <link rel="stylesheet" href="{{asset('frontend/theme/assets/css/main.css?v=5.6')}}" /> -->
    <style>
        img.img-preview-thumb {
            width: 100%;
            padding: 10px 0px;
        }
    </style>



    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
        }

        :root {
            --primary: #0b4694;
            --hov-primary: #000000;
            --soft-primary: rgba(11, 70, 148, 0.15);
        }

        #map {
            width: 100%;
            height: 250px;
        }

        #edit_map {
            width: 100%;
            height: 250px;
        }

        .pac-container {
            z-index: 100000;
        }

        input#myPdf {
            position: absolute;
            height: 180px;
            opacity: 0;
        }
    </style>






</head>