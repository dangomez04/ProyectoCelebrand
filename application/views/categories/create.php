<!-- @extends('template')

@section('content') -->
<div class="row justify-content-center">
    <div class="col-xxl-8 col-lg-10 col-md-10 col-12">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create category</h4>
                <hr>

                <form class="form-horizontal mt-4" action="<?= APP_URL . "categories/create" ?>" id="form" method="post">
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label>Category name</label>
                            <input type="text" required class="form-control" placeholder="Ej: Herramientas" value="<?= $this->session->flashdata('name') ?>" name="name">
                        </div>

                    </div>

                </form>
            </div>
            <footer class="card-footer text-end">
                <button type="submit" id="submit_form" class="btn btn-primary">
                    Create category
                </button>
                <a href="<?= APP_URL . "categories" ?>" class="btn btn-secondary">
                    Cancel
                </a>
            </footer>
        </div>

    </div>

</div>
<!-- @endsection -->