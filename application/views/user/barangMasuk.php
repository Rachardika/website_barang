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
                      <?= $this->session->flashdata('message'); ?>
                      <div class="container">
                          <?= form_open_multipart('user/addStockin'); ?>
                          <div class="form-group row">
                              <label for="nama" class="col-sm-2 col-form-label">Tanggal</label>
                              <input type="hidden" name="item_id" id="item_id" value="<?= set_value('item_id'); ?>">
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
                              <div class="col-sm-5 ">
                                  <input type="text" class="form-control" id="barcode" name="barcode" value="<?= set_value('barcode'); ?>" required autofocus>
                              </div>
                              <span class="input-group-btn">
                                  <a class="btn btn-primary " href="" data-toggle="modal" data-target="#modalItem">
                                      <i class="fas fa-search"></i>
                                  </a>
                              </span>
                          </div>
                          <div class="form-group row">
                              <label for="nama" class="col-sm-2 col-form-label">Nama Item</label>
                              <div class="col-sm-10 ">
                                  <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>" readonly>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                              <div class="col-sm-4 ">
                                  <input type="text" class="form-control" id="kategori" name="kategori" value="<?= set_value('kategori'); ?>" readonly>
                              </div>
                              <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                              <div class="col-sm-4 ">
                                  <input type="number" class="form-control" id="stock" name="stock" value="<?= set_value('stock'); ?>" readonly>
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="detail" class="col-sm-2 col-form-label">Detail</label>
                              <div class="col-sm-10 ">
                                  <input type="text" class="form-control" id="detail" name="detail" value="<?= set_value('detail'); ?>" required>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                              <div class="col-sm-10 ">
                                  <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= set_value('jumlah'); ?>" required>
                              </div>
                          </div>


                          <div class="form-group row justify-content-end">
                              <div class="col-sm-10">
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                  <a href="<?= base_url('kepala/stockIn'); ?>">
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


  <div class="modal fade" id="modalItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body table-responsive">
                  <table class="table table-bordered table-striped" id="table1">
                      <thead>
                          <tr class="text-center">
                              <td>Barcode</td>
                              <td>Nama</td>
                              <td>Kategori</td>
                              <td>Stock</td>
                              <td>Aksi</td>
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($item as $a => $data) { ?>
                              <tr class="text-center">
                                  <td><?= $data->barcode ?></td>
                                  <td><?= $data->nama ?></td>
                                  <td><?= $data->kategori ?></td>
                                  <td><?= $data->stock ?></td>
                                  <td><button class="btn btn-primary btn-sm" style="color: white;" name="select" id="select" data-id="<?= $data->item_id; ?>" data-barcode="<?= $data->barcode; ?>" data-nama="<?= $data->nama; ?>" data-kategori="<?= $data->kategori; ?>" data-stock="<?= $data->stock; ?>"><i class="fa fa-check"></i>Pilih</button></td>
                              </tr>
                          <?php } ?>
                      </tbody>
                  </table>

              </div>
              <!-- <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <!-- <a class="btn btn-primary" href="<?= base_url('/auth/logout'); ?>">Logout</a>
              </div> -->
          </div>
      </div>
  </div>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script>
      $(document).ready(function() {
          $(document).on('click', '#select', function() {
              var item_id = $(this).data('item_id');
              var barcode = $(this).data('barcode');
              var nama = $(this).data('nama');
              var kategori = $(this).data('kategori');
              var stock = $(this).data('stock');
              $('#item_id').val(item_id);
              $('#barcode').val(barcode);
              $('#nama').val(nama);
              $('#kategori').val(kategori);
              $('#stock').val(stock);
              $('#modal-item').modal('hide');
          })
      })
  </script>