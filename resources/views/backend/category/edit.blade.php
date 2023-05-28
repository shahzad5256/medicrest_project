@extends('layout/master')
@section('title')
Medicrest | Edit Category
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
                        <form action="#" id="update_category">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class=" p-2">
                                        <div class="form-group">
                                        <input type="hidden" id='id' name="id" value="{{$categories->id}}">
                                            <label for="">Name</label>
                                            <input class="form-control" placeholder="Enter your Name" name="name" type="text" value="{{ $categories->name }}">
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group {{ $categories->is_parent==1 ? 'd-none' : '' }}" id="parent_cat_div">
                                                <select class="form-control input-rounded" name="parent_id" id="">
                                                    <option value="">--Parent Category--</option>
                                                    @foreach($parent_cats as $pcats)
                                                    <option value="{{ $pcats->id }}" {{ $pcats->id == $categories->parent_id ? 'selected' : '' }}>{{ $pcats->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="is_parent" style="margin-right: 35px;margin-left: -20px;">Is Parent <span class="text-danger">*</span> :</label>
                                    <input id="is_parent" type="checkbox" name="is_parent" class="form-check-input input-rounded" value="{{ $categories->is_parent }}" {{ $categories->is_parent==1 ? 'checked' : '' }}> Yes                                
                                </div>
                            </div>
                            <button class="btn btn-warning pd-x-20" name="info" id="btnSubmit">Submit</button>
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
    <!-- Update Category -->
    <script>
        $("#update_category").on('submit', (function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: '/api/update/category',
                type: "POST",
                data: formData,
                dataType: "JSON",
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
                    // console.log(response);
                    if (response["status"] == "fail") {
                        toastr.error('Failed', response["msg"])
                    } else if (response["status"] == "success") {
                        toastr.success('Success', response["msg"])
                        $("#update_category")[0].reset();
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