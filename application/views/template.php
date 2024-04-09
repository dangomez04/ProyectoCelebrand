<?php $this->load->view('_partials/head') ?>

<?php $this->load->view('_partials/topbar') ?>

<?php $this->load->view('_partials/sidebar') ?>

<div class="main-content" id="result">
	<div class="page-content">
		<div class="container-fluid">
			<?php $this->load->view('_partials/page-title'); ?>

			<?php $this->load->view('_partials/notifications'); ?>

			<?php
			/**
			 * @param views son las vistas que se van a cargar
			 */
			if (isset($views)) {
				if (is_array($views)) {
					foreach ($views as $view) {
						$this->load->view($view);
					}
				} else {
					$this->load->view($views);
				}
			}

			?>

		</div>
	</div>
</div>
<?php $this->load->view('_partials/footer') ?>