<script type="text/javascript">
    $(function() {
        $('body').on('click', '#theme-switcher', function() {
            var url = '';

            let params = "<?= $_SERVER['QUERY_STRING'] ?>";

            if (params.length > 0) {
                url = "<?= APP_URL . "{$this->uri->uri_string()}?{$_SERVER['QUERY_STRING']}" ?>";
            } else {
                url = "<?= APP_URL . "{$this->uri->uri_string()}" ?>";
            }

            $.ajax({
                type: 'POST',
                data: {
                    'actual_mode': '<?= $this->colour_mode ?>',
                },
                url: '<?= APP_URL . "{$this->language}/Ajax/switchTheme" ?>',
                success: function(response) {
                    window.location.href = url;
                }
            })
        })
    })
</script>