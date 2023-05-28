<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <meta name="app-url" content="//medicrest.in/">
 

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="icon" href="{{asset('uploads/all/logo.png')}}">
    <title>Medicrest | Medicrest Kidney Medicine Online Pharmacy</title>

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

    <!-- CSS Styles -->
    <link rel="stylesheet" href="{{asset('assets/css/vendors.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/aiz-core.css')}}">

    <style>
        body {
            font-size: 12px;
        }
    </style>

</head>

<body>

    <div class="aiz-main-wrapper d-flex">
        <div class="flex-grow-1">

            <div class="h-100 bg-cover bg-center py-5 d-flex align-items-center"
                style="background-image: url({{asset('uploads/all/4WKxTKIB5ANZbuWDmBixsOGZLQX8W9hxIjP6Qg72.jpg')}})">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-xl-4 mx-auto">
                            <div class="card text-left">
                                <div class="card-body">
                                    <div class="mb-5 text-center">
                                        <img src="{{asset('uploads/all/logo.png')}}" class="mw-100 mb-4" height="" alt="Logo">
                                        <h1 class="h3 text-primary mb-0">Welcome to Medicrest</h1>
                                        <p>Login to your account.</p>
                                    </div>
                                    
                                    <form class="pad-hor" method="POST" id="login_form">
                                        @csrf
                                        <div class="form-group">
                                        <input class="form-control" placeholder="email" name="email" type="text" />
                                        </div>
                                        <div class="form-group">
                                        <input class="form-control" placeholder="Password" id="password-input" type="password" name="password" />
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-6">
                                                <div class="text-left">
                                                    <label class="aiz-checkbox">
                                                        <input type="checkbox" name="remember" id="remember">
                                                        <span>Remember Me</span>
                                                        <span class="aiz-square-check"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="text-right">
                                                    <a href="#"
                                                        class="text-reset fs-14">Forgot password?</a>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" id="btnSumbit">
                                        <i class="fas fa-spinner fa-spin" style="display:none"></i> 
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>




<script src="{{asset('assets/js/vendors/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/vendors/jquery.fullscreen.min.js')}}"></script>
        <!-- Main Script -->
        <script src="{{asset('assets/js/main.js?v=1.1')}}" type="text/javascript"></script>
        <script src="{{asset('assets/toastr/toastr.min.js')}}"></script>
        <link href="{{asset('assets/toastr/toastr.css')}}" rel="stylesheet">
<script>
toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
}
</script>
<script>
    $(document).on('submit', '#login_form', function (e) {
        e.preventDefault();
        $.ajax({
            url: "/api/login",
            type: "post",
            data: new FormData(this),
            dataType: "JSON",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function () {
                $("#btnSubmit").attr('disabled', true);
                $(".fa-spin").css('display', 'inline-block');
            },
            complete: function () {
                $("#btnSubmit").attr('disabled', false);
                $(".fa-spin").css('display', 'none');
            },
            success: function (response) {
                console.log(response)
                if (response["status"] == "fail") {
                    toastr.error('Failed', response["msg"])
                } else if (response["status"] == "success") {
                    toastr.success('Success', response["msg"])
                    $("#login_form")[0].reset();
                    if (response["user"]["type"] == "2") {
                        
                            window.location.href = "/";
                        

                    } else if (response["user"]["type"] == "1") {
                        
                     
                            window.location.href = "/admin/dashboard";
                        

                    } else {

                        window.location.href = "/";

                    }

                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

</script>
</body>

</html>