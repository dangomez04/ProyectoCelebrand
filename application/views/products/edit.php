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
                <h4 class="card-title">Edit product</h4>
                <hr>

                <form class="form-horizontal mt-4" id="editproduct_form" method="post"  action="<?= APP_URL. 'products/update'?>">
                    <input type="hidden" name="id_product" value="<?= $product->id_product ?>">
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label>Product name</label>
                            <input type="text" required class="form-control" value="<?= $product->name ?>" name="name">
                        </div>  
                        
                    </div>
                    <br>


                    <div class="row mt-3">
                        <div class="form-group col-12 col-md-6">
                            <div>
                                <label>Category</label>
                                <select class="form-control form-select" required name="id_category">
                                    <option>
                                        Select an option
                                    </option>
                                    <?php foreach ($categories as $category) : ?>
                                        <option value="<?=$category->id_category ?>" <?= $category->id_category == $product->id_category ? 'selected' : '' ?>>
                                            <?=$category->name?>
                                        </option>
                                    <?php endforeach ?>
                                </select>

                            </div>
                            <br>
                            <div class="mt-1">
                                <label>Price</label>
                                <input type="number" required class="form-control" step="0.01" data-v-min="0.1" value="<?= $product->price ?>" name="price">
                            </div>
                        </div>
                        <br>

                        <div class="form-group col-12 col-md-6">
                            <label>Product Description</label><br>
                            <textarea class="form-control" rows="5" name="description"><?= $product->description ?></textarea>
                        </div>
                    </div>  
                    <br>

                    <input type="submit" value="Save product" class="btn btn-primary">
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
        url: '<?= APP_URL . "products/updateProductImage" ?>',
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
    });
</script> -->
<!-- @endsection -->