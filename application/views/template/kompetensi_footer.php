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
<script src="<?= base_url('assets/') ?>admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/') ?>admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
    $(document).ready(function() {
        $('#tabel_member').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= base_url('kepala/get_ajax_guru') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "targets": [0, 1, 2, 3],
                "orderable": false
            }],
            "order": []

        })
    });
</script>
<script>
    function activated() {
        var form = document.getElementById('user').getElementsByClassName('edit');
        for (i = 0; i < form.length; i++) {
            form[i].disabled = false;
        }

        var button = document.getElementsByClassName('confirm');
        for (i = 0; i < button.length; i++) {
            button[i].style.visibility = 'visible';
        }

        var edit = document.getElementsByClassName('editing');
        for (i = 0; i < edit.length; i++) {
            edit[i].style.visibility = 'hidden';
        }
    }

    function cancel() {
        location.reload();
    }

    $(document).click(function() {
        $(".1nilai0").click(function() {
            $("#1nilai0").attr("checked", true);
            // console.log(document.getElementById('nilai0'));
        });
        $(".1nilai1").click(function() {
            $("#1nilai1").attr("checked", true);
            // console.log(document.getElementById('nilai1'));
        });
        $(".1nilai2").click(function() {
            $("#1nilai2").attr("checked", true);
            //console.log(document.getElementById('nilai2'));
        });
        $(".2nilai0").click(function() {
            $("#2nilai0").attr("checked", true);
            // console.log(document.getElementById('nilai0'));
        });
        $(".2nilai1").click(function() {
            $("#2nilai1").attr("checked", true);
            // console.log(document.getElementById('nilai1'));
        });
        $(".2nilai2").click(function() {
            $("#2nilai2").attr("checked", true);
            //console.log(document.getElementById('nilai2'));
        });
        $(".3nilai0").click(function() {
            $("#3nilai0").attr("checked", true);
            // console.log(document.getElementById('nilai0'));
        });
        $(".3nilai1").click(function() {
            $("#3nilai1").attr("checked", true);
            // console.log(document.getElementById('nilai1'));
        });
        $(".3nilai2").click(function() {
            $("#3nilai2").attr("checked", true);
            //console.log(document.getElementById('nilai2'));
        });
        $(".4nilai0").click(function() {
            $("#4nilai0").attr("checked", true);
            // console.log(document.getElementById('nilai0'));
        });
        $(".4nilai1").click(function() {
            $("#4nilai1").attr("checked", true);
            // console.log(document.getElementById('nilai1'));
        });
        $(".4nilai2").click(function() {
            $("#4nilai2").attr("checked", true);
            //console.log(document.getElementById('nilai2'));
        });
        $(".5nilai0").click(function() {
            $("#5nilai0").attr("checked", true);
            // console.log(document.getElementById('nilai0'));
        });
        $(".5nilai1").click(function() {
            $("#5nilai1").attr("checked", true);
            // console.log(document.getElementById('nilai1'));
        });
        $(".5nilai2").click(function() {
            $("#5nilai2").attr("checked", true);
            //console.log(document.getElementById('nilai2'));
        });
        $(".6nilai0").click(function() {
            $("#6nilai0").attr("checked", true);
            // console.log(document.getElementById('nilai0'));
        });
        $(".6nilai1").click(function() {
            $("#6nilai1").attr("checked", true);
            // console.log(document.getElementById('nilai1'));
        });
        $(".6nilai2").click(function() {
            $("#6nilai2").attr("checked", true);
            //console.log(document.getElementById('nilai2'));
        });
        $(".7nilai0").click(function() {
            $("#7nilai0").attr("checked", true);
            // console.log(document.getElementById('nilai0'));
        });
        $(".7nilai1").click(function() {
            $("#7nilai1").attr("checked", true);
            // console.log(document.getElementById('nilai1'));
        });
        $(".7nilai2").click(function() {
            $("#7nilai2").attr("checked", true);
            //console.log(document.getElementById('nilai2'));
        });
        $(".8nilai0").click(function() {
            $("#8nilai0").attr("checked", true);
            // console.log(document.getElementById('nilai0'));
        });
        $(".8nilai1").click(function() {
            $("#8nilai1").attr("checked", true);
            // console.log(document.getElementById('nilai1'));
        });
        $(".8nilai2").click(function() {
            $("#8nilai2").attr("checked", true);
            //console.log(document.getElementById('nilai2'));
        });
        $(".9nilai0").click(function() {
            $("#9nilai0").attr("checked", true);
            // console.log(document.getElementById('nilai0'));
        });
        $(".9nilai1").click(function() {
            $("#9nilai1").attr("checked", true);
            // console.log(document.getElementById('nilai1'));
        });
        $(".9nilai2").click(function() {
            $("#9nilai2").attr("checked", true);
            //console.log(document.getElementById('nilai2'));
        });
        $(".10nilai0").click(function() {
            $("#10nilai0").attr("checked", true);
            // console.log(document.getElementById('nilai0'));
        });
        $(".10nilai1").click(function() {
            $("#10nilai1").attr("checked", true);
            // console.log(document.getElementById('nilai1'));
        });
        $(".10nilai2").click(function() {
            $("#10nilai2").attr("checked", true);
            //console.log(document.getElementById('nilai2'));
        });
        $(".11nilai0").click(function() {
            $("#11nilai0").attr("checked", true);
            // console.log(document.getElementById('nilai0'));
        });
        $(".11nilai1").click(function() {
            $("#11nilai1").attr("checked", true);
            // console.log(document.getElementById('nilai1'));
        });
        $(".11nilai2").click(function() {
            $("#11nilai2").attr("checked", true);
            //console.log(document.getElementById('nilai2'));
        });
        $(".12nilai0").click(function() {
            $("#12nilai0").attr("checked", true);
            // console.log(document.getElementById('nilai0'));
        });
        $(".12nilai1").click(function() {
            $("#12nilai1").attr("checked", true);
            // console.log(document.getElementById('nilai1'));
        });
        $(".12nilai2").click(function() {
            $("12nilai2").attr("checked", true);
            //console.log(document.getElementById('nilai2'));
        });
        $(".13nilai0").click(function() {
            $("#13nilai0").attr("checked", true);
            // console.log(document.getElementById('nilai0'));
        });
        $(".13nilai1").click(function() {
            $("#13nilai1").attr("checked", true);
            // console.log(document.getElementById('nilai1'));
        });
        $(".13nilai2").click(function() {
            $("#13nilai2").attr("checked", true);
            //console.log(document.getElementById('nilai2'));
        });
        $(".14nilai0").click(function() {
            $("#14nilai0").attr("checked", true);
            // console.log(document.getElementById('nilai0'));
        });
        $(".14nilai1").click(function() {
            $("#14nilai1").attr("checked", true);
            // console.log(document.getElementById('nilai1'));
        });
        $(".14nilai2").click(function() {
            $("#14nilai2").attr("checked", true);
            //console.log(document.getElementById('nilai2'));
        });

        var forem = document.getElementsByClassName('form-check-input');
        var count = forem.length / 3;
        var k;
        var jum = 0;
        for (k = 0; k < forem.length; k++) {
            if (forem[k].checked) {
                jum += 1;
            }
        }
        if (jum < count) {
            $("#save").attr("disabled", true);
        } else {
            $("#save").attr("disabled", false);
        }
        console.log(jum);
        console.log(count);
        var ind1 = document.getElementsByName('indikator1');
        var ind2 = document.getElementsByName('indikator2');
        var ind3 = document.getElementsByName('indikator3');
        var ind4 = document.getElementsByName('indikator4');
        var ind5 = document.getElementsByName('indikator5');
        var ind6 = document.getElementsByName('indikator6');
        var ind7 = document.getElementsByName('indikator7');
        var ind8 = document.getElementsByName('indikator8');
        var ind9 = document.getElementsByName('indikator9');
        var ind10 = document.getElementsByName('indikator10');
        var ind11 = document.getElementsByName('indikator11');
        var ind12 = document.getElementsByName('indikator12');
        var ind13 = document.getElementsByName('indikator13');
        var ind14 = document.getElementsByName('indikator14');

        var ind1_value = 0,
            ind2_value = 0,
            ind3_value = 0,
            ind4_value = 0,
            ind5_value = 0,
            ind6_value = 0,
            ind7_value = 0,
            ind8_value = 0,
            ind9_value = 0,
            ind10_value = 0,
            ind11_value = 0,
            ind12_value = 0,
            ind13_value = 0,
            ind14_value = 0;
        for (var i = 0; i < ind1.length; i++) {
            if (ind1[i].checked) {
                ind1_value = ind1[i].value;
            }
        }
        for (var i = 0; i < ind2.length; i++) {
            if (ind2[i].checked) {
                ind2_value = ind2[i].value;
            }
        }
        for (var i = 0; i < ind3.length; i++) {
            if (ind3[i].checked) {
                ind3_value = ind3[i].value;
            }
        }
        for (var i = 0; i < ind4.length; i++) {
            if (ind4[i].checked) {
                ind4_value = ind4[i].value;
            }
        }
        for (var i = 0; i < ind5.length; i++) {
            if (ind5[i].checked) {
                ind5_value = ind5[i].value;
            }
        }
        for (var i = 0; i < ind6.length; i++) {
            if (ind6[i].checked) {
                ind6_value = ind6[i].value;
            }
        }
        for (var i = 0; i < ind7.length; i++) {
            if (ind7[i].checked) {
                ind7_value = ind7[i].value;
            }
        }
        for (var i = 0; i < ind8.length; i++) {
            if (ind8[i].checked) {
                ind8_value = ind8[i].value;
            }
        }
        for (var i = 0; i < ind9.length; i++) {
            if (ind9[i].checked) {
                ind9_value = ind9[i].value;
            }
        }
        for (var i = 0; i < ind10.length; i++) {
            if (ind10[i].checked) {
                ind10_value = ind10[i].value;
            }
        }
        for (var i = 0; i < ind11.length; i++) {
            if (ind11[i].checked) {
                ind11_value = ind11[i].value;
            }
        }
        for (var i = 0; i < ind12.length; i++) {
            if (ind12[i].checked) {
                ind12_value = ind12[i].value;
            }
        }
        for (var i = 0; i < ind13.length; i++) {
            if (ind13[i].checked) {
                ind13_value = ind13[i].value;
            }
        }
        for (var i = 0; i < ind14.length; i++) {
            if (ind14[i].checked) {
                ind14_value = ind14[i].value;
            }
        }
        var satu = parseInt(ind1_value);
        var dua = parseInt(ind2_value);
        var tiga = parseInt(ind3_value);
        var empat = parseInt(ind4_value);
        var lima = parseInt(ind5_value);
        var enam = parseInt(ind6_value);
        var tujuh = parseInt(ind7_value);
        var delapan = parseInt(ind8_value);
        var sembilan = parseInt(ind9_value);
        var sepuluh = parseInt(ind10_value);
        var sebelas = parseInt(ind11_value);
        var duabelas = parseInt(ind12_value);
        var tigabelas = parseInt(ind13_value);
        var empatbelas = parseInt(ind14_value);
        var skor = satu + dua + tiga + empat + lima + enam + tujuh + delapan + sembilan + sepuluh + sebelas + duabelas + tigabelas + empatbelas;
        var presentase = (skor / (count * 2)) * 100;
        var skorkompetensi = skor * 2;
        var nilai = 0;
        if (presentase <= 25) {
            nilai = 1;
        } else {
            if ((presentase <= 50) && (presentase > 25)) {
                nilai = 2;
            } else {
                if ((presentase > 50) && (presentase <= 75)) {
                    nilai = 3;
                } else {
                    if ((presentase > 75) && (presentase <= 100))
                        nilai = 4;
                    else {
                        nilai = 1;
                    }
                }
            }
        }
        var kop = count * 2;
        console.log(presentase);
        $('#skor').attr('value', skor);
        $('#skorkompetensi').attr('value', kop);
        $('#presentase').attr('value', presentase.toFixed(0));
        $('#nilai').attr('value', nilai);
    })
</script>

</body>

</html>