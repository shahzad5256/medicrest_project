<style>
.dark-menu .side-menu .slide .side-menu__item.active i {
    color: var(--primary-bg-color);
}

.dark-menu .side-menu .slide .side-menu__item.active .side-menu__label {
    color: var(--primary-bg-color) !important;
}
</style>
<!-- main-sidebar -->
<div class="sticky">
    <aside class="app-sidebar">
        <div class="main-sidebar-header  active">
            <a class="header-logo active" href="#">

                <img style="text-align: center;position: relative;right: -20%;" src="{{asset('uploads/all/logo.png')}}" class="img-fluid w-50"
                    alt="logo">

                <!-- <img style="text-align: center;position: relative;right: -20%;" src="{{asset('/assets/logo/logo-removebg.png')}}" class="img-fluid w-50" alt="logo"> -->
                <img src="{{asset('uploads/all/logo.png')}}" class="main-logo  mobile-logo" alt="logo">
                <img src="{{asset('uploads/all/logo.png')}}" class="main-logo  mobile-dark" alt="logo">

            </a>
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <!-- <li class="side-item side-item-category">Main</li> -->
              

                <li class="side-item side-item-category">USER MANAGEMENT</li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{url('/admin/dashboard')}}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                            viewBox="0 0 24 24">
                            <path
                                d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm7 7v-5h4v5h-4zm2-15.586 6 6V15l.001 5H16v-5c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H6v-9.586l6-6z" />
                        </svg><span class="side-menu__label">Dashboard</span></a>

                </li>
               
                <li class="slide">
                    <a class="side-menu__item" href="">
                        <i class="fas fa-user-tag me-3"></i>
                        <span class="side-menu__label">Roles</span>
                    </a>
                </li>
             
                <li class="slide"><a class="side-menu__item" href=""><i class="fas fa-users me-3"></i>
                        <span class="side-menu__label">
                            Users </span>
                    </a></li>
                
                <li class="slide"><a class="side-menu__item" href=""><i class="fas fa-user-friends me-3"></i>
                        <span class="side-menu__label">
                            User Types </span>
                    </a></li>

               
                <li class="side-item side-item-category">PRODUCT MANAGEMENT</li>

                <li class="slide"><a class="side-menu__item" href="{{url('category')}}"><i
                            class="fas fa-folder-open me-3"></i></i>
                        <span class="side-menu__label">
                            Categories </span>
                    </a></li>
                    <li class="slide"><a class="side-menu__item" href="{{url('brands')}}"><i
                            class="fas fa-folder-open me-3"></i></i>
                        <span class="side-menu__label">
                            Brands </span>
                    </a></li>
                <li class="slide"><a class="side-menu__item" href="{{url('product')}}"><i
                            class="fas fa-box me-3"></i>
                        <span class="side-menu__label">
                            Products </span>
                    </a></li>
               

                
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                    height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </aside>
</div>
<!-- main-sidebar -->
<!-- Make the Link Active -->
<script>
$(document).ready(function() {
    $('.side-menu a[href$="' + location.pathname + '"]').addClass('active');
});
</script>