@extends('layout/master')
@section('title')
 Medicrest | Add Category
@endsection
@section('content')
    <!-- container -->
    <div class="main-container container-fluid">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="left-content">
                <span class="main-content-title mg-b-0 mg-b-lg-1">Category</span>
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
                                            <label for="">Category Name</label>
                                            <input class="form-control" placeholder="Category Name" name="name" type="text">
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group d-none" id="parent_cat_div">
                                                <select class="form-control input-rounded" name="parent_id" id="">
                                                    <option value="">--Parent Category--</option>
                                                    @foreach($parent_cats as $pcats)
                                                    <option value="{{ $pcats->id }}" >{{ $pcats->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 " >
                                    <label for="is_parent" style="margin-right: 35px;margin-left: -20px; margin-top:45px;">Is Parent :</label>
                                    <input id="is_parent" type="checkbox" name="is_parent" class="form-check-input input-rounded" value="1" checked style="margin-top:45px; padding:9px;">                                
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
    <script>
        $('#is_parent').change(function(e){
            e.preventDefault();
            var is_checked=$('#is_parent').prop('checked');
            // alert(is_checked);
            if(is_checked){
                $('#parent_cat_div').addClass('d-none');
                $('#parent_cat_div').val('');
            }
            else{
                $('#parent_cat_div').removeClass('d-none');
            }
        })
    </script>
    <!-- Add Category -->
    <script>
        $(".add_category").on('submit', (function (e) {
            // alert('hello');
            e.preventDefault();

            $.ajax({
                url: '/api/add/category',
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
                        window.location.href = "{{url('category')}}";
                    }
                },
                error: function (error) {
                    // console.log(error);
                }
            });
        }));
    </script>
@endsection