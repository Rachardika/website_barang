  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->

  	<div class="container-fluid" style="padding-top: 0px">
  		<!-- Breadcrumbs-->
  		<ol class="breadcrumb shadow" style="background-color:#fff;">
  			<li class="breadcrumb-item">
  				<a href="<?= base_url("kepala/") ?>index">Dashboard</a>
  			</li>

  			<li class="breadcrumb-item active">Ubah Password</li>
  		</ol>
  		<br>
  		<div class="col-md-6" style="display: block; margin-left:auto; margin-right:auto">
  			<div class="card mb-3 shadow">
  				<!-- <div class="card-header" style="background-color:#F9EBEA;"><i class="fas fa-table"></i> Ubah Password</div> -->
  				<div class="card-header" style="background-color:#eaf8f9; letter-spacing:1px;">
  					<h5> <i class="fab fa-wpforms"></i> Form Ubah Password</h5>
  				</div>
  				<div class="card-body">
  					<?= $this->session->flashdata('message'); ?>
  					<div class="flash-password" data-flashdata="<?= $this->session->flashdata('password'); ?>"></div>
  					<div class="container">
  						<div class="row">
  							<div class="col-lg-12">
  								<form action="<?= base_url('kepala/ubah_password'); ?>" method="post">
  									<div class="form-group">
  										<label for="current_password">Password lama</label>
  										<input type="password" class="form-control" id="current_password" name="current_password" value="<?= set_value('current_password'); ?>">
  										<span toggle="#current_password" class="mr-1 fa fa-fw  field-icon toggle-password"></span>
  										<?= form_error('current_password', '<small class="text-danger" >', '</small>'); ?>
  									</div>
  									<div class="form-group">
  										<label for="new_password1">Password Baru</label>
  										<input type="password" class="form-control" id="new_password1" name="new_password1" value="<?= set_value('new_password1'); ?>">
  										<span toggle="#new_password1" class="mr-1 fa fa-fw  field-icon toggle-password"></span>
  										<?= form_error('new_password1', '<small class="text-danger" >', '</small>'); ?>
  									</div>
  									<div class="form-group">
  										<label for="new_password2">Konfirmasi Password</label>
  										<input type="password" class="form-control" id="new_password2" name="new_password2" value="<?= set_value('new_password2'); ?>">
  										<span toggle="#new_password2" class="mr-1 fa fa-fw  field-icon toggle-password"></span>
  										<?= form_error('new_password2', '<small class="text-danger" >', '</small>'); ?>
  									</div>
  									<div class="form-group">
  										<button type="submit" class="btn btn-primary">Ubah Password</button>
  									</div>
  								</form>
  							</div>
  						</div>
  					</div>
  				</div>

  			</div>
  		</div>
  		<br>
  	</div>
  	<!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->
  <script>
  	$(".toggle-password").click(function() {

  		$(this).toggleClass("fa-eye fa-eye-slash");
  		var input = $($(this).attr("toggle"));
  		if (input.attr("type") == "password") {
  			input.attr("type", "text");
  		} else {
  			input.attr("type", "password");
  		}
  	});
  </script>