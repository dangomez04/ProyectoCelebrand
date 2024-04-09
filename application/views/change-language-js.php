<script type="text/javascript">
    $(function() {
        $('body').on('click', '.change-lang-btn', function() {
            let lang = $(this).data('lang');
            var url = '';

            let uri_string = "<?= $this->uri->uri_string() ?>";
            uri_string = lang + "/" + uri_string.substring(3);

            let params = "<?= $_SERVER['QUERY_STRING'] ?>";

            if (params.length > 0) {
                url = "<?= APP_URL ?>" + uri_string + "?" + params;
            } else {
                url = "<?= APP_URL ?>" + uri_string;
            }

            window.location.href = url;
        })
    })
</script>