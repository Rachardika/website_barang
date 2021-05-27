<?php date_default_timezone_set("Asia/Jakarta"); ?>

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
                <a href="<?= base_url("kepala/") ?>admin">Data Item</a>
            </li>
            <li class="breadcrumb-item active">Edit Item</li>
        </ol>
        <?= $this->session->flashdata('message'); ?>
        <!-- DataTables Example -->
        <div class="col-md-10" style="display: block; margin-left:auto; margin-right:auto">
            <div class="card mb-3 shadow">
                <!-- <div class="card-header" style="background-color:#F9EBEA;"><i class="fas fa-table"></i> Form Edit Admin</div> -->
                <div class="card-header" style="background-color:#eaf8f9; letter-spacing:1px;">
                    <h5> <i class="fab fa-wpforms"></i> Form Edit Item</h5>
                </div>
                <div class="card-body">
                    <div class="container">
                        <form action="<?= base_url('kepala/editItem/'); ?><?= $admin['item_id'] ?>" method="POST" enctype="multipart/form-data">

                            <div class="form-group row">
                                <input type="hidden" name="tanggal" id="tanggal" value="<?php echo date('d-M-Y'); ?>">
                                <input type="hidden" name="jam" id="jam" value="<?php echo date('H:i:s'); ?>">
                                <label for="barcode" class="col-sm-2 col-form-label">Barcode : </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="barcode" name="barcode" value="<?= $admin['barcode']; ?>" readonly>
                                    <?= form_error('tmt', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama Item : </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $admin['nama']; ?>">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kategori" class="col-sm-2 col-form-label">Kategori : </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $admin['kategori']; ?>" readonly>
                                    <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lokasi" class="col-sm-2 col-form-label">Lokasi : </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $admin['lokasi']; ?>" readonly>
                                    <?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="stock" class="col-sm-2 col-form-label">Stock : </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="stock" name="stock" value="<?= $admin['stock']; ?>">
                                    <?= form_error('stock', '<small class="text-danger pl-3">', '</small>'); ?>
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
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->


<!-- /.content-wrapper -->