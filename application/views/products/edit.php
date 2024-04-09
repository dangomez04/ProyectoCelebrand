@extends('template')

@section('topCustomCSS')
<!-- dropzone css -->
<link href="<?= APP_URL ?>assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-xxl-8 col-lg-10 col-md-10 col-12">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= lang('Edit Product') ?></h4>
                <hr>

                <form class="form-horizontal mt-4" id="editproduct_form" method="post">
                    <input type="hidden" name="id_product" value="<?= $product->id_product ?>">
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label><?= lang("Product Name") ?></label>
                            <input type="text" required class="form-control" value="<?= $product->name ?>" name="name">
                        </div>
                        <div class="form-group col-12 col-md-6 mt-xs-2">
                            <label><?= lang("Product Brand") ?></label>
                            <input type="text" required class="form-control" value="<?= $product->brand ?>" name="brand">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-12 col-md-6">
                            <div>
                                <label><?= lang("Category") ?></label>
                                <select class="form-control form-select" required name="id_category">
                                    <option>
                                        <?= lang('Select an option') ?>
                                    </option>
                                    <?php foreach ($categories as $category) : ?>
                                        <option value="{{$category->id_category}}" <?= $category->id_category == $product->id_category ? 'selected' : '' ?>>
                                            {{$category->name}}
                                        </option>
                                    <?php endforeach ?>
                                </select>

                            </div>
                            <div class="mt-1">
                                <label><?= lang("Price") ?></label>
                                <input type="number" required class="form-control" step="0.01" data-v-min="0.1" value="<?= $product->price ?>" name="price">
                            </div>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label><?= lang("Product Description") ?></label>
                            <textarea class="form-control" rows="5" name="description"><?= $product->description ?></textarea>
                        </div>
                    </div>

                    <hr>
                    <h4 class="card-title mb-3">Product Images</h4>

                    <div id="my-dropzone" class="dropzone"></div>
                </form>
            </div>
            <footer class="card-footer text-end">
                <button type="submit" id="submit_editproduct_form" class="btn btn-primary">
                    <?= lang('Save product') ?>
                </button>
                <a href="<?= APP_URL . "{$language}/products" ?>" class="btn btn-secondary">
                    <?= lang('Cancel') ?>
                </a>
            </footer>
        </div>
    </div>
</div>
@endsection

@section('customJS')
<!-- dropzone plugin -->
<script src="<?= APP_URL ?>assets/libs/dropzone/min/dropzone.min.js"></script>
<script>
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
    });
</script>
@endsection