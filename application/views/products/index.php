<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <header class="card-title">Products

                    <a href="<?= APP_URL . "products/new" ?>" class="btn btn-primary float-end">
                        <i class='bx bx-plus'></i> Create product
                    </a>
                </header>
                <hr>
                <table class="table table-bordered table-hover mt-4" id="products-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product name</th>
                            <th class="description-thead">Description</th>
                            <th>Price</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $key => $product) : ?>
                            <tr>
                                <td><?=$product->id_product ?></td>
                                <td><?=$product->name?></td>
                                <td>
                                    <div class="description">
                                        <?=$product->description?>
                                    </div>
                                </td>
                                <td><?=$product->price?></td>
                                <td><?=$product->category_name?></td>
                                <td>
                                    <a title="Edit" href="<?= APP_URL . "{products/edit/{$product->id_product}" ?>" class="btn btn-primary">
                                        <i class='bx bxs-edit-alt'></i>
                                    </a>
                                    <a title="Delete" href="<?= APP_URL . 'products/delete/' .$product->id_product ?>" class="btn btn-danger">
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

<script type="text/javascript">
    $(function() {
        var products_table = $('#products-table').DataTable({
            // processing: true,
            // serverSide: true,
        });
    });
</script>
