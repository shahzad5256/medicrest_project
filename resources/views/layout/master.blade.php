@if(Auth::check())

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />

    <!-- Title -->
    <title> @yield('title') </title>
    @include('layout/style')

</head>

<body class="ltr main-body app sidebar-mini dark-menu">

    <!-- Loader -->
    <div id="global-loader">
        <img src="{{asset('backend/assets/img/loader.svg')}}" class="loader-img" alt="Loader" style="color:#ee780f !important;">
    </div>
    <!-- /Loader -->

    <!-- Page -->
    <div class="page">

        <div>
            <div class="main-header side-header sticky nav nav-item" id="header-ajax">
                @include('layout/header')
            </div>
            @include('layout/sidebar')
        </div>
        <div class="main-content app-content">

            <!-- container -->
            <div class="main-container container-fluid">

                @yield('content')
            </div>
        </div>
        @include('layout/sidebar-right')
        @include('layout/footer')

    </div>
    <!-- Back-to-top -->
    <a href="#top" id="back-to-top"><i class="las la-arrow-up"></i></a>
    @include('layout/script')
    @yield('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="{{asset('backend/assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('backend/assets/js/chart.flot.js')}}"></script>
    <script>
        $(document).ready(function() {

            // notifications()
            $(function() {
                setInterval(notifications, 5000);
            });

            function notifications() {
                console.log('its calling')
                $.ajax({
                    url: '/api/notification/manage',
                    type: "get",
                    dataType: "JSON",
                    cache: false,
                    beforeSend: function() {

                    },
                    complete: function() {

                    },
                    success: function(response) {

                        if (response["status"] == "fail") {
                            //toastr.error('Not Found',response["msg"])
                        } else if (response["status"] == "success") {
                            $(".unreadCount").css('display', 'flex');
                            $(".unreadCount").html(' ')
                            if (response["unread"] >= 1) {

                                $("#unread").css('display', 'block');
                            } else {


                                $("#unread").css('display', 'none');
                            }
                            $(".unreadCount").append(response["unread"])
                            $(".notification_head").html('')
                            $(".notification_head").append(response["head"])

                            $("#notification_data").html('')
                            $("#notification_data").prepend(response["messages"])

                            // setTimeout(notifications, 3000);
                        }
                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            }
            // setTimeout(notifications, 1000);

        });
    </script>
</body>

</html>

@endif
@if(!Auth::check())
<script>
    window.location.href = "/login";
</script>



@endif