<!-- JAVASCRIPT -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="<?= APP_URL ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= APP_URL ?>assets/libs/metismenu/metisMenu.min.js"></script>
<script src="<?= APP_URL ?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= APP_URL ?>assets/libs/node-waves/waves.min.js"></script>

<!-- DATATABLE -->
<script src="<?= APP_URL ?>assets/libs/datatables/datatables.min.js"></script>

<!-- APP JS -->
<script src="<?= APP_URL ?>assets/js/app.min.js"></script>

<!-- FORM VALIDATION -->
<script src="<?= APP_URL ?>assets/libs/jbvalidator/jbvalidator.min.js"></script>

<?php $this->load->view('jbvalidator-init-js'); ?>

<!-- CHANGE LANGUAGE JS -->
<?php $this->load->view('change-language-js'); ?>

<!-- CHANGE THEME JS -->
<?php $this->load->view('theme-switcher-js'); ?>

<!-- TOASTR JS -->
<script src="<?= APP_URL ?>assets/libs/toastr/toastr.min.js"></script>

<!-- SWEET ALERT JS-->
<script src="<?= APP_URL ?>assets/libs/sweetalert2/sweetalert2.all.min.js"></script>

<?php
if (!empty($customjs) && $customjs) {
    foreach ($customjs as $js) {
        $this->load->view('scripts/' . $js);
    }
}
?>