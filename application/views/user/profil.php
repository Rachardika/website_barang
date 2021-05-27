  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <div class="container-fluid" style="padding-top: 0px">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb shadow" style="background-color:#fff;">
              <li class="breadcrumb-item">
                  <a href="<?= base_url("user/index") ?>">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Profil</li>
          </ol>
          <div class="flash-password" data-flashdata="<?= $this->session->flashdata('password'); ?>"></div>
          <div class="card shadow mb-3">
              <!-- <div class="card-header" style="background-color:#F9EBEA;"><i class="fas fa-table"></i> Profil Saya</div> -->
              <div class="card-header" style="background-color:#eaf8f9; letter-spacing:1px;">
                  <h5><i class="fas fa-user"></i> Profil Saya</h5>
              </div>
              <div class="card-body">
                  <div class="col-lg-12">
                      <!-- <?= $this->session->flashdata('message'); ?> -->
                      <div class="flash-profil" data-flashdata="<?= $this->session->flashdata('profil'); ?>"></div>
                  </div>
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-4 pt-5 ">
                              <div class="text-center">
                                  <a href="<?= base_url('assets/images/avatar/') . $user['image']; ?>" target="_blank"><img class="img-profile rounded-circle" src="<?= base_url('assets/images/avatar/') . $user['image']; ?>" class="rounded" style="width:250px; height:250px;"></a>
                              </div>
                          </div>
                          <!-- membuat kotak pada informasi pribadi -->

                          <div class="col-lg-8 pt-2">
                              <div class="card shadow" style="background:#eaf8f9">
                                  <div class="text-align-center">
                                      <table class="table" style="font-weight:600;border:none">
                                          <tr>
                                              <td>Nama</td>
                                              <td>:</td>
                                              <td> <?= $user['nama']; ?> </td>
                                          </tr>
                                          <tr>
                                              <td>NIP</td>
                                              <td>:</td>
                                              <td> <?= $user['nip']; ?></td>
                                          </tr>
                                          <tr>
                                              <td>Tempat Tanggal Lahir</td>
                                              <td>:</td>
                                              <td><?= $user['tempat_lahir']; ?> <?php echo "," ?> <?= $user['tgl_lahir']; ?></td>
                                          </tr>
                                          <tr>
                                              <td>Akses</td>
                                              <td>:</td>
                                              <td><?= $user['pangkat']; ?> </td>
                                          </tr>
                                          <tr>
                                              <td>Jenis Kelamin</td>
                                              <td>:</td>
                                              <td><?= $user['jenkel']; ?> </td>
                                          </tr>

                                          <?php
                                            function tgl_indo($tanggal)
                                            {
                                                $bulan = array(
                                                    1 =>   'Januari',
                                                    'Februari',
                                                    'Maret',
                                                    'April',
                                                    'Mei',
                                                    'Juni',
                                                    'Juli',
                                                    'Agustus',
                                                    'September',
                                                    'Oktober',
                                                    'November',
                                                    'Desember'
                                                );
                                                $pecahkan = explode('-', $tanggal);

                                                // variabel pecahkan 0 = tahun
                                                // variabel pecahkan 1 = bulan
                                                // variabel pecahkan 2 = tanggal

                                                return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
                                            }
                                            ?>
                                          </td>
                                          </tr>
                                          <tr>
                                              <td colspan="3">
                                                  <div class="text-center">
                                                      <?= anchor('user/editProfil/' . $user['id_user'], '<button class="btn btn-warning" data-toggle="modal" data-target="#"><i class="fas fa-user-edit"></i> Edit</button>');  ?>
                                                  </div>
                                              </td>
                                          </tr>
                                      </table>

                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- <div class="card-footer small text-muted"></div> -->
          </div>

      </div>
      <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->