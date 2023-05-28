	
		
    <!-- Favicon -->

 

	<link rel="icon" href="{{asset('uploads/all/logo.png')}}" type="image/x-icon" />



		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	


		<script src="{{ asset('backend/assets/plugins/summernote/summernote.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/summernote/summernote.min.js') }}"></script>


		<!-- Icons css -->
		<link href="{{asset('backend/assets/css/icons.css')}}" rel="stylesheet">

		<!--  bootstrap css-->
		<!-- <link id="style" href="{{asset('backend/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" /> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- style css -->
		<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
		<link href="{{asset('backend/assets/css/style.css')}}" rel="stylesheet">
		<link href="{{asset('backend/assets/css/style-dark.css')}}" rel="stylesheet">
		<link href="{{asset('backend/assets/css/style-transparent.css')}}" rel="stylesheet">

		<!---Skinmodes css-->
		<link href="{{asset('backend/assets/css/skin-modes.css')}}" rel="stylesheet" />

        <!-- JQuery min js -->
		<link href="{{asset('backend/assets/css/animate.css')}}" rel="stylesheet">

<!-- dropzone -->
<link href="{{asset('backend/asset/dropzone/dist/min/basic.min.css')}}" rel="stylesheet">
<link href="{{asset('backend/asset/dropzone/dist/min/dropzone.min.css')}}" rel="stylesheet">
<script src="{{asset('backend/asset/dropzone/dist/dropzone.js')}}"></script>


<style>
	::-webkit-scrollbar {
    margin-top: 20px;
    height: 5px;
    width: 10px;
}

::-webkit-scrollbar-thumb {
    background: #ee780f !important;
    border-radius: 10px;
    transition: 0.5s;
}
:root{ --primary-bg-hover: #946c0e !important;}

::-webkit-scrollbar-thumb:hover {
    background: #946c0e !important;
    transition: 0.5s;
}
.side-menu__label{
    color: #a9abbd;
    fill: #a9abbd;
}
.slide-item{
    color: #a9abbd !important;
}

    /* The Modal (background) */
    .Imgmodal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }
    
    /* Modal Content (image) */
    .mymodal-content {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
    }
    
    /* Add Animation */
    .mymodal-content{  
      -webkit-animation-name: zoom;
      -webkit-animation-duration: 0.6s;
      animation-name: zoom;
      animation-duration: 0.6s;
    }
    
    @-webkit-keyframes zoom {
      from {-webkit-transform:scale(0)} 
      to {-webkit-transform:scale(1)}
    }
    
    @keyframes zoom {
      from {transform:scale(0)} 
      to {transform:scale(1)}
    }
    
    /* The Close Button */
    .close {
      position: absolute;
      top: 15px;
      right: 35px;
      color: #f1f1f1;
      font-size: 40px;
      font-weight: bold;
      transition: 0.3s;
    }
    
    .close:hover,
    .close:focus {
      color: #bbb;
      text-decoration: none;
      cursor: pointer;
    }
    
    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px){
      .modal-content {
        width: 100%;
      }
    }
    .pic-1:hover{
        cursor:pointer;
    }
</style>
@yield('styles')