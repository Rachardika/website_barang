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
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.muncul').click(function() {
            var id = $(this).attr('relid');
            console.log(id);
            $.ajax({
                url: '<?= base_url('user/tampil_nilai'); ?>',
                data: {
                    id: id
                },
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#kompetensi1').html(response.k1);
                    $('#kompetensi2').html(response.k2);
                    $('#kompetensi3').html(response.k3);
                    $('#kompetensi4').html(response.k4);
                    $('#kompetensi5').html(response.k5);
                    $('#kompetensi6').html(response.k6);
                    $('#kompetensi7').html(response.k7);
                    $('#kompetensi8').html(response.k8);
                    $('#kompetensi9').html(response.k9);
                    $('#kompetensi10').html(response.k10);
                    $('#kompetensi11').html(response.k11);
                    $('#kompetensi12').html(response.k12);
                    $('#kompetensi13').html(response.k13);
                    $('#kompetensi14').html(response.k14);
                    $('#kompetensi15').html(response.k15);
                    $('#jumlah_nilai').html(response.jumlah);
                    $('#pkg').html(response.pkg);
                    $('#nilaisemua').attr('hidden', false);
                }
            });
        });
        $('.muncul1').click(function() {
            var id = $(this).attr('relid1');
            console.log(id);
            $.ajax({
                url: '<?= base_url('user/tampil_nilai1'); ?>', //tinggal ganti controller
                data: {
                    id: id
                },
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#kompetensix').html(response.k16); //ganti nggo nilai aisiyah
                    $('#kompetensiy').html(response.k17);
                    $('#kompetensiz').html(response.k18);
                    $('#kompetensit').html(response.k19);
                    $('#jumlah_nilai1').html(response.jumlah);
                    $('#pkg1').html(response.aisyiah);
                    $('#nilaisemua1').attr('hidden', false);
                }
            });

        });
        $('.tutup').click(function() {
            $('html,body').animate({
                scrollTop: 0
            }, 'slow');

            window.addEventListener("scroll", function() {
                if (window.scrollY == 0) {
                    $('#nilaisemua').attr('hidden', true);
                } else {
                    $('#nilaisemua').attr('hidden', false);
                }
            });
        });
        $('.tutup1').click(function() {
            $('html,body').animate({
                scrollTop: 0
            }, 'slow');

            window.addEventListener("scroll", function() {
                if (window.scrollY == 0) {
                    $('#nilaisemua1').attr('hidden', true);
                } else {
                    $('#nilaisemua1').attr('hidden', false);
                }
            });
        });

    });
</script>



</body>

</html>