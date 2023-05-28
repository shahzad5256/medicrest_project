@extends('frontend.layout.master')
@section('title')
Medicrest | Medicrest Kidney Medicine Online Pharmacy
@endsection
@section('content')
            <div class="row px-4">
            <div class="col-md-3" style="display: flex; align-content: space-around; flex-direction: column; justify-content: space-around;">
                <div class="box-f text-center">
                    <img class="offer-badge" src="{{asset('frontend/assets/img/icon/spof.png')}}" alt="">
                    <h4 class="py-3">
                        Get medicine refill every month Subscribe for 12 months and get the last month free.
                    </h4>
                    <img class="" src=" {{asset('frontend/assets/img/svg/07 Pill Bottle.svg')}}" alt="">
                </div>
                <div class="box-f text-center d-flex" data-toggle="modal" data-target="#exampleModalCenter">
                    <h4 class="py-3 text-left">Place your order via prescriptions</h4>
                    <img class="w-25" src="{{asset('frontend/assets/img/svg//45 Medical Document.svg')}}" alt="">

                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-right" role="document">
                        <div class="modal-content">
                            <form action="http://127.0.0.1:8000/prescription" enctype="multipart/form-data" method="POST">
                                <div class="alert alert-danger print-error-msg" style="display:none">
                                    <ul></ul>
                                </div>
                                <input type="hidden" name="_token" value="RnNhapNAI2bBbEVo1oubrwK9wJyfjfubops1NHSi">
                                <div class="modal-body">

                                    <h3 class="text-left">Welcome to Medicrest </h3>
                                    <p>Genuine and Quality Assured Medicines</p>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input class="form-control" type="text" name="name">
                                    </div>
                                    <label for="name" class="form-label">Prescription</label>
                                    <div id="myRadioGroup" class="py-2">
                                        PDF File<input type="radio" name="filetype" value="pdf" class="mr-3 ml-2" />
                                        Image File<input type="radio" name="filetype" value="img" class="mr-3 ml-2" />
                                        Word File<input type="radio" name="filetype" value="word" class="mr-3 ml-2" />

                                        <div id="pdf" class="desc">
                                            <div class="mb-3 py-3">
                                                <!--<div class="pdf-box">-->
                                                <div>
                                                    <label for="prescription" class="form-label">Upload Prescription
                                                        [PDF]</label>
                                                    <!--<input type="file" class="form-control " multiple  name="prescription[]"   />-->
                                                    <input type="file" class="form-control pdf" multiple name="prescription" id="myPdf" />
                                                    <canvas class="w-100 border" id="pdfViewer" style="background-image: url({{asset('frontend/assets/img/icon/rx.jpg')}}); background-size: contain; background-repeat: no-repeat; background-position: center;"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="img" class="desc">
                                            <!--<input type="file" class="form-control " multiple  name="prescription"   />-->
                                            <input class="" type="file" id="upload_imgs" name="prescription[]" multiple />
                                            <!--<div class="" id="img_preview" aria-live="polite" ></div>-->
                                        </div>
                                        <div id="word" class="desc">
                                            <input id="files" type="file" accept=".docx" name="prescription[]" onchange="PreviewWordDoc()" />
                                            <!--<div id="word-container" class=""></div>-->
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input class="form-control" type="text" name="phone">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input class="form-control" type="text" name="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea class="form-control" rows="4" name="address"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="note" class="form-label">Note</label>
                                        <textarea class="form-control" rows="4" name="note"></textarea>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button w-50" class="btn" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Sent Prescription</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7" style="display: flex; align-content: space-around; flex-direction: column; justify-content: space-around;">
                <div>
                    <div class="main-box w-100 aiz-carousel dots-inside-bottom mobile-img-auto-height" data-arrows="true" data-dots="true" data-autoplay="true">
                        <div class="carousel-box">
                            <a href="">
                                <img class="d-block mw-100 img-fit overflow-hidden" src="{{asset('frontend/uploads/all/sTwxwkfiXBfJVNHoLHfDVCIfoHIn9oJF3555rudv.png')}}" alt="Medicrest promo" height="100%" onerror="this.onerror=null;this.src='{{asset('frontend/assets/img/placeholder-rect.jpg')}}';">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-12" style="display: flex; align-content: space-around; flex-direction: column; justify-content: space-around;">
                <a href="http://127.0.0.1:8000/category/oral">
                    <div class="text-center right-box d-flex">
                        <img class="feature-img col-md-5" src="{{asset('frontend/uploads/all/VisIaRZ4tI1EfmXAHOXoPcnzYcVW7CUEOS7AcWG6.svg')}}" alt="Oral" data-src="{{asset('frontend/assets/img/placeholder.jpg')}}">
                        <h4 class="py-3 text-left">Oral</h4>
                    </div>
                </a>
                <a href="http://127.0.0.1:8000/category/injectables">
                    <div class="text-center right-box d-flex">
                        <img class="feature-img col-md-5" src="{{asset('frontend/uploads/all/RCOBiA0Vx3VqGGjNaAHfqqJ64H3yS7mugjZWt6So.svg')}}" alt="Injectables" data-src="{{asset('frontend/assets/img/placeholder.jpg')}}">
                        <h4 class="py-3 text-left">Injectables</h4>
                    </div>
                </a>
                <a href="http://127.0.0.1:8000/category/other-medicine">
                    <div class="text-center right-box d-flex">
                        <img class="feature-img col-md-5" src="{{asset('frontend/uploads/all/OlNGRwbqCNzX2UPsPHGCRjCECeAZy4v8PWmlHQiM.svg')}}" alt="Other Medicine" data-src="{{asset('frontend/assets/img/placeholder.jpg')}}">
                        <h4 class="py-3 text-left">Other Medicine</h4>
                    </div>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 key d-flex">
                    <img class=" col-md-3" src="{{asset('frontend/assets/img/svg/15 Ambulance.svg')}}" alt="">
                    <h3>Express Delivery </h3>
                </div>
                <div class="col-md-3 key d-flex">
                    <img class=" col-md-3" src="{{asset('frontend/assets/img/svg/51 Medical Shield.svg')}}" alt="">
                    <h3>100% Return</h3>
                </div>
                <div class="col-md-3 key d-flex">
                    <img class=" col-md-3" src="{{asset('frontend/assets/img/svg/06 Medical Symbol.svg')}}" alt="">
                    <h3>International Delivery </h3>
                </div>
                <div class="col-md-3 key d-flex">
                    <img class=" col-md-3" src="{{asset('frontend/assets/img/svg/40 Waiting Period.svg')}}" alt="">
                    <h3> Customer Support</h3>
                </div>
            </div>
        </div>


        <div class="mb-4">
            <div class="container-fluid px-5">
                <div class="row gutters-10 px-2">
                </div>
            </div>
        </div>

        <?php
        $products = App\Models\Product::all();
        ?>
    <div id="section_newest">
        <section class="mb-4">
            <div class="container-fluid px-1">
                <div class="px-2">
                    <div class="d-flex mb-3 align-items-baseline">
                        <h3 class="h5 fw-700 mb-0">
                            <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">
                                New Products
                            </span>
                        </h3>
                    </div>
                    <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5"
                        data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows="true">
                        <div class="carousel-box">
                            <div class="row">
                                <!-- First Product -->
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="aiz-card-box hov-shadow-md mt-1 mb-2 has-transition bg-white">
                                        <div class="h-30px">
                                            <span class="badge-custom">OFF<span class="box ml-1 mr-0">&nbsp;73%</span></span>
                                        </div>
                                        <div class="position-relative">
                                            <a href="http://127.0.0.1:8000/product/zyrop-10000-iu-1-vial" class="d-block">
                                                <img class="img-fit lazyload mx-auto h-140px h-md-210px"
                                                    src="http://127.0.0.1:8000/public/assets/img/placeholder.jpg"
                                                    data-src="{{asset('frontend/uploads/all/7LYeIt0TjmL3zQtejadkN2PaNyy5FPZh9C6dWK26.webp')}}"
                                                    alt="ZYROP 10000 IU 1 VIAL">
                                            </a>
                                        </div>
                                        <div class="p-md-3 p-2 text-left">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 ">
                                                        <a href="http://127.0.0.1:8000/product/zyrop-10000-iu-1-vial"
                                                            class="d-block text-reset">ZYROP 10000 IU 1 VIAL</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <h6 class="py-2 m-0"> 0 PC</h6>
                                                </div>
                                                <div class="col-md-7">
                                                    <span class="fs-12 float-right">CADILA HEALTHCARE</span>
                                                </div>
                                                <div class="col-md-12 ">
                                                    <span class="category fs-10">Injectables</span>
                                                </div>
                                            </div>
                                            <div class="rating rating-sm mt-1">
                                                <i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i>
                                            </div>
                                            <div class="row">
                                                <div class="fs-15 col-md-7">
                                                    <del class="price-real mr-1">Rs2,863.73</del><br>
                                                    <span class="price-offer">Rs784.09</span>
                                                </div>
                                                <div class="col-md-5 ">
                                                    <a href="javascript:void(0)" class="wish-btn px-2"
                                                        onclick="addToWishList(128)" data-toggle="tooltip"
                                                        data-title="Add to wishlist" data-placement="left">
                                                        <i class="la la-heart-o" style="font-size:25px"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" onclick="showAddToCartModal(128)"
                                                        data-toggle="tooltip" data-title="Add to cart"
                                                        data-placement="left">
                                                        <!--<i class="las la-shopping-cart"></i>-->
                                                        <img class="float-right"
                                                            src="{{asset('frontend/assets/img/icon/shopping-bag.png')}}"
                                                            alt="" style="width: 25px;">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


        <div class="container-fluid px-3">
            <div class="px-2">
                <div class="d-flex flex-wrap mb-3 align-items-baseline border-bottom">
                    <h3 class="h5  mb-0">
                        <span class=" border-width-2 pb-3 d-inline-block">Best Medicine for all Kidney Diseases</span>
                    </h3>
                </div>
                <div class=" row py-2">

                    <div class="p-3 col-12 col-md-2">
                        <!--<a href="http://127.0.0.1:8000/category/kidney-infection-cvtoy">-->
                        <a href="#">
                            <div class="helth-div text-center">
                                <img class="w-25 pt-3" src="{{asset('frontend/uploads/all/xvRWKTFlRguhWQBpxjfpNvtowDaM1r3HtWNuXo7g.png')}}')}}" alt="Kidney Infection" data-src="{{asset('frontend/uploads/all/xvRWKTFlRguhWQBpxjfpNvtowDaM1r3HtWNuXo7g.png')}}" onerror="this.onerror=null;this.src='{{asset('frontend/assets/img/placeholder-rect.jpg')}}';">
                                <h4 class="py-3 d-block">Kidney Infection</h4>
                            </div>
                        </a>
                    </div>
                    <div class="p-3 col-12 col-md-2">
                        <!--<a href="http://127.0.0.1:8000/category/peritoneal-dialysis-3uykh">-->
                        <a href="#">
                            <div class="helth-div text-center">
                                <img class="w-25 pt-3" src="{{asset('frontend/uploads/all/WcgPtkvGIzhFbaJ9Uaipzt1x2QbNwmGRcIwjggYn.png')}}" alt="Peritoneal Dialysis" data-src="{{asset('frontend/uploads/all/WcgPtkvGIzhFbaJ9Uaipzt1x2QbNwmGRcIwjggYn.png')}}" onerror="this.onerror=null;this.src='{{asset('frontend/assets/img/placeholder-rect.jpg')}}';">
                                <h4 class="py-3 d-block">Peritoneal Dialysis</h4>
                            </div>
                        </a>
                    </div>
                    <div class="p-3 col-12 col-md-2">
                        <!--<a href="http://127.0.0.1:8000/category/kidney-transplant-10ayd">-->
                        <a href="#">
                            <div class="helth-div text-center">
                                <img class="w-25 pt-3" src="{{asset('frontend/uploads/all/hYWUk9T9vuHhXQLllY2JWOldiBJXtUsonUAGbzUI.png')}}" alt="Kidney Transplant" data-src="{{asset('frontend/uploads/all/hYWUk9T9vuHhXQLllY2JWOldiBJXtUsonUAGbzUI.png')}}" onerror="this.onerror=null;this.src='{{asset('frontend/assets/img/placeholder-rect.jpg')}}';">
                                <h4 class="py-3 d-block">Kidney Transplant</h4>
                            </div>
                        </a>
                    </div>
                    <div class="p-3 col-12 col-md-2">
                        <!--<a href="http://127.0.0.1:8000/category/dialysis-2ioel">-->
                        <a href="#">
                            <div class="helth-div text-center">
                                <img class="w-25 pt-3" src="{{asset('frontend/uploads/all/jjVHcy416zZgKEDO3v4BkGiu80WMtDg4VGNmw17C.png')}}" alt="Dialysis" data-src="{{asset('frontend/uploads/all/jjVHcy416zZgKEDO3v4BkGiu80WMtDg4VGNmw17C.png')}}" onerror="this.onerror=null;this.src='{{asset('frontend/assets/img/placeholder-rect.jpg')}}';">
                                <h4 class="py-3 d-block">Dialysis</h4>
                            </div>
                        </a>
                    </div>
                    <div class="p-3 col-12 col-md-2">
                        <!--<a href="http://127.0.0.1:8000/category/hemodialysis-mjlsk">-->
                        <a href="#">
                            <div class="helth-div text-center">
                                <img class="w-25 pt-3" src="{{asset('frontend/uploads/all/IfNgbtiCVLCvDUdWPKV5RDKAiFXV35Zn2bqcTClY.png')}}" alt="Hemodialysis" data-src="{{asset('frontend/uploads/all/IfNgbtiCVLCvDUdWPKV5RDKAiFXV35Zn2bqcTClY.png')}}" onerror="this.onerror=null;this.src='{{asset('frontend/assets/img/placeholder-rect.jpg')}}';">
                                <h4 class="py-3 d-block">Hemodialysis</h4>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>



        <section class="mb-4">
            <div class="container-fluid px-1">
                <div class="row gutters-10 px-2">
                    <div class="col-lg-12">
                        <div class="d-flex mb-3 align-items-baseline border-bottom">
                            <h3 class="h5  mb-0">
                                <span class=" pb-3 d-inline-block">Top 10 Brands</span>
                            </h3>
                            <a href="{{url('brands')}}" class="ml-auto mr-0 btn ">View All</a>
                        </div>
                        <div class="row gutters-5">

                            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="8" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-autoplay="true">
                           
                                <div class="carousel-box">
                                    <a href="http://127.0.0.1:8000/brand/Baxter-LHJoB" class="bg-white  d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                        <div class="row align-items-center no-gutters">
                                            <div class=" text-center">
                                                <img src="{{asset('frontend/uploads/all/P5eBg3blrX3uyRSi3V0iVAAuR5JujTeNdfqmFcVB.svg')}}" data-src="{{asset('frontend/uploads/all/P5eBg3blrX3uyRSi3V0iVAAuR5JujTeNdfqmFcVB.svg')}}" alt="Baxter" class="img-fluid img lazyload ">
                                            </div>
                                        </div>
                                    </a>
                            </div>
                            <div class="carousel-box">
                                    <a href="http://127.0.0.1:8000/brand/Baxter-LHJoB" class="bg-white  d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                        <div class="row align-items-center no-gutters">
                                            <div class=" text-center">
                                                <img src="{{asset('frontend/uploads/all/P5eBg3blrX3uyRSi3V0iVAAuR5JujTeNdfqmFcVB.svg')}}" data-src="{{asset('frontend/uploads/all/P5eBg3blrX3uyRSi3V0iVAAuR5JujTeNdfqmFcVB.svg')}}" alt="Baxter" class="img-fluid img lazyload ">
                                            </div>
                                        </div>
                                    </a>
                            </div>
                            <div class="carousel-box">
                                    <a href="http://127.0.0.1:8000/brand/Baxter-LHJoB" class="bg-white  d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                        <div class="row align-items-center no-gutters">
                                            <div class=" text-center">
                                                <img src="{{asset('frontend/uploads/all/P5eBg3blrX3uyRSi3V0iVAAuR5JujTeNdfqmFcVB.svg')}}" data-src="{{asset('frontend/uploads/all/P5eBg3blrX3uyRSi3V0iVAAuR5JujTeNdfqmFcVB.svg')}}" alt="Baxter" class="img-fluid img lazyload ">
                                            </div>
                                        </div>
                                    </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection