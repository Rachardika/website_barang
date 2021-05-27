  <!-- Content Wrapper. Contains page content -->
  <?php date_default_timezone_set("Asia/Jakarta"); ?>
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <div class=" container-fluid" style="padding-top: 0px">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb shadow" style="background-color:#fff;">
              <li class="breadcrumb-item">
                  <a href="<?= base_url("user/") ?>index">Dashboard</a>
              </li>
              <li class="breadcrumb-item">
                  <a href="<?= base_url("user/") ?>admin">Data Item</a>
              </li>
              <li class="breadcrumb-item active">Tambah Item</li>
          </ol>

          <!-- DataTables Example -->
          <div class="col-md-10" style="display: block; margin-left:auto; margin-right:auto">
              <div class="card mb-3 shadow">
                  <!-- <div class="card-header" style="background-color:#F9EBEA;"><i class="fas fa-table"></i> Form Tambah Member</div> -->
                  <div class="card-header" style="background-color:#eaf8f9; letter-spacing:1px;">
                      <h5> <i class="fab fa-wpforms"></i> Form Tambah Data item</h5>
                  </div>
                  <div class="card-body">
                      <div class="container">
                          <form action="<?= base_url('user/editStockin/'); ?><?= $stock['stockin_id'] ?>" method="POST" enctype="multipart/form-data">
                              <?= $this->session->flashdata('message'); ?>
                              <div class="container">
                                  <?= form_open_multipart('user/editStockin'); ?>
                                  <div class="form-group row">
                                      <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                      <input type="hidden" name="username" id="username" value="<?= $user['username'] ?>">
                                      <div class="col-sm-5">
                                          <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?php echo date('d-M-Y'); ?>" readonly>
                                          <?= form_error('nama', '<small class="text-danger" >', '</small>'); ?>
                                      </div>
                                      <div class="col-sm-5">
                                          <input type="text" class="form-control" id="jam" name="jam" value="<?php echo date('H:i:s'); ?>" readonly>
                                          <?= form_error('nama', '<small class="text-danger" >', '</small>'); ?>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <label for="barcode" class="col-sm-2 col-form-label">Barcode</label>
                                      <div class="col-sm-10 ">
                                          <input type="text" class="form-control" id="barcode" name="barcode" value="<?= $stock['barcode']; ?>" readonly>
                                      </div>

                                  </div>
                                  <div class="form-group row">
                                      <label for="nama" class="col-sm-2 col-form-label">Nama Item</label>
                                      <div class="col-sm-10 ">
                                          <input type="text" class="form-control" id="nama" name="nama" value="<?= $stock['nama']; ?>" readonly>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                                      <div class="col-sm-4 ">
                                          <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $stock['kategori']; ?>" readonly>
                                      </div>
                                      <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                                      <div class="col-sm-4 ">
                                          <input type="number" class="form-control" id="stock" name="stock" value="<?= $stock['stock']; ?>" readonly>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <label for="detail" class="col-sm-2 col-form-label">Detail</label>
                                      <div class="col-sm-10 ">
                                          <input type="text" class="form-control" id="detail" name="detail" value="<?= $stock['detail']; ?>" required>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                                      <div class="col-sm-10 ">
                                          <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $stock['jumlah']; ?>" required>
                                      </div>
                                  </div>


                                  <div class="form-group row justify-content-end">
                                      <div class="col-sm-10">
                                          <button type="submit" class="btn btn-primary">Simpan</button>
                                          <a href="<?= base_url('user/stockIn'); ?>">
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