<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="WUVhRAjl5YhJkImleSvHPtT4Bq15diGh5oNJivWq">
    <meta name="app-url" content="https://www.medicrest.in">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <title>Medicrest</title>

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

    <!-- CSS Styles -->
    <link rel="stylesheet" href="{{asset('assets/css/vendors.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/aiz-core.css')}}">
</head>

<body>
    <div class="aiz-main-wrapper d-flex">
        <div class="flex-grow-1">
            <div class="h-100 bg-cover bg-center py-5 d-flex align-items-center"
            style="background-image: url(uploads/all/4WKxTKIB5ANZbuWDmBixsOGZLQX8W9hxIjP6Qg72.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-xl-4 mx-auto">
                            <div class="card text-left">
                                <div class="card-header">Create a New Account</div>
                                <div class="card-body">
                                    <form method="POST" action="https://medicrest.in/register">
                                        <input type="hidden" name="_token" value="WUVhRAjl5YhJkImleSvHPtT4Bq15diGh5oNJivWq">
                                        <div class="form-group">
                                            <input id="name" type="text" class="form-control" name="name" value=""
                                                required autofocus placeholder="Full Name">
                                        </div>
                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control" name="password"
                                                required placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control" name="email" value=""
                                                required placeholder="Email">
                                        </div>
                                     
                                        <div class="checkbox pad-btm text-left">
                                            <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox"
                                                required>
                                            <label for="demo-form-checkbox">I agree with the Terms and Conditions</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </form>
                                    <div class="mt-3">
                                        Already have an account? <a href="#"
                                            class="btn-link mar-rgt text-bold">Sign in</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .aiz-main-wrapper -->
</body>

</html>
