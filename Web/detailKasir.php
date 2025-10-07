<?php include 'controller/adminController.php' ?>
<?php include 'include/head.php' ?>

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <!-- /# row -->
                <section id="main-content">
                        <!-- /# column -->
                            <div class="card col-lg-12">
                              <div class="card-title">
                                  <h4>Detail Kasir </h4>
                                  <hr>
                              </div>
                              <?php if (isset($_GET['update'])): ?>
                                <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                                  Data kasir berhasil diubah.
                                </div>
                              <?php endif; ?>
                              <div class="card-subtitle">
                                  <p>
                                    Nama Kasir : <?php echo $data['nama_kasir'] ?><br>
                                    Username : <?php echo $data['username'] ?>
                                  </p>
                                  <div>
                                    <?php if ($_SESSION['username']!=$_GET['id'] && $_GET['id']!='admin'): ?>
                                      <div class="float-right">
                                        <a type="button" class="btn btn-danger mr-1" href="?delete=<?php echo $data['username'] ?>">Hapus</a>
                                      </div>
                                    <?php endif; ?>
                                      <div class="float-right">
                                        <a type="button" class="btn btn-primary mr-1" href="ubahKasir.php?id=<?php echo $data['username'] ?>">Ubah</a>
                                      </div>
                                  </div>
                              </div>
                              <div class="card-body">
                                <div class="card-title">
                                  <h4>Aktivitas Topup</h4>
                                  <hr>
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="row-select" class="display table table-borderd table-hover">
                                          <thead>
                                              <tr>
                                                  <th>Tanggal</th>
                                                  <th>Pembeli</th>
                                                  <th>Jumlah Topup</th>
                                              </tr>
                                          </thead>
                                          <tbody>

                                            <?php foreach ($data1 as $key => $value): ?>
                                              <tr>
                                                  <td><?php echo $value['tanggal'] ?></td>
                                                  <td><?php echo $value['nama_pelanggan'] ?></td>
                                                  <td><?php echo $value['jumlah_topup'] ?></td>
                                              </tr>
                                            <?php endforeach; ?>
                                          </tbody>
                                          <tfoot>
                                            <tr>
                                              <th>Tanggal</th>
                                              <th>Pembeli</th>
                                            </tr>
                                          </tfoot>
                                        </table>
                                    </div>
                                </div>
                              </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
            </div>
        </div>
    </div>

<?php include 'include/foot.php' ?>
