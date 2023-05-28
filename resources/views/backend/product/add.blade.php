@extends('layout/master')
@section('title')
Medicrest | Add Product
@endsection
@section('content')
<style>
    .textarea {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        width: 100%;
    }

    .dropzone {
        border: 2px dashed rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        color: #999;
        font-size: 18px;
    }
</style>


<!-- CKEditor CDN  -->
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<!-- container -->
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <span class="main-content-title mg-b-0 mg-b-lg-1">Products</span>
    </div>
    <div class="justify-content-center mt-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item tx-15"><a href="/admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
        </ol>
    </div>
</div>
<!-- /breadcrumb -->
<!-- row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class=" p-2">
                            <!-- dropzone start-->
                            <div class="form-group col-lg-12" id="drop_form">
                                <form id="form_dropzone" action="/api/upload/files" class="dropzone" data-id="from_dropzone" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="fallback">
                                        <input required name="file" type="file" id="dropFile" />
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
                                                <!-- <tr>
                                                                        <td>{{__('')}}</td>
                                                                    </tr> -->
                                            </thead>
                                            <tbody id="uploadedFiles">
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <!-- dropzone end-->
                            <form action="#" class="add_product">
                                <input type="hidden" name="image" id="filesArrss" value="">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="">Product Name</label>
                                            <input class="form-control" placeholder="Enter Product Name" name="name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="">Brand Name</label>
                                            <select id="brand_id" name="brand_id" class="form-control">
                                                <option value="">--Brand--</option>
                                                @foreach(\App\Models\Brand::all() as $brand)
                                                <option value="{{ $brand->id }} {{ old('brand') == $brand->id ? 'selected' : '' }}">
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
                                            <input class="form-control" placeholder="Enter Meta Title" name="meta_title" type="text">
                                        </div>
                                    </div>



                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Meta Keywords</label>
                                            <input class="form-control" placeholder="Enter Meta Keywords" name="meta_keywords" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="">SKU</label>
                                            <input class="form-control" placeholder="Enter SKU" name="sku" type="text">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Stock Quantity</label>
                                            <input type="number" class="form-control" placeholder="Stock" name="stock_quantity" placeholder="Stock">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Price</label>
                                            <input class="form-control" placeholder="Enter Price" name="price" type="number">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Discount %</label>
                                            <input class="form-control" placeholder="Enter discount in percentage" name="discount" type="text">
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
                                                <option value="{{ $cat->id }} {{ old('cat_id') == $cat->id ? 'selected' : '' }}">
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
                                            <textarea name="short_description" class="textarea" id="short_description" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea name="description" class="summernote" id="" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Meta Description</label>
                                            <textarea name="meta_description" class="form-control textarea" id="" cols="60" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary pd-x-20 float-end" name="info" id="btnSubmit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /row -->
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300,
        });
    });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#body'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#short_description'))
        .catch(error => {
            console.error(error);
        });
</script>


<script>
    $(".add_product").on('submit', (function(e) {
        // alert('hello');
        e.preventDefault();

        $.ajax({
            url: '/api/add/product',
            type: "POST",
            data: new FormData(this),
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $("#btnSubmit").attr('disabled', true);
                $(".fa-pulse").css('display', 'inline-block');
            },
            complete: function() {
                $("#btnSubmit").attr('disabled', false);
                $(".fa-pulse").css('display', 'none');
            },
            success: function(response) {
                // console.log(response);
                if (response["status"] == "fail") {
                    toastr.error('Failed', response["msg"])
                } else if (response["status"] == "success") {
                    toastr.success('Success', response["msg"])
                    $('#uploadedFiles').html('');
                    $(".add_product")[0].reset();
                    window.location.href = "{{url('product')}}";
                }
            },
            error: function(error) {
                // console.log(error);
            }
        });
    }));
</script>
<script>
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
                    var html_label = "<label value=''>Child Category</label>";
                    var html_option = "<option value=''>--- Child Category--- </option>";
                    if (response.status) {
                        $('#child_cat_div').removeClass('d-none');
                        $.each(response.data, function(id, name) {
                            html_option += "<option value='" + id + "'>" + name + "</option>"
                        });
                    } else {
                        $('#child_cat_div').addClass('d-none');
                    }
                    $('#child_cat_id').html(html_option);
                    $('#label').html(html_label);

                }
            });
        }
    });
</script>

<!-- dropzone -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    //DropZone
    Dropzone.autoDiscover = false;
    $(document).ready(function() {
        var filesUploaded = [];
        var filesHtml = '';
        var validExtensions = [".jpg", ".jpeg", ".png", ".PNG", ".svg", ".word", ".PDF", ".pdf", ".xls", ".csv",
            ".webp"
        ];
        var myDropzone = new Dropzone("#form_dropzone", {
            parallelUploads: 1,
            uploadMultiple: false,
            timeout: 18000000,
            maxFilesize: 20, // MB
            maxFiles: 50,
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