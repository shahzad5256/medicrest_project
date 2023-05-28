@extends('layout/master')
@section('title')
Medicrest | Brands
@endsection
@section('content')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <span class="main-content-title mg-b-0 mg-b-lg-1">View Brands</span>
    </div>
    <div class="justify-content-center mt-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item tx-15"><a href="/admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Brand View</li>
        </ol>
    </div>
</div>
<!-- /breadcrumb -->

<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card custom-card overflow-hidden">
            <div class="card-body">
               
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-end mb-3">
                        <a href="{{ route('brand.create') }}" class="btn ripple btn-primary"
                        ><i class="fa fa-plus"></i></a>
                    </div>
                </div>
               
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-10p">#ID</th>
                                <th class="wd-35p">Brand Name</th>
                                <th class="wd-35p">Brand Image</th>
                                <th class="wd-20p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brands as $brand)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->image }}</td>
                                <td>
                                    <a href="{{ url('/brand/edit/'.$brand->id) }}" data-toggle="tooltip" title="edit" class="btn btn-warning button-icon btn-sm" data-placement="bottom">
                                        <i class="si si-pencil tx-12"></i>
                                    </a>
                                
                                    <a href="javascript:;" id="{{ $brand->id }}" title="delete" class="btnDelete btn btn-danger button-icon btn-sm btnDelete" data-placement="bottom">
                                        <i class="si si-trash tx-12"></i>
                                    </a>
                                   
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Row -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Delete -->
<script>
    $(document).on('click', '.btnDelete', function (e) {
        var id = $(this).attr('id')
        // alert(id);
        Swal.fire({
                title: "Are you sure?",
                text: "You will not be able to recover this Category!",
                type: "warning",
                buttons: true,
                confirmButtonColor: "#ff5e5e",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false,
                dangerMode: true,
                showCancelButton: true
            })
            .then((deleteThis) => {
                if (deleteThis.isConfirmed) {
                    $.ajax({
                        url: '/api/delete/brand/' + id,
                        type: "delete",
                        dataType: "JSON",
                        success: function (response) {

                            if (response["status"] == "fail") {
                                Swal.fire("Failed!", "Failed to delete brand.",
                                    "error");
                            } else if (response["status"] == "success") {
                                Swal.fire("Deleted!", "brand has been deleted.","success");
                                window.location.href = "{{url('brands')}}";
                                formCount();
                            }
                        },
                        error: function (error) {
                            // console.log(error);
                        },
                        async: false
                    });
                } else {
                    Swal.close();
                }
            });
    });
</script>
@endsection