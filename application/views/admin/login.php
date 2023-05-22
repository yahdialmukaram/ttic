<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>
		<?= $title;?>
	</title>

	<!-- Bootstrap -->
	<link href="<?= base_url();?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?= base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="<?= base_url();?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- Animate.css -->
	<link href="<?= base_url();?>assets/vendors/animate.css/animate.min.css" rel="stylesheet">

	<!-- Custom Theme Style -->
	<link href="<?= base_url();?>assets/build/css/custom.min.css" rel="stylesheet">
</head>


<style>
    .login {
		
        background-image: url('<?=base_url();?>assets/template/images/13.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body class="login">
	<img src="<?=base_url();?>images/img.jpg" id="bg" alt=""
		style="position:fixed; top:0; left:0; min-width:100%; min-height:100%;">
	<div>
		<a class="hiddenanchor" id="signup"></a>
		<a class="hiddenanchor" id="signin"></a>

		<div class="login_wrapper">
			<div class="animate form login_form">
				<section class="login_content">
					<form action="<?= base_url();?>c_login/aksi_login" method='post' enctype="multipart/form-data">
						<h1>Login TTIC </h1>
						<!-- alert simpan data -->
						<?php if ($this->session->flashdata('success')):?>
						<div id="pesan" class="alert alert-success" role="alert">
							<strong><?=$this->session->flashdata('success');
						?></strong>
						</div>
						<?php endif;?>
						<?php if ($this->session->flashdata('error')) :?>
						<div class="alert alert-danger" role="alert">
							<strong><?= $this->session->flashdata('error'); ?>
							</strong>
						</div>
						<?php endif; ?>
						<div>
							<input type="email" name="email" class="form-control" placeholder="Email" required="" />
						</div>
						<div>
							<input type="password" name="password" class="form-control" placeholder="Password" required="" />
						</div>
						<div>
							<a href="<?=base_url('c_user');?>">Halaman Beranda</a>
							<button type="submit" class="btn btn-default submit btn-sm">Login</button>
							<a class="reset_pass" href="#">Lost your password?</a>
						</div>

						<div class="clearfix"></div>

						<div class="separator">
							<!-- <p class="change_link">New to site? -->
							<a href="#signup" class="to_register">Registrasi / Buat Account </a>
							</p>

							<div class="clearfix"></div>
							<br />

							<div>

							</div>
						</div>
					</form>
				</section>
			</div>

			<div id="register" class="animate form registration_form">
				<section class="login_content">
					<form action="<?= base_url();?>c_login/registrasi_user" method="POST" enctype="multipart/form-data">
						<h1>Buat Account</h1>
						<div>
							<input type="text" name="nama" class="form-control" placeholder="Nama" required="" />
						</div>
						<div>
							<input type="text" name="username" class="form-control" placeholder="Username" required="" />
						</div>
						<div>
							<input type="email" name="email" class="form-control" placeholder="Email" required="" />
						</div>
						<div>
							<input type="password" name="password" class="form-control" placeholder="Password" required="" />
						</div>
						<div>
							<button type="submit" class="btn btn-default submit btn-sm">Register</button>
							<!-- <a class="btn btn-default submit" href="index.html">Submit</a> -->
						</div>

						<div class="clearfix"></div>

						<div class="separator">
							<p class="change_link">Already a member ?
								<a href="#signin" class="to_register"> Log in </a>
							</p>

							<div class="clearfix"></div>
							<br />

							<div>

							</div>
						</div>
					</form>
				</section>
			</div>
		</div>
	</div>
</body>

</html>
