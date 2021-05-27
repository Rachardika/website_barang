  <!-- Content Wrapper. Contains page content -->
  <?php date_default_timezone_set("Asia/Jakarta"); ?>

  <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <div class=" container-fluid" style="padding-top: 0px">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb shadow" style="background-color:#fff;">
              <li class="breadcrumb-item">
                  <a href="<?= base_url("kepala/") ?>index">Dashboard</a>
              </li>
              <li class="breadcrumb-item">
                  <a href="<?= base_url("kepala/") ?>kategori">Data Kategori</a>
              </li>
              <li class="breadcrumb-item active">Tambah Kategori</li>
          </ol>

          <!-- DataTables Example -->
          <div class="col-md-10" style="display: block; margin-left:auto; margin-right:auto">
              <div class="card mb-3 shadow">
                  <!-- <div class="card-header" style="background-color:#F9EBEA;"><i class="fas fa-table"></i> Form Tambah Member</div> -->
                  <div class="card-header" style="background-color:#eaf8f9; letter-spacing:1px;">
                      <h5> <i class="fab fa-wpforms"></i> Form Tambah Data Kategori</h5>
                  </div>
                  <div class="card-body">
                      <?= $this->session->flashdata('message'); ?>
                      <div class="container">
                          <?= form_open_multipart('kepala/addKategori'); ?>
                          <input type="hidden" name="tanggal" id="tanggal" value="<?php echo date('d-M-Y'); ?>">
                          <input type="hidden" name="jam" id="jam" value="<?php echo date('H:i:s'); ?>">
                          <input type="hidden" name="kategori_id" value="<?= set_value('kategori_id'); ?>">
                          <div class="form-group row">
                              <label for="nama" class="col-sm-2 col-form-label">Nama Kategori</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>" required>
                                  <?= form_error('nama', '<small class="text-danger" >', '</small>'); ?>
                              </div>
                          </div>

                          <div class="form-group row justify-content-end">
                              <div class="col-sm-10">
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                  <a href="<?= base_url('kepala/kategori'); ?>">
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