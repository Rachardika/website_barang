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
                      <h5> <i class="fab fa-wpforms"></i> Detail Barang </h5>
                  </div>
                  <div class="card-body">
                      <div class="container">
                          <form action="<?= base_url('kepala/editStockin/'); ?><?= $stock['stockin_id'] ?>" method="POST" enctype="multipart/form-data">
                              <?= $this->session->flashdata('message'); ?>
                              <div class="container">
                                  <br>

                                  <?= form_open_multipart('kepala/editStockin'); ?>
                                  <div class="text-center">
                                      <?php
                                        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                                        echo '<img style="width:150px" src="data:image/png;base64,' . base64_encode($generator->getBarcode($stock['barcode'], $generator::TYPE_CODE_128)) . '">';
                                        ?>
                                  </div>
                                  <hr>
                                  <br>
                                  <div class="form-group row justify-content-center">
                                      <label for="nama" class="col-sm-2 col-form-label"><strong>Nama Item </strong></label>
                                      <div class="col-sm-4 ">
                                          <label for="nama" class="col-form-label">: <?= $stock['nama'];; ?></label>
                                      </div>
                                  </div>
                                  <div class="form-group row justify-content-center">
                                      <label for="nama" class="col-sm-2 col-form-label"><strong>Kategori </strong></label>
                                      <div class="col-sm-4 ">
                                          <label for="nama" class="col-form-label">: <?= $stock['kategori'];; ?></label>
                                      </div>
                                  </div>
                                  <div class="form-group row justify-content-center">
                                      <label for="nama" class="col-sm-2 col-form-label"><strong>Stock </strong></label>
                                      <div class="col-sm-4 ">
                                          <label for="nama" class="col-form-label">: <?= $stock['stock'];; ?></label>
                                      </div>
                                  </div>
                                  <div class="form-group row justify-content-center">
                                      <label for="nama" class="col-sm-2 col-form-label"><strong>Detail </strong></label>
                                      <div class="col-sm-4 ">
                                          <label for="nama" class="col-form-label">: <?= $stock['detail'];; ?></label>
                                      </div>
                                  </div>
                                  <div class="form-group row justify-content-center">
                                      <label for="nama" class="col-sm-2 col-form-label"><strong>Jumlah </strong></label>
                                      <div class="col-sm-4 ">
                                          <label for="nama" class="col-form-label">: <?= $stock['jumlah'];; ?></label>
                                      </div>
                                  </div>
                                  <div class="form-group row justify-content-center">
                                      <label for="nama" class="col-sm-2 col-form-label"><strong>Tanggal Masuk </strong></label>
                                      <div class="col-sm-4 ">
                                          <label for="nama" class="col-form-label">: <?= $stock['tanggal']; ?>, <?= $stock['jam']; ?></label>
                                      </div>
                                  </div>
                                  <div class="form-group row justify-content-center">
                                      <label for="nama" class="col-sm-2 col-form-label"><strong>Diinput Oleh </strong></label>
                                      <div class="col-sm-4 ">
                                          <label for="nama" class="col-form-label">: <?= $stock['username'];; ?></label>
                                      </div>
                                  </div>
                                  <hr>

                                  <br>
                                  <div class="form-group row justify-content-end">
                                      <div class="col-sm-0">
                                          <a href="<?= base_url('kepala/stockIn'); ?>">
                                              <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                                          </a>
                                      </div>
                                  </div>
                              </div>

                      </div>
                  </div>
              </div>
          </div>
      </div>