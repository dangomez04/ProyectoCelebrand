<script>
    var checkSubmitForm = (id_form) => new Promise((resolve, reject) => {
        let language_file = "<?= CRM_URL . "assets/libs/jbvalidator/lang/{$language}.json" ?>";

        let validator = $('#' + id_form).jbvalidator({
            errorMessage: true,
            successClass: true,
            language: language_file
        });

        //check form without submit
        let error_count = validator.checkAll(); //return error count

        if (error_count === 0) {
            resolve({
                success: true,
            });
        }
        //reload instance after dynamic element is added
        validator.reload();
    })

    $('body').on('click', '#submit_form', function(e) {
        e.preventDefault();
        checkSubmitForm('form').then(function(result) {
            if (result.success == true) {
                $('#form').submit()
            }
        });
    })

    function checkForm(id_form, function_callback) {
        checkSubmitForm(id_form).then(function(result) {
            if (result.success == true) {
                function_callback()
            }
        });
    }
</script>