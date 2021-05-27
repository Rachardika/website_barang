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
                  <a href="<?= base_url("kepala/") ?>admin">Data Item</a>
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
                      <?= $this->session->flashdata('message'); ?>
                      <div class="container">
                          <?= form_open_multipart('kepala/addItem'); ?>
                          <div class="form-group row">
                              <label for="nama" class="col-sm-2 col-form-label">Kode</label>
                              <input type="hidden" name="tanggal" id="tanggal" value="<?php echo date('d-M-Y'); ?>">
                              <input type="hidden" name="jam" id="jam" value="<?php echo date('H:i:s'); ?>">
                              <input type="hidden" name="item_id" value="<?= set_value('item_id'); ?>">
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" id="barcode" name="barcode" value="<?= set_value('barcode'); ?>" required>
                                  <?= form_error('nama', '<small class="text-danger" >', '</small>'); ?>
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>" required>
                                  <?= form_error('nama', '<small class="text-danger" >', '</small>'); ?>
                              </div>
                          </div>


                          <div class="form-group row">
                              <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                              <div class="col-sm-10">
                                  <select name="kategori" class="form-control">
                                      <option value="">silahkan pilih...</option>
                                      <?php foreach ($kategori as $k) : { ?>
                                              <option value="<?php echo $k->nama; ?>"><?php echo $k->nama; ?></option>
                                          <?php } ?>
                                      <?php endforeach; ?>
                                  </select>
                                  <?= form_error('nama', '<small class="text-danger" >', '</small>'); ?>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= set_value('lokasi'); ?>" required>
                                  <?= form_error('lokasi', '<small class="text-danger" >', '</small>'); ?>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                              <div class="col-sm-10">
                                  <input type="number" class="form-control" id="stock" name="stock" value="<?= set_value('stock'); ?>" required>
                                  <?= form_error('stock', '<small class="text-danger" >', '</small>'); ?>
                              </div>
                          </div>

                          <div class="form-group row justify-content-end">
                              <div class="col-sm-10">
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                  <a href="<?= base_url('kepala/item'); ?>">
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