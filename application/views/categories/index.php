@extends('template')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <header class="card-title"><?= lang('Categories') ?>

                    <a href="<?= APP_URL . "{$language}/categories/new" ?>" class="btn btn-primary float-end">
                        <i class='bx bx-plus'></i> <?= lang('Create Category') ?>
                    </a>
                </header>
                <hr>
                <table class="table table-bordered table-hover mt-4" id="categories-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th><?= lang('Category Name') ?></th>
                            <th><?= lang('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $category) : ?>
                            <tr>
                                <td><?= $category->id_category ?></td>
                                <td><?= $category->name ?></td>
                                <td>
                                    <a href="<?= APP_URL . "{$language}/categories/edit/{$category->id_category}" ?>" class="btn btn-primary btn-sm">
                                        <i class='bx bxs-edit-alt'></i>
                                    </a>
                                    <a href="<?= APP_URL . "{$language}/categories/delete/{$category->id_category}" ?>" class="btn btn-danger btn-sm">
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
        var categories_table = $('#categories-table').DataTable({
            // processing: true,
            // serverSide: true,
        });
    });
</script>
@endsection