<!--   <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <div class=" container-fluid" style="padding-top: 0px">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb shadow" style="background-color:#fff;">
      <li class="breadcrumb-item">
        <a href="<?= base_url("user/") ?>index">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="<?= base_url("user/") ?>profil">Profil</a>
      </li>
      <li class="breadcrumb-item active">Edit profil</li>
    </ol>

    <!-- DataTables Example -->
    <div class="col-lg-10" style="display: block; margin-left:auto; margin-right:auto">
      <div class="card mb-3 shadow">
        <!-- <div class="card-header" style="background-color:#F9EBEA;"><i class="fas fa-table"></i> Form Edit Profil</div> -->
        <div class="card-header" style="background-color:#eaf8f9; letter-spacing:1px;">
          <h5> <i class="fab fa-wpforms"></i> Form Edit Profil</h5>
        </div>
        <div class="card-body">
          <div class="container">
            <div class="row">
              <div class="col-lg-12" style="display: block; margin-left:auto; margin-right:auto">
                <?= form_open_multipart('user/editProfil'); ?>
                <div class="form-group row">
                  <label for="no_identitas" class="col-sm-2 col-form-label">NIP</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_identitas" name="no_identitas" value="<?= $user['nip']; ?>">
                    <?= form_error('no_identitas', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $user['tempat_lahir']; ?>">
                    <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $user['tgl_lahir']; ?>">
                    <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="pangkat" class="col-sm-2 col-form-label">Akses</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="pangkat" name="pangkat" value="<?= $user['pangkat']; ?>">
                    <?= form_error('pangkat', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>


                <div class="form-group row">
                  <label for="jenkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="jenkel" name="jenkel" value="<?= $user['jenkel']; ?>">
                    <?= form_error('tmt', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>


                <div class="form-group row">
                  <label for="username" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="username" class="form-control" id="username" name="username" value="<?= $user['username']; ?>">
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-2 col-form-label text-bold">Foto Profil</div>
                  <div class="col-sm-8">
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="custom-file">
                          <input type="file" class="file_upload" id="Image" name="image">
                          <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('user/profil'); ?>">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </a>
                  </div>
                </div>
                </form>
              </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
    </div>
  </div>


</div>
<!-- /.content-wrapper -->