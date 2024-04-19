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
                <h4 class="card-title">Create product</h4>
                <hr>

                <form class="form-horizontal mt-4" action="<?= APP_URL . "{$language}/products/create" ?>" id="form" method="post">
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label>Product name</label>
                            <input type="text" required class="form-control" placeholder="Ej: Pala de acero" value="<?= $this->session->flashdata('name') ?>" name="name">
                        </div>
                        <div class="form-group col-12 col-md-6 mt-xs-2">
                            <label>Product brand</label>
                            <input type="text" required class="form-control" placeholder="Ej: Revis Company" value="<?= $this->session->flashdata('brand') ?>" name="brand">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-12 col-md-6">
                            <div>
                                <label>Category</label>
                                <select class="form-control form-select" required name="id_category">
                                    <option>
                                        Select an option
                                    </option>
                                    <?php foreach ($categories as $category) : ?>
                                        <option value="{{$category->id_category}}" <?= $category->id == $this->session->flashdata('id_category') ? 'selected' : '' ?>>
                                            {{$category->name}}
                                        </option>
                                    <?php endforeach ?>
                                </select>

                            </div>
                            <div class="mt-1">
                                <label>Price</label>
                                <input type="number" required class="form-control" step="0.01" data-v-min="0.1" value="<?= $this->session->flashdata('price') ?>" name="price">
                            </div>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label>Product description</label>
                            <textarea class="form-control" rows="5" name="description" placeholder="Ej: Herramienta de acero multifuncional, cuenta con una gran resistencia y durabilidad">
                                <?= $this->session->flashdata('description') ?>
                            </textarea>
                        </div>
                    </div>
                </form>
            </div>
            <footer class="card-footer text-end">
                <button type="submit" id="submit_form" class="btn btn-primary">
                    Create product
                </button>
                <a href="<?= APP_URL . "{$language}/products" ?>" class="btn btn-secondary">
                    Cancel
                </a>
            </footer>
        </div>

    </div>


</div>
<!-- @endsection

@section('customJS') -->
<!-- dropzone plugin -->
<script src="<?= APP_URL ?>assets/libs/dropzone/min/dropzone.min.js"></script>
<!-- @endsection -->