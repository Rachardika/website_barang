  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->

  	<div class=" container-fluid" style="padding-top: 0px">
  		<!-- Breadcrumbs-->
  		<ol class="breadcrumb shadow" style="background-color:#fff;">
  			<li class="breadcrumb-item">
  				<a href="<?= base_url("kepala/") ?>index">Dashboard</a>
  			</li>
  			<li class="breadcrumb-item">
  				<a href="<?= base_url("kepala/") ?>admin">Data Pegawai</a>
  			</li>
  			<li class="breadcrumb-item active">Tambah Pegawai</li>
  		</ol>

  		<!-- DataTables Example -->
  		<div class="col-md-10" style="display: block; margin-left:auto; margin-right:auto">
  			<div class="card mb-3 shadow">
  				<!-- <div class="card-header" style="background-color:#F9EBEA;"><i class="fas fa-table"></i> Form Tambah Member</div> -->
  				<div class="card-header" style="background-color:#eaf8f9; letter-spacing:1px;">
  					<h5> <i class="fab fa-wpforms"></i> Form Tambah Pegawai</h5>
  				</div>
  				<div class="card-body">
  					<?= $this->session->flashdata('message'); ?>
  					<div class="container">
  						<?= form_open_multipart('kepala/addAdmin'); ?>
  						<div class="form-group row">
  							<label for="nama" class="col-sm-2 col-form-label">Nama</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>" required>
  								<?= form_error('nama', '<small class="text-danger" >', '</small>'); ?>
  							</div>
  						</div>
  						<div class="form-group row">
  							<label for="nip" class="col-sm-2 col-form-label">NIP</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="nip" name="nip" value="<?= set_value('nip'); ?>" required>
  								<?= form_error('nip', '<small class="text-danger" >', '</small>'); ?>
  							</div>
  						</div>

  						<div class="form-group row">
  							<label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= set_value('tempat_lahir'); ?>" required>
  								<?= form_error('tempat_lahir', '<small class="text-danger" >', '</small>'); ?>
  							</div>
  						</div>

  						<div class="form-group row">
  							<label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
  							<div class="col-sm-10">
  								<input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>" required>
  								<?= form_error('tgl_lahir', '<small class="text-danger" >', '</small>'); ?>
  							</div>
  						</div>

  						<div class="form-group row">
  							<label for="pangkat" class="col-sm-2 col-form-label">Akses</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="pangkat" name="pangkat" value="<?= set_value('pangkat'); ?>" required>
  								<?= form_error('pangkat', '<small class="text-danger" >', '</small>'); ?>
  							</div>
  						</div>

  						<div class="form-group row">
  							<label for="jenkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
  							<div class="col-sm-10">
  								<input type="radio" name="jenkel" value="Laki laki">Laki Laki
  								<input type="radio" name="jenkel" value="Perempuan">Perempuan
  							</div>
  						</div>

  						<div class="form-group row">
  							<label for="username" class="col-sm-2 col-form-label">Username</label>
  							<div class="col-sm-10">
  								<input type="username" class="form-control" id="username" name="username" value="<?= set_value('username'); ?>" required>
  								<?= form_error('username', '<small class="text-danger" >', '</small>'); ?>
  							</div>
  						</div>
  						<div class="form-group row">
  							<label for="password" class="col-sm-2 col-form-label">Password</label>
  							<div class="col-sm-10">
  								<input type="password" class="form-control" id="password" name="password" value="<?= set_value('password'); ?>" required>
  								<?= form_error('password', '<small class="text-danger" >', '</small>'); ?>
  							</div>
  						</div>


  						<div class="form-group row justify-content-end">
  							<div class="col-sm-10">
  								<button type="submit" class="btn btn-primary">Simpan</button>
  								<a href="<?= base_url('kepala/admin'); ?>">
  									<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
  								</a>
  							</div>
  						</div>

  						</form>
  						<br>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>