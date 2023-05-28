@extends('layout/master')
@section('content')
@section('title')

Amor Rozgar | Product Detail
@endsection

<style>
    .description-short {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 4;
        /* number of lines to show */
        -webkit-box-orient: vertical;
    }
</style>
<!-- main-content -->
<div class="main-content app-content" style=margin-left:0px;>
    @if(isset($products) && !empty($products))
    <!-- container -->
    
    <div class="main-container container-fluid">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="left-content">
                <span class="main-content-title mg-b-0 mg-b-lg-1">Product Details</span>
            </div>
            <div class="justify-content-center mt-2">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item tx-15"><a href="/shop/view">Rozgar Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$products->name}}</li>
                </ol>
            </div>
        </div>
        <!-- /breadcrumb -->

        <?php

        $Annoucefiles = "";
        if (!empty($products)) {
            if ($products->image != NULL) {

                $Annoucefiles = json_decode($products->image);
            } else {
                $Annoucefiles = "Empty";
            }
        } else {
            $Annoucefiles = "Empty";
        }
        $imgExt = array(
            "png",
            "jpg",
            "JPG",
            "jpeg",
            "PNG",
            "webp"
        );

        ?>

        <!-- row -->
        <div class="row row-sm">
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-body ">
                        <div class="row row-sm ">
                            <div class="col-lg-12 col-md-12">
                                <div class="row">
                                    <div class="col-lg-1">
                                        @if($Annoucefiles != "Empty")
                                        <?php $i = 1; ?>
                                        @foreach($Annoucefiles as $key => $af)


                                        <div class="px-1 pb-1">

                                            @if(in_array($af->ext,$imgExt))
                                            <div class="  align-items-center mb-3 card-thumbnail click{{$i}}">
                                                <img src="{{asset('public/uploads/imagess/'.$af->filename)}}" id="myImg" class=" rounded img-fluid product-img myImg" alt="" />
                                            </div>

                                            @else
                                            <div class="  align-items-center card-thumbnail">
                                                <img src="{{asset('asset/images/logo/jpg.png')}}" id="myImg" class=" rounded img-fluid product-img myImg" alt="" style="height:40px; width:40px; " />
                                            </div>

                                            @endif


                                        </div>
                                        <?php $i++; ?>
                                        @endforeach
                                        @endif

                                    </div>
                                    <div class="col-7">
                                        <div class="product-carousel ">
                                            <div id="Slider" class="carousel slide" data-bs-ride="false">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active"><img src="{{asset('public/uploads/imagess')}}/{{$products->image}}" alt="img" id="img_selected" class="img-fluid mx-auto d-block myModal">
                                                        <!--<div class=" text-center mt-5 mb-0 btn-list">-->
                                                        <!--</div>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="details col-4">
                                                                                 
                                        <h4 class="product-title mb-1 my-1 py-2">{{ \App\Models\Category::where(['id' => $products->child_cat_id])->pluck('name')->first() }}</h4>
                                        
                                        <h4 class="product-title mb-1 my-1 py-2">{{$products->name}}</h4>
                                        <h4 class="h5 mb-0 mt-1 text-start font-weight-bold  tx-15 my-1 py-2">Rs: {{round($products->offer_price)}}
                                            <span class="text-secondary font-weight-normal tx-13 ms-1 prev-price">Rs
                                                {{round($products->price)}}</span>
                                        </h4>
                                         <h4 class="h5 mb-0 mt-1 text-start font-weight-bold  tx-15 my-1 py-2">SKU: {{$products->sku}}
                                            
                                        </h4>
                                        <div class="primebDesktop prime-d-inline-block prime-mb-1 primeb-14761 my-1 py-2     " data-countryselected="" data-screensizeselected="" countryrule="1" onclick="redirectLinkbadge('','0','14761','1');" style="  ">

                                            <div style="box-sizing: border-box; color: rgb(255, 255, 255); font-size: 14px; position: relative; max-width: 40%; padding: 0.25em 0.5em; background-image: linear-gradient(to right, rgb(204, 0, 0), rgb(255, 0, 0)); opacity: 1;">        
                                                <div class="badgetitle primebText prime-font-adjust " data-primeproductid="7677601775830" data-defaultsize="14px" data-mobilesize="0" data-tabletsize="0" style="white-space: normal; overflow: hidden; text-align: center;">
                                                    
                                                        {{round($products->discount)}}% OFF
                                                         
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-left  mt-4">

                                            <a href="javascript:;" class="btn ripple btn-primary me-2 btnAddCartbtn" data-quantity="1" data-product-id="{{ $products->id }}" id="{{$products->id}}" data-bs-placement="top" data-bs-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart shoppingCart" id="shoppingCart{{$products->id}}"></i>
                                                <i class="fas fa-spinner cartSpin" id="cartSpin{{$products->id}}" style="display:none"></i>Add to
                                                cart</a>
                                            <a href="/checkout/view" class="btn ripple btn-secondary"><i class="fe fe-credit-card"> </i> Buy Now</a>
                                            <hr>
                                        </div>
                                        <span class="description-short" style="text-align: justify;">
                                            {!! $products->short_description !!}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="row row-sm">
            <div class="col-lg-12 col-md-12">
                <div class="card productdesc">
                    <div class="card-body">
                        <div class="panel panel-primary">
                            <div class=" tab-menu-heading">
                                <div class="tabs-menu1">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li><a href="#tab5" data-bs-toggle="tab">
                                                <h4>Description</h4>
                                            </a></li>

                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab5" style="text-align: justify;">

                                        {!! $products->description !!}

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <?php
            $productss = App\Models\Product::all()->take(4);
            ?>
            @foreach($products->rel_pro as $item)
            <?php $fil = json_decode($item->image); ?>
            <div class="col-lg-4 col-sm-6">
                <div class="card item-card">
                    <div class="card-body pb-0 h-100  product-grid6">
                        <div class="text-center product-image">
                            <img src="{{asset('public/uploads/imagess')}}/{{$fil[0]->filename}}" alt="img" class="img-fluid">
                        </div>
                        <div class="card-body cardbody relative">
                            <div class="cardtitle">
                                <span class="h6 font-weight-bold text-uppercase">{{ $item->name }}</span>
                                <a class="h6 mb-2 mt-4 font-weight-bold text-uppercase"> </a>
                            </div>
                            <div class="cardprice">
                                <span class="type--strikethrough">Rs: {{ $item->price }}</span>
                                <strong>Rs: {{round( $item->offer_price) }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="text-center border-top pt-3 pb-3 ps-2 pe-2 ">

                        <a href="javascript:;" class="btn ripple btn-primary me-2 btnAddCartbtnnn" data-quantity="1" data-product-id="{{ $item->id }}" id="{{$item->id}}" data-bs-placement="top" data-bs-toggle="tooltip" title="Add to Cart"><i class="fa fa-shopping-cart shoppingCart" id="shoppingCart{{$item->id}}"></i>
                            <i class="fas fa-spinner fa-spin cartSpin" id="cartSpin{{$item->id}}" style="display:none"></i>Add cart</a>

                        <a href="/checkout/view" class="btn ripple btn-secondary"><i class="fe fe-credit-card"> </i>Buy
                            Now</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- /row -->

    </div>
     @else
    <script>window.location.href = "/shop/view";</script>
    @endif
    <!-- Container closed -->
</div>
<!-- JQuery min js -->

<!-- <script>
function viewRoom(cat) {
    let id = cat.value;

    {
        {
            --
            var subs = {
                {
                    App\ Models\ Category::where('parent_id', '"+id+"') - > get()
                }
            };
            --
        }
    } {
        {
            --alert(subs) --
        }
    } {
        {
            --$.each(JSON.parse(subs), function(propName, propVal) {
                    --
                }
            } {
                {
                    --alert('helo') --
                }
            } {
                {
                    --
                });
            --
        }
    }
    $.ajax({
        url: '/api/cat/' + id,
        type: "get",
        dataType: "JSON",
        cache: false,
        beforeSend: function() {
            console.log('going');
        },
        complete: function() {


        },
        success: function(response) {
            console.log(response);
            if (response["status"] == "fail") {

                toastr.error('Fail', response['msg'])

            } else if (response["status"] == "success") {
                $("#btnSubCat").html(response["html"]);

            }
        },
        error: function(error) {
            console.log(error);
        }
    });
}
</script> -->
<script>
    $(document).on('click', '.card-thumbnail', function(e) {
        $('.card-thumbnail').css('border-color', '#fff')

        $(this).css('border-color', 'green')
        console.log($(this).children('img').attr('src'))
        $("#img_selected").attr('src', $(this).children('img').attr('src'))
    })
    $(".click1").click();
</script>
<script>
    cartData();

    function cartData() {
        $.ajax({
            url: "{{url('/api/cart-data')}}",
            type: "get",
            dataType: "JSON",

            success: function(response) {

                if (response["status"] == "fail") {

                } else if (response["status"] == "success") {
                    $('.cart-data').html('');
                    $('.cart-data').html(response['rows']);

                    $('.cart-footer').html('');
                    $('.cart-footer').html(response['footer']);

                    $('.cart-counter').html('');
                    $('.cart-counter').html(response['count']);

                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    $(document).on('click', '.btnAddCartbtn', function(e) {
        var id = $(this).attr('id');

        e.preventDefault()
        $.ajax({
            url: '/api/add-to-cart/' + id,
            type: "get",
            dataType: "JSON",
            cache: false,
            beforeSend: function() {
                $("#shoppingCart" + id).css('display', 'none');
                $("#cartSpin" + id).css('display', 'inline-block');
            },
            complete: function() {
                $("#shoppingCart" + id).css('display', 'inline-block');
                $("#cartSpin" + id).css('display', 'none');

            },
            success: function(response) {
                console.log(response);
                if (response["status"] == "fail") {

                    toastr.error('Fail', response['msg'])

                } else if (response["status"] == "success") {
                    cartData()
                    toastr.success('Added', response['msg']);

                }
            },
            error: function(error) {
                console.log(error);
            }
        });

    })

    $(document).on('click', '.btnAddCartbtnnn', function(e) {
        var id = $(this).attr('id');

        e.preventDefault()
        $.ajax({
            url: '/api/add-to-cart/' + id,
            type: "get",
            dataType: "JSON",
            cache: false,
            beforeSend: function() {
                $("#shoppingCart" + id).css('display', 'none');
                $("#cartSpin" + id).css('display', 'inline-block');
            },
            complete: function() {
                $("#shoppingCart" + id).css('display', 'inline-block');
                $("#cartSpin" + id).css('display', 'none');

            },
            success: function(response) {
                console.log(response);
                if (response["status"] == "fail") {

                    toastr.error('Fail', response['msg'])

                } else if (response["status"] == "success") {
                    cartData()
                    toastr.success('Added', response['msg']);

                }
            },
            error: function(error) {
                console.log(error);
            }
        });

    })
</script>
@endsection