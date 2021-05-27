<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
        <div class=" container-fluid" style="padding-top: 0px">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb shadow" style="background-color:#fff;">
                <li class="breadcrumb-item">
                    <a href="<?= base_url("kepala/") ?>index">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Barang Masuk</li>
            </ol>
            <!-- DataTables Example -->
            <div class="card mb-3 shadow">
                <div class="card-header" style="letter-spacing:1px;">
                    <h3><i class="fas fa-table"></i> Tabel Barang Masuk
                        <a href="<?= base_url('kepala/addStockin'); ?>" class="btn btn-primary btn-md float-right"><i class="fas fa-plus"></i> Tambah Data</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="flash-admin" data-flashdata="<?= $this->session->flashdata('admin'); ?>"></div>


                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="tabel_stockin" width="100%" cellspacing="0">
                            <!-- edited table-->
                            <thead style="background-color:#eaf8f9;">
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('/auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->

<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url('assets/') ?>admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/') ?>admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
    $(document).ready(function() {
        $('#tabel_stockin').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= base_url('kepala/get_ajax_stockin') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "targets": [3],
                "orderable": false
            }],
            "order": []

        })
    });
</script>


</body>

</html>