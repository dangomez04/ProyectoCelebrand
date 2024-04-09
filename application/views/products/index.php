@extends('template')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <header class="card-title"><?= lang('Products') ?>

                    <a href="<?= APP_URL . "{$language}/products/new" ?>" class="btn btn-primary float-end">
                        <i class='bx bx-plus'></i> <?= lang('Create product') ?>
                    </a>
                </header>
                <hr>
                <table class="table table-bordered table-hover mt-4" id="products-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th><?= lang('Product Name') ?></th>
                            <th class="description-thead"><?= lang('Description') ?></th>
                            <th><?= lang('Price') ?></th>
                            <th><?= lang('Category') ?></th>
                            <th><?= lang('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $key => $product) : ?>
                            <tr>
                                <td>{{$product->id_product}}</td>
                                <td>{{$product->name}}</td>
                                <td>
                                    <div class="description">
                                        {{$product->description}}
                                    </div>
                                </td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>
                                    <a title="<?= lang('Edit') ?>" href="<?= APP_URL . "{$language}/products/edit/{$product->id_product}" ?>" class="btn btn-primary">
                                        <i class='bx bxs-edit-alt'></i>
                                    </a>
                                    <a title="<?= lang('Delete') ?>" class="btn btn-danger">
                                        <i class='bx bxs-trash'></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection

@section('customJs')
<script type="text/javascript">
    $(function() {
        var products_table = $('#products-table').DataTable({
            // processing: true,
            // serverSide: true,
        });
    });
</script>
@endsection