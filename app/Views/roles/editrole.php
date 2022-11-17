<?php echo view('header'); ?>
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
									<h1 class="page-title">Edit Role
									</h1>

								</div>
								<div class="ms-auto pageheader-btn">


									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="http://vyz.bz/ridingsolo_admin/javascript:void(0);">Roles</a></li>
										<li class="breadcrumb-item active" aria-current="page">Edit Role</li>
									</ol>
								</div>
							</div>
							<!-- PAGE-HEADER END -->

							<div class="row ">
								<div class="col-md-12">
									<div class="card">
										
										<div class="card-body">

											<form class="g-3 " action="<?php echo base_url(); ?>/editrolestore" method="post" id="editrole">
											<div id="wizard1">

												
												
													<div class="row">
														<div class="col-lg-12 col-md-12">
															<div>		
																<div class="card-body row p-0">
													<div class="col-lg-4">
													  <label for="role_name" class="form-label">Name</label>
													  <input type="hidden" name="role_id" value="<?php echo $Role['role_id'];?>" >
													  <input type="text" class="form-control" id="role_name" name="role_name" placeholder="Name" required value="<?php echo ($Role['role_name'])?$Role['role_name']: set_value('role_name');?>">
													  <span class="text-danger">
													  	<?php 
													  		if ($validation->hasError('role_name')) {
															    echo $validation->getError('role_name');
															}
													  	?>
													  </span>
													</div>
													<div class="col-lg-4">
													  <div class="form-group">
														<label class="form-label">status</label>
														<select class="form-control select2-show-search"  name="status">
															
															<option value="0" <?php echo ($Role['status']==0)?'selected':'';?>>Active</option>
															<option value="1" <?php echo ($Role['status']==1)?'selected':'';?>>Inactive</option>
															<option value="2" <?php echo ($Role['status']==2)?'selected':'';?>>Delete</option>
															
														</select>
													</div>
													</div>

											</div>
										</div>
									</div>
								</div>	
								<div class="col-lg-12 text-rigth" style="margin-top: 30px;float: right;">	
								<button type="submit" name="add" class="btn btnadd ">ADD</button>
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