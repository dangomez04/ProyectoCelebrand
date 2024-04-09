<?php

/**
 * Archivo para mostrar mensajes del servidor 
 */

?>
<div class="notifications">
    <?php if ($this->session->flashdata("error")) { ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="mdi mdi-block-helper me-2"></i>
            <strong>Oh no!</strong><?= $this->session->flashdata("error") ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php }
    if ($this->session->flashdata("success")) { ?>
        <div class="alert alert-success alert-dismissible fade show">
            <i class="mdi mdi-check-all me-2"></i>
            <strong></strong><?= $this->session->flashdata("success") ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php }
    if ($this->session->flashdata("warning")) { ?>
        <div class="alert alert-warning alert-dismissible fade show">
            <i class="mdi mdi-alert-outline me-2"></i>
            <strong></strong><?= $this->session->flashdata("success") ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>
</div>