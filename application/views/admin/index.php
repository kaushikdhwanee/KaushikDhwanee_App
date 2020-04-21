<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Kaushik Dhwanee</title>



	<!-- Global stylesheets -->

<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">

	<link href="<?=base_url("assets/admin/css/styles.css")?>" rel="stylesheet" type="text/css">

	<link href="<?=base_url("assets/admin/css/bootstrap.css")?>" rel="stylesheet" type="text/css">

	<link href="<?=base_url("assets/admin/css/core.css")?>" rel="stylesheet" type="text/css">

	<link href="<?=base_url("assets/admin/css/components.css")?>" rel="stylesheet" type="text/css">

	<link href="<?=base_url("assets/admin/css/colors.css")?>" rel="stylesheet" type="text/css">

	<link href="<?=base_url("assets/admin/css/font-awesome.min.css")?>" rel="stylesheet" type="text/css">

	<!-- /global stylesheets -->



	<!-- Core JS files -->

		<script type="text/javascript" src="<?=base_url("assets/admin/js/pace.min.js")?>"></script>

	<script type="text/javascript" src="<?=base_url("assets/admin/js/jquery.min.js")?>"></script>

	<script type="text/javascript" src="<?=base_url("assets/admin/js/bootstrap.min.js")?>"></script>

	<script type="text/javascript" src="<?=base_url("assets/admin/js/blockui.min.js")?>"></script>

   <script type="text/javascript" src="<?= base_url('assets/admin/js/jquery.validate.js')?>"></script>

	<!-- /core JS files -->





	<!-- Theme JS files -->

	<script type="text/javascript" src="<?=base_url("assets/admin/js/app.js")?>"></script>

   <script type="text/javascript" src="<?=base_url("assets/admin/js/ripple.min.js")?>"></script>

	<!-- /theme JS files -->



</head>



<body class="login-container">



	<!-- Page container -->

	<div class="page-container">



		<div style="height:50px;"></div>

		<div class="page-content">



			<!-- Main content -->

			<div class="content-wrapper">



				<!-- Simple login form -->

				<form id="login" action="<?= base_url('admin/logincheck') ?>" method="POST">

					<div class="panel panel-body login-form">

						<div class="text-center">

							<div class="icon-object border-slate-300 text-slate-300"><img src="<?=base_url("assets/admin/images/lg1.gif")?>"/></div>

							<h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>

						</div>



						<div class="form-group has-feedback has-feedback-left">

							<input type="text" name="username" class="form-control" placeholder="Username">

							<div class="form-control-feedback">

								<i class="fa fa-user text-muted"></i>

							</div>

						</div>



						<div class="form-group has-feedback has-feedback-left">

							<input type="password" name="password" class="form-control" placeholder="Password">

							<div class="form-control-feedback">

								<i class="fa fa-lock text-muted"></i>

							</div>

						</div>



						<div class="form-group">

							<button type="submit" class="btn btn-primary btn-block">Sign in <i class="fa fa-circle-right position-right"></i></button>

						</div>



						<div class="text-center">

							<!-- <a href="login_password_recover.html">Forgot password?</a> -->

						</div>

					</div>

				</form>

				<!-- /simple login form -->



			</div>

			<!-- /main content -->



		</div>

		<!-- /page content -->



	</div>

	<!-- /page container -->



</body>

</html>
<script type="text/javascript">
  $(document).ready(function(){
    $("#login").validate({
      rules: {
        username: "required",
        password: "required",
      },
    });
  });
</script>

