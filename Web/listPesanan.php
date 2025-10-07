<?php include 'controller/adminController.php' ?>
<?php include 'include/head.php' ?>

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <!-- /# column -->
                            <div class="card col-lg-12">
                                <div class="card-title">
                                    <h4>List Pesanan</h4>
                                    <hr>
                                </div>
                                <div class="card-body">
                                  <div class="bootstrap-data-table-panel">
                                      <div class="table-responsive">
                                          <table id="row-select" class="display table table-borderd table-hover">
                                              <thead>
                                                  <tr>
                                                      <th>Tanggal</th>
                                                      <th>Nomor Antrian</th>
                                                      <th>Nama Pelanggan</th>
                                                      <th>Status Pesanan</th>
                                                      <th></th>
                                                  </tr>
                                              </thead>

                                              <tbody>
                                                <?php foreach ($data as $key => $value): ?>
                                                  <tr>
                                                      <td><?php echo $value['tanggal'] ?></td>
                                                      <td><?php echo $value['no'] ?></td>
                                                      <td><?php echo $value['nama_pelanggan'] ?></td>
                                                      <td><?php echo $value['nama_status'] ?></td>
                                                      <td><center><a type="button" class="btn btn-primary" href="detailPesanan.php?tanggal=<?php echo $value['tanggal'] ?>&&no=<?php echo $value['no'] ?>">Detail</a></center></td>
                                                  </tr>
                                                <?php endforeach; ?>
                                              </tbody>
                                              <tfoot>
                                                  <tr>
                                                      <th>Tanggal</th>
                                                      <th>Nomor Antrian</th>
                                                      <th>Nama Pelanggan</th>
                                                      <th>Status Pesanan</th>
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
                    <!-- /# row -->
                </section>
            </div>
        </div>
    </div>

<?php include 'include/foot.php' ?>
