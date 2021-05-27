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
            <li class="breadcrumb-item active">Barcode Generator</li>
        </ol>
        <?= $this->session->flashdata('message'); ?>
        <!-- DataTables Example -->
        <div class="col-md-10" style="display: block; margin-left:auto; margin-right:auto">
            <div class="card mb-3 shadow">
                <!-- <div class="card-header" style="background-color:#F9EBEA;"><i class="fas fa-table"></i> Form Edit Admin</div> -->
                <div class="card-header" style="background-color:#eaf8f9; letter-spacing:1px;">
                    <h5> <i class="fab fa-wpforms"></i> Barcode Generated !!</h5>
                </div>
                <div class="card-body">
                    <div class="container">
                        <form action="<?= base_url('kepala/editItem/'); ?><?= $admin['item_id'] ?>" method="POST" enctype="multipart/form-data">

                            <div class="text-center">
                                <?php
                                $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                                echo '<img style="width:350px" src="data:image/png;base64,' . base64_encode($generator->getBarcode($admin['barcode'], $generator::TYPE_CODE_128)) . '">';
                                ?>
                                <p><?= $admin['barcode']; ?></p>
                                <p><strong>Barcode Dapat Anda Scan!!</strong></p>
                            </div>
                            <br>


                    </div>
                </div>
                <div class="text-center">

                    <a href="<?= base_url('kepala/item'); ?>">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </a>
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