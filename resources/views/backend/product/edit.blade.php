@extends('layout/master')
@section('title')
Medicrest | Edit Product
@endsection
@section('content')
<style>
    .textarea {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        width: 100%;
    }
</style>
<!-- dropzone -->
<link href="{{asset('asset/dropzone/dist/min/basic.min.css')}}" rel="stylesheet">
<link href="{{asset('asset/dropzone/dist/min/dropzone.min.css')}}" rel="stylesheet">
<script src="{{asset('asset/dropzone/dist/dropzone.js')}}"></script>
<script src="{{asset('asset/libs/select2/js/select2.min.js')}}"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<!-- container -->
<div class="main-container container-fluid">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <span class="main-content-title mg-b-0 mg-b-lg-1">Product</span>
        </div>
    </div>
    <!-- /breadcrumb -->
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-lg-10">
                            <div class=" p-2">
                                <!-- dropzone start-->
                                <div class="form-group col-lg-12" id="edit_ann">
                                    <form id="form_dropzone" action="/api/upload/files" class="dropzone" data-id="from_dropzone" role="form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="fallback">
                                            <input name="file" type="file" id="dropFile" />
                                        </div>
                                    </form>
                                </div>
                                <div class="form-group col-lg-12" id="drop_note">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <span class="text-danger" id="uploadError" style="display:none;"></span><br>
                                            <span id="uploadMsg">{{__('')}}</span><br>
                                            <span id="uploadMsg">{{__('')}}</span>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12" id="drop_upload">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table id="myTable" class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="uploadedFiles">
                                                    @if($products->image != NULL && $files != NULL)
                                                    @foreach($files as $ticket)
                                                    <tr>
                                                        <td><span><b>{{$ticket->name}}</b></span></td>
                                                    </tr>
                                                    @endforeach
                                                    @else
                                                    <tr>
                                                        <td colspan="2" align="center">{{__('')}}</td>
                                                    </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <form action="#" id="update_product">
                                    <input type="hidden" name="image" value="{{$products->image}}" id="filesArrss">
                                    @csrf
                                    <input type="hidden" id='id' name="id" value="{{$products->id}}">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="">Product Name</label>
                                                <input class="form-control" placeholder="Enter Product Name" name="name" type="text" value="{{$products->name}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="">Brand Name</label>
                                                <select id="brand_id" name="brand_id" class="form-control">
                                                    <option value="">--Brand--</option>
                                                    @foreach(\App\Models\Brand::all() as $brand)
                                                    <option value="{{ $brand->id }}" {{ $brand->id == $products->brand_id ? 'selected' : '' }}>
                                                        {{ $brand->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="">Meta Title</label>
                                                <input class="form-control" placeholder="Enter Meta Title" name="meta_title" type="text" value="{{$products->meta_title}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="">Meta Keywords</label>
                                                <input class="form-control" placeholder="Enter Meta Keywords" name="meta_keywords" type="text" value="{{$products->meta_keywords}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="">SKU</label>
                                                <input class="form-control" placeholder="Enter SKU" name="sku" type="text" value="{{$products->sku}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="">Stock Quantity</label>
                                                <input type="number" class="form-control" placeholder="Stock" name="stock_quantity" value="{{$products->stock_quantity}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="">Price</label>
                                                <input class="form-control" placeholder="Enter Price" name="price" type="number" value="{{$products->price}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="">Discount %</label>
                                                <input class="form-control" placeholder="Enter discount in percentage" name="discount" type="text" value="{{$products->discount}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="">Category</label>
                                                <select id="cat_id" name="cat_id" class="form-control">
                                                    <option value="">--Category--</option>
                                                    @foreach(\App\Models\Category::where('is_parent',1)->get() as $cat)
                                                    <option value="{{ $cat->id }}" {{ $cat->id == $products->cat_id ? 'selected' : '' }}>
                                                        {{ $cat->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group d-none" id="child_cat_div">
                                                <label for="" id="label"></label>
                                                <select id="child_cat_id" name="child_cat_id" class="form-control">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="">Short Description</label>
                                                <textarea name="short_description" class="textarea" id="short_description" cols="30" rows="10">{{$products->short_description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="">Description</label>
                                                <textarea name="description" class="summernote" id="" cols="30" rows="10">{{$products->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="">Meta Description</label>
                                                <textarea name="meta_description" class="form-control textarea" id="" cols="60" rows="4">{{$products->meta_description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary pd-x-20" name="info" id="btnSubmit">Submit</button>
                                </form>


                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->



<div class="{{$products->child_cat_id}}" id="gggg"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300,
        });
    });
</script>

<script>
    ClassicEditor
        .create(document.querySelector('#short_description'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#body'))
        .catch(error => {
            console.error(error);
        });
</script>
<!-- Container closed -->
<script>
    var child_cat_id = $("#gggg").attr('class')
    $('#cat_id').change(function() {
        var cat_id = $(this).val();

        if (cat_id != null) {
            $.ajax({
                url: "/category/" + cat_id + "/child",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    cat_id: cat_id,
                },
                success: function(response) {
                    var html_option = "<option value=''>--- Child Category--- </option>";
                    if (response.status) {
                        $('#child_cat_div').removeClass('d-none');
                        $.each(response.data, function(id, name) {
                            html_option += "<option value='" + id + "' " + (child_cat_id == id ?
                                'selected' : '') + ">" + name + "</option>"
                        });
                    } else {
                        $('#child_cat_div').addClass('d-none');
                    }
                    $('#child_cat_id').html(html_option);
                }
            });
        }
    });
    if (child_cat_id != null) {
        $('#cat_id').change();
    }
</script>
<!-- Update Category -->
<script>
    $("#update_product").on('submit', (function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: '/api/update/product',
            type: "POST",
            data: formData,
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $("#btnSubmit").attr('disabled', true);
                $(".fa-spin").css('display', 'inline-block');
            },
            complete: function() {
                $("#btnSubmit").attr('disabled', false);
                $(".fa-spin").css('display', 'none');
            },
            success: function(response) {
                // console.log(response);
                if (response["status"] == "fail") {
                    toastr.error('Failed', response["msg"])
                } else if (response["status"] == "success") {
                    toastr.success('Success', response["msg"])
                    $("#update_product")[0].reset();
                    window.location.href = "{{url('product')}}";
                }
            },
            error: function(error) {
                // console.log(error);
            }
        });
    }));
</script>

<!-- dropzone for add announcement-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    //DropZone
    Dropzone.autoDiscover = false;
    $(document).ready(function() {
        var files = '{{$products->image}}'
        var filesUploaded = files == '' ? [] : JSON.parse('<?php echo $products->image; ?>')
        var filesHtml = '';
        var validExtensions = [".jpg", ".jpeg", ".png", ".PNG", ".svg", ".PDF", ".pdf", ".xls", ".csv", ".webp"];
        var myDropzone = new Dropzone("#form_dropzone", {
            parallelUploads: 1,
            uploadMultiple: false,
            timeout: 18000000,
            maxFilesize: 20, // MB
            maxFiles: 5,
            acceptedFiles: ".jpg,.jpeg,.png,.PNG,.svg,.pdf,.PDF,.csv,.xls,.word,.docs,.webp",
            addRemoveLinks: true,
            autoProcessQueue: true,
            init: function() {

                this.on('queuecomplete', function(file, response) {
                    // Here you can go to next form/route
                    uploadedFiles()
                })

                this.on("sending", function(file, xhr, formData) {
                    //console.log(file)
                })

                this.on("complete", function(file, response) {
                    //console.log(response)
                })

                this.on("success", function(file, response) {
                    this.removeFile(file);
                    //var res = JSON.parse(response)
                    if (response["status"] == "success") {
                        filesUploaded.push(response["file"]["file"]);
                    }
                })

                this.on("uploadprogress", function(file, progress, bytesSent) {
                    //console.log(file, progress, bytesSent)
                })

                this.on('errormultiple', function(file, response) {
                    // Here you can go to next form/route
                    //alert(response)
                })

                this.on('error', function(file, response) {
                    // Here you can go to next form/route
                    // alert(response)
                    console.log(response)

                })
            },
            maxfilesreached: function(file) {
                $("#uploadError").html('Please upload max 5 file.');
            },
            maxfilesexceeded: function(file) {
                $("#uploadError").html('Please upload max 5 file.');
            },
            removedfile: function(file) {
                var fileName = file.name;
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file
                    .previewElement) : void 0;
            }
        });

        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }

        $("#btnUpload").click(function(e) {
            e.preventDefault();
            $("#uploadError").hide();
            //$("#btnUpload").attr('disabled', true);
            if (myDropzone.getRejectedFiles().length == 0) {
                if (myDropzone.getAcceptedFiles().length == 0) {
                    $("#uploadError").show();
                    $("#uploadError").html('Please select files to upload.');
                } else {
                    $("#uploadError").hide();
                    for (var i = 0; i < myDropzone.getAcceptedFiles().length; i++) {
                        myDropzone.processFile(myDropzone.getAcceptedFiles()[i]);
                    }
                }
            } else {
                $("#uploadError").show();
                $("#uploadError").html('Please upload valid files.');
            }
        });

        function processDropzonePhotos() {
            $("#uploadError").hide();
            //$("#btnUpload").attr('disabled', true);

            console.log(myDropzone.getRejectedFiles().length)

            if (myDropzone.getRejectedFiles().length == 0) {
                if (myDropzone.getAcceptedFiles().length == 0) {
                    $("#uploadError").show();
                    $("#uploadError").html('Please select files to upload.');
                } else {
                    $("#uploadError").hide();
                    for (var i = 0; i < myDropzone.getAcceptedFiles().length; i++) {
                        myDropzone.processFile(myDropzone.getAcceptedFiles()[i]);
                    }
                }
            } else {
                $("#uploadError").show();
                $("#uploadError").html('Please upload valid files.');
            }
        }

        function uploadedFiles() {
            var html = '';
            if (filesUploaded.length > 0) {
                $.each(filesUploaded, (i, f) => {

                    html += '<tr>' +
                        '<td><span><b>' + f.name + '</b><br><small>Uploaded At: ' + f.date +
                        ' | Size: ' + formatBytes(f.size, decimals = 2) + '</small></span></td>' +
                        '<td><button type="button" id="' + f.filename +
                        '" class="btnDeleteFile btn btn-sm btn-danger w-100"><i class="fa fa-trash"></i></button> </td></tr>';
                })
                $("#uploadedFiles").empty()
                $("#uploadedFiles").html(html)

                $("#filesArrss").val(JSON.stringify(filesUploaded))
            } else {
                $("#uploadedFiles").empty()
                $("#uploadedFiles").html('No files are uploaded yet')
                $("#filesArrss").val('')
            }
        }

        function formatBytes(bytes, decimals = 2) {
            if (bytes === 0) return '0 Bytes';

            const k = 1024;
            const dm = decimals < 0 ? 0 : decimals;
            const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

            const i = Math.floor(Math.log(bytes) / Math.log(k));

            return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
        }

        function removeUploadedFile(file) {
            var newArr = [];

            $.each(filesUploaded, (i, f) => {
                if (f.filename != file) {
                    newArr.push(f)
                }
            })

            filesUploaded = newArr;
            uploadedFiles()
        }
        $(document).on('click', '.btnDeleteFile', function(e) {
            var file = $(this).attr('id');
            console.log(file)
            Swal.fire({
                    title: "Are you sure?",
                    text: "You will not be able to recover this Image!",
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
                            url: '/api/delete/files',
                            type: "delete",
                            dataType: "JSON",
                            data: {
                                file: file,
                            },
                            success: function(response) {
                                if (response["status"] == "fail") {
                                    Swal.fire("Failed!", "Failed to delete file.",
                                        "error");
                                } else if (response["status"] == "success") {
                                    Swal.fire("Deleted!", "File has been deleted.",
                                        "success");
                                    removeUploadedFile(file)

                                }
                            },
                            error: function(error) {
                                console.log(error);
                            },
                            async: false
                        });
                    } else {
                        Swal.close();
                    }
                });
        });



    });
</script>
<!-- end dropzone-->
@endsection