@extends('layout/master')
@section('title')
Medicrest | Dashboard
@endsection
@section('content')
<style>
    ul.timeline:before {
        height: 0;
    }

    #example1_length,
    #example1_paginate,
    #example1_info,
    #example1_filter {
        display: none;
    }

    #piechart_3d div[dir="ltr"] {
        left: 50%;
        transform: translateX(-50%);
    }
</style>


<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <span class="main-content-title mg-b-0 mg-b-lg-1">DASHBOARD</span>
    </div>


    <div class="justify-content-center mt-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sales</li>
        </ol>
    </div>

</div>







<script src="{{asset('backend/assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{asset('backend/assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('backend/assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('backend/assets/js/chart.flot.js')}}"></script>
@endsection