@extends('layout/master')
@section('title')
Amor Rozgar | Shop
@endsection
@section('content')
<!-- main-content -->
<div class="main-content app-content" style=margin-left:0px;>
    <!-- container -->
    <div class="main-container container-fluid">
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="left-content">
                <span class="main-content-title mg-b-0 mg-b-lg-1">SHOP</span>
            </div>
            <div class="justify-content-center mt-2">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Rozgar</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                </ol>
            </div>
        </div>
        <!-- /breadcrumb -->

        <!-- row -->
        <div class="row row-sm">
            <div class="col-xl-9 col-lg-8 col-md-12">
                <div class="row row-sm" id="list_view_product">
                    @include('layout.list_view_product')
                </div>
                @if(sizeof($new_products)<1) <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <h4 class="text-center">No Data Found!</h4>
                    </div>
                    <div col-4></div>
            </div>
            @endif

            <div class="d-flex">
                {!! $new_products->links() !!}
            </div>


        </div>

        <div class="col-xl-3 col-lg-4 col-md-12 mb-3 mb-md-0">
            <div class="card">
                <div class="card-body p-2">
                    <form action="{{ url('shop/view') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search ...">
                            <span class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">


                <div class="card">
                    <div class="card-header border-bottom pt-3 pb-3 mb-0 font-weight-bold text-uppercase">Category
                    </div>
                    <div class="card-body pb-0">
                        <div class="form-group">
                            <?php
                            $categories = App\Models\Category::where('is_parent', '1')->orderBy('name', 'ASC')->get();
                            ?>
                            <label class="form-label" for="btnCat">Main</label>
                            <select name="cat_id" id="btnCat" class="form-control  nice-select  custom-select btnCat" onchange="window.location.href=this.options[this.selectedIndex].value;">
                                <option value="/shop/view" selected>--Select--</option>
                                @foreach($categories as $cate)
                                <option value="/shop/view?cat_id={{ $cate->id}}">{{ucwords($cate->name)}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-header border-bottom pt-3 pb-3 mb-0 font-weight-bold text-uppercase">Filter
                    </div>
                    <div class="card-body pb-0">
                        <div class="form-group">
                            <select name="cat_id" id="btnCat" class="form-control  nice-select  custom-select btnCat" onchange="window.location.href=this.options[this.selectedIndex].value;">
                                <option value="/shop/view" selected>--Select--</option>
                                <option value="/shop/view?filter=price_low_to_high">Price Low To High</option>
                                <option value="/shop/view?filter=price_high_to_low">Price High To Low</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row closed -->

    </div>
    <!-- Container closed -->
</div>
<!-- main-content closed -->

</div>
<!-- End Page -->

<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-arrow-up"></i></a>

<!-- JQuery min js -->
<script src="{{asset('/assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Internal Nice-select js-->
<script src="{{asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
<script>
    cartData();

    function cartData() {
        $.ajax({
            url: "/api/cart-data",
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
    $(document).on('click', '.btnAddCart', function(e) {
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