@extends('layout/master')
@section('title')
 Medicrest | Add Brand
@endsection
@section('content')
    <!-- container -->
    <div class="main-container container-fluid">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="left-content">
                <span class="main-content-title mg-b-0 mg-b-lg-1">Brand</span>
            </div>
        </div>
        <!-- /breadcrumb -->

        <!-- row -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="#" class="add_category">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class=" p-2">
                                        <div class="form-group">
                                            <label for="">Brand Name</label>
                                            <input class="form-control" placeholder="Category Name" name="name" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Brand Image</label>
                                            <input class="form-control"  name="image" type="file">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <button class="btn btn-primary pd-x-20" name="info" id="btnSubmit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- Container closed -->

    <!-- Add brand -->
    <script>
        $(".add_category").on('submit', (function (e) {
            // alert('hello');
            e.preventDefault();

            $.ajax({
                url: '/api/add/brand',
                type: "POST",
                data: new FormData(this),
                dataType: "JSON",
                processData: false,
                contentType: false, 
                cache: false,
                beforeSend: function () {
                    $("#btnSubmit").attr('disabled', true);
                    $(".fa-pulse").css('display', 'inline-block');
                },
                complete: function () {
                    $("#btnSubmit").attr('disabled', false);
                    $(".fa-pulse").css('display', 'none');
                },
                success: function (response) {
                    // console.log(response);
                    if (response["status"] == "fail") {
                        toastr.error('Failed', response["msg"])
                    } else if (response["status"] == "success") {
                        toastr.success('Success', response["msg"])
                        $('#uploadedFiles').html('');
                        $(".add_category")[0].reset();
                        window.location.href = "{{url('brands')}}";
                    }
                },
                error: function (error) {
                    // console.log(error);
                }
            });
        }));
    </script>
@endsection