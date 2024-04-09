<?php
if (!isset($this->language)) {
	$this->language = 'en';
}
?>

<!doctype html>
<html lang="en">

<head>
	<title>Error 404 :\</title>
	<link rel="icon" type="image/x-icon" href="<?= APP_URL ?>assets/images/favicon.ico">

	<!-- Bootstrap Css -->
	<link href="<?= APP_URL ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	<!-- Icons Css -->
	<link href="<?= APP_URL ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="<?= APP_URL ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>

	<div class="account-pages my-5 pt-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="text-center mb-5">
						<h1 class="display-2 fw-medium">4<i class="bx bx-buoy bx-spin text-primary display-3"></i>4</h1>
						<h4 class="text-uppercase">Sorry, page not found</h4>
						<div class="mt-5 text-center">
							<a class="btn btn-primary waves-effect waves-light" href="<?= APP_URL . $this->language ?>">Back to Dashboard</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-8 col-xl-6">
					<div>
						<img src="<?= APP_URL ?>assets/images/error-img.png" alt="" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- JAVASCRIPT -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="<?= APP_URL ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- APP JS -->
	<script src="<?= APP_URL ?>assets/js/app.min.js"></script>



</body>

</html>