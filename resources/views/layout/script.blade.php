
		<!--Internal  Nice-select js-->


<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

      


<!-- Moment js -->

<!-- Internal Jquery.steps js -->
<script src="{{ asset('backend/assets/plugins/jquery-steps/jquery.steps.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/parsleyjs/parsley.min.js') }}"></script>


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<!--Internal  Form-wizard js -->
<!-- <script src="{{ asset('backend/assets/js/form-wizard.js') }}"></script> -->

<!--Internal Fileuploads js-->
<script src="{{ asset('backend/assets/plugins/fileuploads/js/fileupload.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/fileuploads/js/file-upload.js') }}"></script>

<!--Internal Fancy uploader js-->
<script src="{{ asset('backend/assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
		<script src="{{asset('backend/assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
		<script src="{{asset('backend/assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>

<!-- Bootstrap js -->
<script src="{{asset('backend/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Internal Chart.Bundle js-->
<script src="{{asset('backend/assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>

<!-- Moment js -->
<script src="{{asset('backend/assets/plugins/moment/moment.js')}}"></script>

<!-- INTERNAL Apexchart js -->
<script src="{{asset('backend/assets/js/apexcharts.js')}}"></script>

<!--Internal Sparkline js -->
<script src="{{asset('backend/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Moment js -->
<script src="{{asset('backend/assets/plugins/raphael/raphael.min.js')}}"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="{{asset('backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>

<!-- Eva-icons js -->
<script src="{{asset('backend/assets/js/eva-icons.min.js')}}"></script>

<!-- right-sidebar js -->
<script src="{{asset('backend/assets/plugins/sidebar/sidebar.js')}}"></script>
<script src="{{asset('backend/assets/plugins/sidebar/sidebar-custom.js')}}"></script>

<!-- Sidebar js -->
<script src="{{asset('backend/assets/plugins/side-menu/sidemenu.js')}}"></script>

<!-- Sticky js -->
<script src="{{asset('backend/assets/js/sticky.js')}}"></script>

<!--Internal  index js -->
<script src="{{asset('backend/assets/js/index.js')}}"></script>

<!-- Chart-circle js -->
<script src="{{asset('backend/assets/js/circle-progress.min.js')}}"></script>

<!-- Internal Data tables -->
<script src="{{asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>



<!-- Theme Color js -->
<script src="{{asset('backend/assets/js/themecolor.js')}}"></script>

<!-- custom js -->
<script src="{{asset('backend/assets/js/custom.js')}}"></script>

<!-- Internal Data tables -->
<script src="{{asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
<script src="{{asset('backend/assets/js/table-data.js')}}"></script>

<script src="{{asset('backend/assets/toastr/toastr.min.js')}}"></script>
<link href="{{asset('backend/assets/toastr/toastr.css')}}" rel="stylesheet">

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


<!-- Internal HandleCounter js -->
<script src="{{asset('backend/assets/js/handleCounter.js')}}"></script>


<!-- Jquery-steps js -->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@yield('script')