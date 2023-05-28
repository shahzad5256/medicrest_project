<!DOCTYPE html>
<html lang="en">

@include('frontend/layout/head')

<body style="margin-left:25px;">
    <!-- aiz-main-wrapper -->
    <div class="aiz-main-wrapper d-flex flex-column">

        <!-- Header -->
        <!-- Top Bar -->
        <div class="top-navbar bg-white  border-soft-secondary z-1035 h-35px h-sm-auto">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 ">
                        <ul class="list-inline d-flex justify-content-between justify-content-lg-start mb-0">

                        </ul>
                    </div>


                </div>
            </div>
        </div>
        <!-- END Top Bar -->


        <header class=" sticky-top  z-1020 bg-white border-bottom ">
            <div class="position-relative logo-bar-area z-1 border-bottom">
                <div class="container-fluid px-3">
                    <div class="row align-items-center">
                        <div class="col-md-5  col-12 d-flex row">
                            <div class="col-auto col-xl-4 pl-0 pr-3 d-flex align-items-center col-12">
                                <a class="d-block py-20px mr-3 ml-0" href="http://127.0.0.1:8000">
                                    <img src="{{asset('frontend/uploads/all/JGCvXKfaEWuLMeGKSFdAY4pCAiPsg6lRueoz4Htj.png')}}" alt="Medicrest" class="mw-100  " height="50">
                                </a>



                            </div>


                            <div class="d-lg-none ml-auto ">
                                <a class="p-2 d-block text-reset" href="javascript:void(0);" data-toggle="class-toggle" data-target=".front-header-search">
                                    <i class="las la-search la-flip-horizontal la-2x"></i>
                                </a>
                            </div>
                            <div class="flex-grow-1 front-header-search d-flex align-items-center ">
                                <div class="position-relative flex-grow-1">
                                    <form action="http://127.0.0.1:8000/search" method="GET" class="stop-propagation">
                                        <div class="d-flex position-relative align-items-center">
                                            <div class="d-lg-none" data-toggle="class-toggle" data-target=".front-header-search">
                                                <button class="btn px-2" type="button"><i class="la la-2x la-long-arrow-left"></i></button>
                                            </div>
                                            <div class="input-group">
                                                <input type="text" class="border-0 border-lg form-control" id="search" name="keyword" placeholder="I am shopping for..." autocomplete="off">
                                                <div class="input-group-append d-none d-lg-block">
                                                    <!-- <button class="btn " type="submit">
                                                        <i class="la la-search la-flip-horizontal fs-18"></i>
                                                    </button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="typed-search-box stop-propagation document-click-d-none d-none bg-white rounded shadow-lg position-absolute left-0 top-100 w-100" style="min-height: 200px">
                                        <div class="search-preloader absolute-top-center">
                                            <div class="dot-loader">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                            </div>
                                        </div>
                                        <div class="search-nothing d-none p-3 text-center fs-16">

                                        </div>
                                        <div id="search-content" class="text-left">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none d-lg-none ml-3 mr-0">
                                <div class="nav-search-box">
                                    <a href="#" class="nav-box-link">
                                        <i class="la la-search la-flip-horizontal d-inline-block nav-box-icon"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row border">
                                <div class="support pt-4 col-md-2 col-2">
                                    <a href="" class="d-flex">
                                        <h6>Need Support <br>Chat With Us </h6>
                                        <img class="" src=" {{asset('frontend/assets/img/svg/52 Medical Advice.svg')}}" width="55" alt="">
                                    </a>
                                </div>
                                <div class="online  pt-4 p-2 col-md-4 col-2">
                                    <a href="{{url('/')}}" class="d-flex">
                                        <h6>Easy Online Doctor Consultations Skip the queue! Speak with a Kidney expert doctor right now</h6>
                                        <img class="" src=" {{asset('frontend/assets/img/svg/02 Doctor Male.svg')}}" width="55" alt="">
                                    </a>
                                </div>
                                <div class="delivery  pt-4 p-2 col-md-3 col-2">
                                    <a href="" class="d-flex">
                                        <h6>48 Hour express delivery in all over India</h6>
                                        <img class="" src=" {{asset('frontend/assets/img/svg/51 Medical Shield.svg')}}" width="55" alt="">
                                    </a>
                                </div>
                                <!--<div class="pt-3 col-md-1 col-2">-->

                                <!--</div>-->
                                <div class="pt-3 col-md-3 col-2">
                                    <ul class="list-inline mb-0 h-100 d-flex justify-content-center align-items-center">
                                        <li class="list-inline-item ">
                                            <div class="nav-cart-box dropdown h-100" id="cart_items">
                                                <a href="javascript:void(0)" class="d-flex align-items-center text-reset h-100" data-toggle="dropdown" data-display="static">
                                                    <!--<i class="la la-shopping-cart la-2x opacity-80"></i>-->
                                                    <div class="text-center">
                                                        <img class="" src="  {{asset('frontend/assets/img/icon/shopping-bag.png')}}" alt="" style="width: 20px;">
                                                        <h6 class="nav-box-text d-none d-xl-block py-1">Cart</h6>
                                                    </div>

                                                    <span class="flex-grow-1 ml-1">
                                                        <span class="badge badge-primary badge-inline badge-pill cart-count">0</span>

                                                    </span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg p-0 stop-propagation">

                                                    <div class="text-center p-3">
                                                        <i class="las la-frown la-3x opacity-60 mb-3"></i>
                                                        <h3 class="h6 fw-700">Your Cart is empty</h3>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-inline-item ">
                                            <a href="http://127.0.0.1:8000/users/login" class="text-reset d-inline-block  py-2">
                                                <div class="text-center">
                                                    <img class="" src=" {{asset('frontend/assets/img/icon/enter.png')}}" alt="" style="width: 20px;">
                                                    <h6 class="nav-box-text d-none d-xl-block py-1">SignIn</h6>
                                                </div>

                                            </a>
                                        <li class="list-inline-item">
                                            <a href="#" class="p-3" data-toggle="modal" id="signupWithMobileButton">
                                                <i class="fa-solid fa-mobile" style="color:DodgerBlue;"></i>&nbsp
                                                Phone
                                            </a>
                                        </li>

                                    </ul>
                                </div>

                            </div>

                            <div class="d-none d-lg-block  align-self-stretch ml-3 mr-0" data-hover="dropdown">

                            </div>
                            <div class=" text-right d-none d-lg-block">

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </header>





        <div class="modal fade" id="order_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div id="order-details-modal-body">

                    </div>
                </div>
            </div>
        </div>


        @yield('content')

        @include('frontend/layout/footer')

    </div>



    <script>
        function confirm_modal(delete_url) {
            jQuery('#confirm-delete').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('delete_link').setAttribute('href', delete_url);
        }
    </script>

    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                </div>

                <div class="modal-body">
                    <p>Delete confirmation message</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a id="delete_link" class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function account_delete_confirm_modal(delete_url) {
            jQuery('#account_delete_confirm').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('account_delete_link').setAttribute('href', delete_url);
        }
    </script>

    <div class="modal fade" id="account_delete_confirm" tabindex="-1" role="dialog" aria-labelledby="account_delete_confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header d-block py-4">
                    <div class="d-flex justify-content-center">
                        <span class="avatar avatar-md mb-2 mt-2">
                            <img src="{{asset('frontend/assets/img/avatar-place.png')}}" class="image rounded-circle m-auto" onerror="this.onerror=null;this.src='{{asset('frontend/assets/img/avatar-place.png')}}';">
                        </span>
                    </div>
                    <h4 class="modal-title text-center fw-700" id="account_delete_confirmModalLabel" style="color: #ff9819;">Delete Your Account</h4>
                    <p class="fs-16 fw-600 text-center" style="color: #8d8d8d;">Warning: You cannot undo this action</p>
                </div>

                <div class="modal-body pt-3 pb-5 px-xl-5">
                    <p class="text-danger mt-3"><i><strong>Note:&nbsp;Don&#039;t Click to any button or don&#039;t do
                                any action during account Deletion, it may takes some times.</strong></i></p>
                    <p class="fs-14 fw-700" style="color: #8d8d8d;">Deleting Account Means:</p>
                    <div class="row bg-soft-warning py-2 mb-2 ml-0 mr-0 border-left border-width-2 border-danger">
                        <div class="col-1">
                            <img src="{{asset('frontend/assets/img/warning.png')}}" class="h-20px">
                        </div>
                        <div class="col">
                            <p class="fw-600 mb-0">If you create any classified ptoducts, after deleting your account,
                                those products will no longer in our system</p>
                        </div>
                    </div>
                    <div class="row bg-soft-warning py-3 ml-0 mr-0 border-left border-width-2 border-danger">
                        <div class="col-1">
                            <img src="{{asset('frontend/assets/img/warning.png')}}" class="h-20px">
                        </div>
                        <div class="col">
                            <p class="fw-600 mb-0">After deleting your account, wallet balance no longer in our system
                            </p>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a id="account_delete_link" class="btn btn-danger btn-rounded btn-ok">Delete Account</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addToCart">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="c-preloader text-center p-3">
                    <i class="las la-spinner la-spin la-3x"></i>
                </div>
                <button type="button" class="close absolute-top-right btn-icon close z-1" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la-2x">&times;</span>
                </button>
                <div id="addToCart-modal-body">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="signupWithMobileModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo px-3">
            <div class="modal-header">
                <h6 class="modal-title">Create an account</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
            </div>
            <div class="modal-body px-3">
                <form method="POST" id="register_form">
                    @csrf
                    <div id="information">
                        <div class="col-lg-12">
                            <div class="form-group my-2">
                                <input type="tel" aria-required="true" size="30" value="" name="phone" id="phone" class="form-control form-control contact phone" placeholder="123456789" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p class="small text-center text-muted">By signing up, you confirm that you’ve read and accepted our User Notice and Privacy Policy.</p>
                        </div>
                        <div class="text-end">
                            <button class="btn ripple btn-primary" id="btnSubmitmobile" type="submit">
                                <i class="fas fa-spinner fa-spin" style="display: none"></i> Send OTP
                            </button>
                        </div>
                    </div>
                    <div id="verification" style="display:none;">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="alert alert-success" id="successRegsiter" style="display: none;"></div>
                                <div id="error" style="display:none;">
                                    <p>Not Verified</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" id="verificationCode" class="form-control" placeholder="Enter verification code">
                            </div>
                            <div class="form-group" style="margin-top:20px !important;">
                                <button class="btn ripple btn-primary" type="button" class="" onclick="#">
                                    <i class="fas fa-spinner fa-spin" style="display: none"></i> Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- SCRIPTS -->
    <script src="{{asset('frontend/assets/js/vendors.js')}}"></script>
    <script src="{{asset('frontend/assets/js/aiz-core.js')}}"></script>





    <script>
        $(document).ready(function() {

            $('.category-nav-element').each(function(i, el) {
                $(el).on('mouseover', function() {
                    if (!$(el).find('.sub-cat-menu').hasClass('loaded')) {
                        $.post('http://127.0.0.1:8000/category/nav-element-list', {
                            _token: AIZ.data.csrf,
                            id: $(el).data('id')
                        }, function(data) {
                            $(el).find('.sub-cat-menu').addClass('loaded').html(data);
                        });
                    }
                });
            });
            if ($('#lang-change').length > 0) {
                $('#lang-change .dropdown-menu a').each(function() {
                    $(this).on('click', function(e) {
                        e.preventDefault();
                        var $this = $(this);
                        var locale = $this.data('flag');
                        $.post('http://127.0.0.1:8000/language', {
                            _token: AIZ.data.csrf,
                            locale: locale
                        }, function(data) {
                            location.reload();
                        });

                    });
                });
            }

            if ($('#currency-change').length > 0) {
                $('#currency-change .dropdown-menu a').each(function() {
                    $(this).on('click', function(e) {
                        e.preventDefault();
                        var $this = $(this);
                        var currency_code = $this.data('currency');
                        $.post('http://127.0.0.1:8000/currency', {
                            _token: AIZ.data.csrf,
                            currency_code: currency_code
                        }, function(data) {
                            location.reload();
                        });

                    });
                });
            }
        });

        $('#search').on('keyup', function() {
            search();
        });

        $('#search').on('focus', function() {
            search();
        });

        function search() {
            var searchKey = $('#search').val();
            if (searchKey.length > 0) {
                $('body').addClass("typed-search-box-shown");

                $('.typed-search-box').removeClass('d-none');
                $('.search-preloader').removeClass('d-none');
                $.post('http://127.0.0.1:8000/ajax-search', {
                    _token: AIZ.data.csrf,
                    search: searchKey
                }, function(data) {
                    if (data == '0') {
                        // $('.typed-search-box').addClass('d-none');
                        $('#search-content').html(null);
                        $('.typed-search-box .search-nothing').removeClass('d-none').html(
                            'Sorry, nothing found for <strong>"' + searchKey + '"</strong>');
                        $('.search-preloader').addClass('d-none');

                    } else {
                        $('.typed-search-box .search-nothing').addClass('d-none').html(null);
                        $('#search-content').html(data);
                        $('.search-preloader').addClass('d-none');
                    }
                });
            } else {
                $('.typed-search-box').addClass('d-none');
                $('body').removeClass("typed-search-box-shown");
            }
        }

        function updateNavCart(view, count) {
            $('.cart-count').html(count);
            $('#cart_items').html(view);
        }

        function removeFromCart(key) {
            $.post('http://127.0.0.1:8000/cart/removeFromCart', {
                _token: AIZ.data.csrf,
                id: key
            }, function(data) {
                updateNavCart(data.nav_cart_view, data.cart_count);
                $('#cart-summary').html(data.cart_view);
                AIZ.plugins.notify('success', "Item has been removed from cart");
                $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html()) - 1);
            });
        }

        function addToCompare(id) {
            $.post('http://127.0.0.1:8000/compare/addToCompare', {
                _token: AIZ.data.csrf,
                id: id
            }, function(data) {
                $('#compare').html(data);
                AIZ.plugins.notify('success', "Item has been added to compare list");
                $('#compare_items_sidenav').html(parseInt($('#compare_items_sidenav').html()) + 1);
            });
        }

        function addToWishList(id) {
            AIZ.plugins.notify('warning', "Please login first");
        }

        function showAddToCartModal(id) {
            if (!$('#modal-size').hasClass('modal-lg')) {
                $('#modal-size').addClass('modal-lg');
            }
            $('#addToCart-modal-body').html(null);
            $('#addToCart').modal();
            $('.c-preloader').show();
            $.post('http://127.0.0.1:8000/cart/show-cart-modal', {
                _token: AIZ.data.csrf,
                id: id
            }, function(data) {
                $('.c-preloader').hide();
                $('#addToCart-modal-body').html(data);
                AIZ.plugins.slickCarousel();
                AIZ.plugins.zoom();
                AIZ.extra.plusMinus();
                getVariantPrice();
            });
        }

        $('#option-choice-form input').on('change', function() {
            getVariantPrice();
        });

        function getVariantPrice() {
            if ($('#option-choice-form input[name=quantity]').val() > 0 && checkAddToCartValidity()) {
                $.ajax({
                    type: "POST",
                    url: 'http://127.0.0.1:8000/product/variant_price',
                    data: $('#option-choice-form').serializeArray(),
                    success: function(data) {

                        $('.product-gallery-thumb .carousel-box').each(function(i) {
                            if ($(this).data('variation') && data.variation == $(this).data(
                                    'variation')) {
                                $('.product-gallery-thumb').slick('slickGoTo', i);
                            }
                        })

                        $('#option-choice-form #chosen_price_div').removeClass('d-none');
                        $('#option-choice-form #chosen_price_div #chosen_price').html(data.price);
                        $('#available-quantity').html(data.quantity);
                        $('.input-number').prop('max', data.max_limit);
                        if (parseInt(data.in_stock) == 0 && data.digital == 0) {
                            $('.buy-now').addClass('d-none');
                            $('.add-to-cart').addClass('d-none');
                            $('.out-of-stock').removeClass('d-none');
                        } else {
                            $('.buy-now').removeClass('d-none');
                            $('.add-to-cart').removeClass('d-none');
                            $('.out-of-stock').addClass('d-none');
                        }

                        AIZ.extra.plusMinus();
                    }
                });
            }
        }

        function checkAddToCartValidity() {
            var names = {};
            $('#option-choice-form input:radio').each(function() { // find unique names
                names[$(this).attr('name')] = true;
            });
            var count = 0;
            $.each(names, function() { // then count them
                count++;
            });

            if ($('#option-choice-form input:radio:checked').length == count) {
                return true;
            }

            return false;
        }

        function addToCart() {

            if (checkAddToCartValidity()) {
                $('#addToCart').modal();
                $('.c-preloader').show();
                $.ajax({
                    type: "POST",
                    url: 'http://127.0.0.1:8000/cart/addtocart',
                    data: $('#option-choice-form').serializeArray(),
                    success: function(data) {

                        $('#addToCart-modal-body').html(null);
                        $('.c-preloader').hide();
                        $('#modal-size').removeClass('modal-lg');
                        $('#addToCart-modal-body').html(data.modal_view);
                        AIZ.extra.plusMinus();
                        AIZ.plugins.slickCarousel();
                        updateNavCart(data.nav_cart_view, data.cart_count);
                    }
                });
            } else {
                AIZ.plugins.notify('warning', "Please choose all the options");
            }
        }

        function buyNow() {

            if (checkAddToCartValidity()) {
                $('#addToCart-modal-body').html(null);
                $('#addToCart').modal();
                $('.c-preloader').show();
                $.ajax({
                    type: "POST",
                    url: 'http://127.0.0.1:8000/cart/addtocart',
                    data: $('#option-choice-form').serializeArray(),
                    success: function(data) {
                        if (data.status == 1) {

                            $('#addToCart-modal-body').html(data.modal_view);
                            updateNavCart(data.nav_cart_view, data.cart_count);

                            window.location.replace("http://127.0.0.1:8000/cart");
                        } else {
                            $('#addToCart-modal-body').html(null);
                            $('.c-preloader').hide();
                            $('#modal-size').removeClass('modal-lg');
                            $('#addToCart-modal-body').html(data.modal_view);
                        }
                    }
                });
            } else {
                AIZ.plugins.notify('warning', "Please choose all the options");
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $.post('http://127.0.0.1:8000/home/section/featured', {
                _token: 'RnNhapNAI2bBbEVo1oubrwK9wJyfjfubops1NHSi'
            }, function(data) {
                $('#section_featured').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('http://127.0.0.1:8000/home/section/best_selling', {
                _token: 'RnNhapNAI2bBbEVo1oubrwK9wJyfjfubops1NHSi'
            }, function(data) {
                $('#section_best_selling').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('http://127.0.0.1:8000/home/section/auction_products', {
                _token: 'RnNhapNAI2bBbEVo1oubrwK9wJyfjfubops1NHSi'
            }, function(data) {
                $('#auction_products').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('http://127.0.0.1:8000/home/section/home_categories', {
                _token: 'RnNhapNAI2bBbEVo1oubrwK9wJyfjfubops1NHSi'
            }, function(data) {
                $('#section_home_categories').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('http://127.0.0.1:8000/home/section/best_sellers', {
                _token: 'RnNhapNAI2bBbEVo1oubrwK9wJyfjfubops1NHSi'
            }, function(data) {
                $('#section_best_sellers').html(data);
                AIZ.plugins.slickCarousel();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("div.desc").hide();
            $("input[name$='filetype']").click(function() {
                var test = $(this).val();
                $("div.desc").hide();
                $("#" + test).show();
            });
        });
    </script>
    <!--IMAGE priscription-->


    <!--word preview-->



    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "400px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    <!--PDF VIewer yahiya added-->
    <script src='https://mozilla.github.io/pdf.js/build/pdf.js'></script>
    <script>
        // Loaded via <script> tag, create shortcut to access PDF.js exports.
        var pdfjsLib = window['pdfjs-dist/build/pdf'];

        // The workerSrc property shall be specified.
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';

        $("#myPdf").on("change", function(e) {

            var file = e.target.files[0]

            if (file.type == "application/pdf") {

                var fileReader = new FileReader();

                fileReader.onload = function() {
                    var pdfData = new Uint8Array(this.result);

                    // Using DocumentInitParameters object to load binary data.

                    var loadingTask = pdfjsLib.getDocument({
                        data: pdfData
                    });
                    loadingTask.promise.then(function(pdf) {
                        console.log('PDF loaded');

                        // Fetch the first page

                        console.log('Page loaded');

                        var scale = 1.5;
                        var viewport = page.getViewport({
                            scale: scale
                        });

                        // Prepare canvas using PDF page dimensions
                        var canvas = $("#pdfViewer")[0];
                        var context = canvas.getContext('2d');
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;

                        // Render PDF page into canvas context
                        var renderContext = {
                            canvasContext: context,
                            viewport: viewport
                        };
                        var renderTask = page.render(renderContext);
                        renderTask.promise.then(function() {
                            console.log('Page rendered');
                        });
                    }, function(reason) {
                        // PDF loading error
                        console.error(reason);
                    });
                };
                fileReader.readAsArrayBuffer(file);
            }
        });
    </script>
    <!--PDF VIewer yahiya added-->
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=&callback=initMap"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        // Initialize the carousel component
        $(document).ready(function() {
            $('.aiz-carousel').carousel();
        });
    </script>
<script>
    $(document).on('submit', '#register_form', function(e) {
        e.preventDefault();
        $.ajax({
            url: "/send-otp",
            type: "post", // Use POST method instead of GET
            data: new FormData(this),
            dataType: "JSON",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $("#btnSubmit").attr('disabled', true);
                $(".fa-spin").css('display', 'inline-block');
            },
            complete: function() {
                $("#btnSubmit").attr('disabled', false);
                $(".fa-spin").css('display', 'none');
            },
            success: function(response) {
                console.log(response)
                if (response["status"] == "fail") {
                    toastr.error('Failed', response["msg"])
                } else if (response["status"] == "success") {
                    toastr.success('Success', response["msg"])
                    $("#register_form")[0].reset();
                    // window.location.href = "";
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
</script>

    <script>
        $("#signupWithMobileButton").click(function() {
            $("#signupWithMobileModal").modal('show');
        });
    </script>
    <script>
        $('#btnSubmitmobile').on('click', function() {
            $('#information').css('display', 'none')
            $('#verification').css('display', 'block')
        })
    </script>
</body>

</html>