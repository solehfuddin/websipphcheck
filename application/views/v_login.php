<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?= base_url('assets/login/images/icons/favicon.ico') ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/vendor/bootstrap/css/bootstrap.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/vendor/animate/animate.css') ?>">
	<link type="text/css" href="<?php base_url('assets/login/vendor/sweetalert2/sweetalert.css')?>" rel="stylesheet">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/vendor/css-hamburgers/hamburgers.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/vendor/select2/select2.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/css/util.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/css/main.css') ?>">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?= base_url('assets/login/images/img-01.png') ?>" alt="IMG">
				</div>

				<!-- <form class="login100-form validate-form" action="<?php echo base_url() ?>loginuser"> -->
				<?= form_open('loginuser', ['class' => 'formLogin login100-form validate-form']); ?>
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid username is required: hasan">
						<input class="input100" type="text" name="username" id="username" placeholder="username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required : *****">
						<input class="input100" type="password" name="pass" id="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn btn-login" type="submit">
							Login
						</button>
					</div>
				<!-- </form> -->
				<?= form_close(); ?>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?= base_url('assets/login/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/login/vendor/bootstrap/js/popper.js') ?>"></script>
	<script src="<?= base_url('assets/login/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/login/vendor/select2/select2.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/login/vendor/tilt/tilt.jquery.min.js') ?>"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/login/js/main.js') ?>"></script>
	
	<script>
	 $(document).ready(function() {	
		$(".formLogin").submit(function(e) {
			e.preventDefault();
			
			var username = $("#username").val();
			var password = $("#password").val();
			
			$.ajax({
				type: "post",
				url: $(this).attr('action'),
				data: {
                  "username": username,
                  "password": password
				},
				dataType: "json",
				beforeSend: function() {
					$('.btnLogin').prop('disabled', true);
					$('.btnLogin').html('<i class="fa fa-spin fa-spinner"></i> Processing');
				},
				complete: function() {
					$('.btnLogin').prop('disabled', false);
					$('.btnLogin').html('Login');
				},
				success:function(response){

                if (response.success) {

                  Swal.fire({
                    type: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "<?php echo base_url() ?>dashpanel";
                  });

                }else {
                  Swal.fire({
					  icon: 'error',
					  title: 'Oops...',
					  text: response.error.info,
				  })


                }

                console.log(response);

              },

              error:function(response){

                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'server error!'
                  });

                  console.log(response);

              }

            });
		});
		
		return false;
	});
	</script>
</body>
</html>