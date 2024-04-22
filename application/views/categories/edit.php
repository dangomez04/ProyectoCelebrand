<!-- @extends('template')

@section('topCustomCSS') -->
<!-- dropzone css -->
<link href="<?= APP_URL ?>assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
<!-- @endsection

@section('content') -->
<div class="row justify-content-center">
    <div class="col-xxl-8 col-lg-10 col-md-10 col-12">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit category</h4>
                <hr>

                <form class="form-horizontal mt-4" id="editproduct_form" method="post" action="<?= APP_URL. 'categories/update'?>">
                    <input type="hidden" name="id_category" value="<?= $category_info->id_category ?>">
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label>Category name</label>
                            <input type="text" required class="form-control" value="<?= $category_info->name ?>" name="name">
                        </div>
                        
                    </div>

                        <br>
                    <input type="submit" value="Save category" class="btn btn-primary">
                    <a href="<?= APP_URL . "categories" ?>" class="btn btn-secondary">
                    Cancel
                </a>
                </form>
            </div>
           
        </div>
    </div>
</div>
<!-- @endsection

@section('customJS') -->
<!-- dropzone plugin -->
<script src="<?= APP_URL ?>assets/libs/dropzone/min/dropzone.min.js"></script>
<!-- <script>
    $("body").on('click', '#submit_editproduct_form', function(e) {
        e.preventDefault();
        checkForm('editproduct_form', function() {

        });
    });



    var myDropzone = "";
    $("#my-dropzone").dropzone({
        url: '<?= APP_URL . "{$language}/products/updateProductImage" ?>',
        maxFilesize: 10,
        maxFiles: 1,
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 3,
        addRemoveLinks: true,
        dictRemoveFile: '<i class="fa fa-trash" aria-hidden="true"></i> Delete',
        dictDefaultMessage: "<i class='fa fa-paperclip' aria-hidden='true'></i> <?= lang('Drop files here or click to upload') ?>",
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        init: function() {
            myDropzone = this;
        }
    }); -->
</script>

<!-- @endsection -->