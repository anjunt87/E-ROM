<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Claim Reimbursement of Medical - Login">
	<title>Claim Reimbursement of Medical - Login</title>
	<link href="<?= base_url('assets/'); ?>img/fav/Pegadaian_logo.png" rel="icon">
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	
	<!-- Vendor CSS Files -->
	<link href="<?= base_url('assets/'); ?>vendor/aos/aos.css" rel="stylesheet">
	<link href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/'); ?>vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="<?= base_url('assets/'); ?>img/fav/Pegadaian_logo.png" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
							<?= $this->session->flashdata('message'); ?>
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off" action="<?= site_url('auth/login'); ?>">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="nik">NIK</label>
									<input id="nik" type="text" class="form-control" name="nik" value="<?=set_value('nik'); ?> " required autofocus>
									<div class="invalid-feedback">
										NIK is invalid
									</div>
									<?= form_error('nik', '<small class="text-danger pl-3">','</small>'); ?>
								</div>

								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Password</label>
										<!-- <a href="forgot.html" class="float-end">
											Forgot Password?
										</a> -->
									</div>
									<input id="password" type="password" class="form-control" name="password" value="<?=set_value('password'); ?>" required>
									<div class="invalid-feedback">
										Password is required
									</div>
									<?= form_error('password', '<small class="text-danger pl-3">','</small>'); ?>
								</div>

								<div class="d-flex align-items-center">
									<div class="form-check">
										<input type="checkbox" name="remember" id="remember" class="form-check-input">
										<label for="remember" class="form-check-label">Remember Me</label>
									</div>
									<button type="submit" class="btn btn-success ms-auto">
										Login
									</button>
									<!-- <a class="btn btn-success ms-auto" href="<?= site_url('admin'); ?>">Login</a> -->
								</div>
							</form>
						</div>
						<!-- <div class="card-footer py-3 border-0">
							<div class="text-center">
								Don't have an account? <a href="register.html" class="text-dark">Create One</a>
							</div>
						</div> -->
					</div>
					<div class="text-center mt-5 text-muted">
						&copy; Copyright <strong><span>Gagitualdi.com</span></strong>. All Rights Reserved
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/login.js"></script>
</body>
</html>