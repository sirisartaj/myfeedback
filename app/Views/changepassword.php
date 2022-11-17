<!DOCTYPE html>
<html lang="en">
<head>
		
		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="keywords" content="">

		<!-- FAVICON -->
		<link rel="shortcut icon" type="image/x-icon" href="http://vyz.bz/ridingsolo_admin/assets/images/brand/logo-2.png"/>

		<!-- TITLE -->
		<title>Riding Solo </title>

		<!-- BOOTSTRAP CSS -->
		<link id="style" href="http://vyz.bz/ridingsolo_admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

		<!-- STYLE CSS -->
		<link href="http://vyz.bz/ridingsolo_admin/assets/css/style.css" rel="stylesheet" />
		<link href="http://vyz.bz/ridingsolo_admin/assets/css/skin-modes.css" rel="stylesheet" />

		<!--- FONT-ICONS CSS -->
		<link href="http://vyz.bz/ridingsolo_admin/assets/css/icons.css" rel="stylesheet" />

		<link href="http://vyz.bz/ridingsolo_admin/assets/switcher/demo.css" rel="stylesheet" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />	
	</head>

	<body class="ltr app sidebar-mini light-mode">
		<style>
			.btnadd{
				background-color: #13bfa6 !important;
				color: #fff !important;
				display: block;
			    
			    padding: 9px 25px;
			    line-height: 1.573;
			    color: #fff;
			    border-radius: 4px;
			    font-weight: 500;
			}
		</style>
		<!-- GLOBAL-LOADER -->
		<div id="global-loader">
			<img src="http://vyz.bz/ridingsolo_admin/assets/images/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- /GLOBAL-LOADER -->

		<!-- PAGE -->
		<div class="page">
			<div class="page-main">
				<?php echo view('appheader'); ?>
				<?php echo view('appsidebar'); ?>

				
				
				<!--APP-CONTENT OPEN-->
				<div class="app-content main-content mt-0">
					<div class="side-app">
						<!-- CONTAINER -->
						<div class="main-container container-fluid">
							<!-- PAGE-HEADER -->
							<div class="page-header">
								<?php echo $_SESSION['message'];?>
								<div>
									<h1 class="page-title">Change Password
									</h1>

								</div>
								<div class="ms-auto pageheader-btn">


									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="http://vyz.bz/ridingsolo_admin/javascript:void(0);">Home</a></li>
										<li class="breadcrumb-item active" aria-current="page">Change Password</li>
									</ol>
								</div>
							</div>
							<!-- PAGE-HEADER END -->

							<div class="row ">
								<div class="col-md-12">
									<div class="card">
										
										<div class="card-body">

											<form class="g-3 " action="<?php echo base_url(); ?>/changepwd" method="post" id="changepwd">
											<div id="wizard1">

												<h4>Change Password</h4>
												
													<div class="row">
														<div class="col-lg-12 col-md-12">
															<div>		
																<div class="card-body row p-0">
													
													
													
													<div class="col-lg-4">
													  <label for="user_password" class="form-label">User Password</label>
													  <input type="password" class="form-control" id="user_password" name="user_password" placeholder="user password" required value="<?= set_value('user_password');?>">
													</div>
													<div class="col-lg-4">
													  <label for="cpassword" class="form-label">Confirm password</label>
													  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm password" required value="<?= set_value('cpassword');?>">
													  <span class="text-danger">
													  	<?php 
													  		if ($validation->hasError('cpassword')) {
															    echo $validation->getError('cpassword');
															}
													  	?>
													  </span>
													</div>
													
												

													
													
											</div>
										</div>
									</div>
								</div>	
								<div class="col-lg-12 text-rigth" style="margin-top: 30px;float: right;">	
								<button type="submit" name="changepss" class="btn btnadd ">Change Password</button>
								</div>	
											</div>
											
											</form>
										</div>
									</div>
								</div>
							</div>
							<!-- ROW-4 -->
							
						
						
						</div>
							<!-- CONTAINER END -->
					</div>
				</div>
			</div>

		
			<?php echo view('footer_text');?>
			<?php echo view('footer');?>

		<script src="http://vyz.bz/ridingsolo_admin/assets/plugins/bootstrap-maxlength/dist/bootstrap-maxlength.min.js"></script>

	
		
		<!-- Amaze UI Date Picker js-->
		<script src="http://vyz.bz/ridingsolo_admin/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>

		<!-- Simple Date Time Picker js-->
		<script src="http://vyz.bz/ridingsolo_admin/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>

		<!-- SELECT2 JS -->
		<script src="http://vyz.bz/ridingsolo_admin/assets/plugins/select2/select2.full.min.js"></script>

		<script src="http://vyz.bz/ridingsolo_admin/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
		<script src="http://vyz.bz/ridingsolo_admin/assets/plugins/date-picker/jquery-ui.js"></script>
		<script src="http://vyz.bz/ridingsolo_admin/assets/plugins/bootstrap-datepicker/js/datepicker.js"></script>
		<script src="http://vyz.bz/ridingsolo_admin/assets/js/form-validation.js"></script>
		<script src="http://vyz.bz/ridingsolo_admin/assets/js/formelementadvnced.js"></script>

		<!-- FORM WIZARD JS-->
		<!-- <script src="http://vyz.bz/ridingsolo_admin/assets/plugins/formwizard/jquery.smartWizard.js"></script> -->
		<!-- <script src="http://vyz.bz/ridingsolo_admin/assets/plugins/formwizard/fromwizard.js"></script> -->

		<!-- INTERNAl JQUERY.STEPS JS -->
		<script src="http://vyz.bz/ridingsolo_admin/assets/plugins/jquery-steps/jquery.steps.min.js"></script>
		<script src="http://vyz.bz/ridingsolo_admin/assets/plugins/parsleyjs/parsley.min.js"></script>

		<script src="http://vyz.bz/ridingsolo_admin/assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js"></script>
		<script src="http://vyz.bz/ridingsolo_admin/assets/js/form-wizard.js"></script>

<script>
	$('#wizard1').find('a[href="#finish"]').remove();
	$('#wizard1').find('a[href="#previous"]').remove();
   //append a submit type button
   

</script>

<?php echo view('popupmodel');?>


	</body>
</html>