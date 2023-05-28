@extends('layout/master')
@section('title')
Medicrest | Products
@endsection
@section('content')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <span class="main-content-title mg-b-0 mg-b-lg-1">View Product</span>
    </div>
    <div class="justify-content-center mt-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item tx-15"><a href="/admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product View</li>
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
                        <a href="{{ route('product.create') }}" class="btn ripple btn-primary"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
               
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Image</th>
                                <th>Product Name</th>

                                <th>SKU</th>
                                <!-- <th>Description</th> -->
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Category</th>
                                <th>Total Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <?php
                            $files = json_decode($product->image);
                            ?>
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                @if($files)
                                <td><img src="{{ asset('uploads/imagess/'.$files[0]->filename) }}" style="max-height:90px; max-width:120px;"></td>
                                @else
                                <td></td>
                                @endif
                                <td>{{ $product->name }}</td>
                                <!-- <td>{{ $product->attribute }}</td> -->
                                <td>{{ $product->sku }}</td>
                                <!-- <td>{{ $product->description }}</td> -->
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->discount }} %</td>
                                <td>{{ $product->categorie->name }}</td>
                                <td>{{$product->stock_quantity}}</td>
                               
                                <td>
                                    
                                    <a href="{{ url('product/edit/'.$product->id) }}" data-toggle="tooltip" title="edit" class="btn btn-warning button-icon btn-sm" data-placement="bottom">
                                        <i class="si si-pencil tx-12"></i>
                                    </a>
                                   
                                    <a href="javascript:;" id="{{ $product->id }}" title="delete" class="btnDelete btn btn-danger button-icon btn-sm" data-placement="bottom">
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



<script>
    $(document).on('click', '.btnDelete', function(e) {
        var id = $(this).attr('id')
        // alert(id);
        Swal.fire({
                title: "Are you sure?",
                text: "You will not be able to recover this Product!",
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
                        url: '/api/delete/product/' + id,
                        type: "delete",
                        dataType: "JSON",
                        success: function(response) {

                            if (response["status"] == "fail") {
                                Swal.fire("Failed!", "Failed to delete Prodcut.",
                                    "error");
                            } else if (response["status"] == "success") {
                                Swal.fire("Deleted!", "Product has been deleted.", "success");
                                window.location.href = "{{url('product')}}";
                                formCount();
                            }
                        },
                        error: function(error) {
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