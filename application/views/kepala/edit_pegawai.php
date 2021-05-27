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
          <a href="<?= base_url("kepala/") ?>admin">Data Guru</a>
        </li>
        <li class="breadcrumb-item active">Edit Guru</li>
      </ol>
      <?= $this->session->flashdata('message'); ?>
      <!-- DataTables Example -->
      <div class="col-md-10" style="display: block; margin-left:auto; margin-right:auto">
        <div class="card mb-3 shadow">
          <!-- <div class="card-header" style="background-color:#F9EBEA;"><i class="fas fa-table"></i> Form Edit Admin</div> -->
          <div class="card-header" style="background-color:#eaf8f9; letter-spacing:1px;">
            <h5> <i class="fab fa-wpforms"></i> Form Edit Guru</h5>
          </div>
          <div class="card-body">
            <div class="container">
              <form action="<?= base_url('kepala/editAdmin/'); ?><?= $admin['id_user'] ?>" method="POST" enctype="multipart/form-data">
            </div>
            <div class="form-group row">
              <label for="nip" class="col-sm-2 col-form-label">NIP/NBM/NIY</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nip" name="nip" value="<?= $admin['nip']; ?>" readonly>
                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="nama" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $admin['nama']; ?>">
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>

            <div class="form-group row">
              <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $admin['tempat_lahir']; ?>">
                <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>

            <div class="form-group row">
              <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $admin['tgl_lahir']; ?>">
                <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>

            <div class="form-group row">
              <label for="pangkat" class="col-sm-2 col-form-label">Pangkat/Jabatan/Golongan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="pangkat" name="pangkat" value="<?= $admin['pangkat']; ?>">
                <?= form_error('pangkat', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>

            <div class="form-group row">
              <label for="jenkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="jenkel" name="jenkel" value="<?= $admin['jenkel']; ?>" readonly>
                <?= form_error('tmt', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="username" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input type="username" class="form-control" id="username" name="username" value="<?= $admin['username']; ?>">
                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-2 col-form-label text-bold">Gambar</div>
              <div class="col-sm-10">
                <div class="custom-file">
                  <input type="file" class="file_upload" id="Image" name="image">
                  <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
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
  <!-- /.container-fluid -->


  <!-- /.content-wrapper -->