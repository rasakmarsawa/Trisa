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
                                  <h4>Detail Barang </h4>
                                  <hr>
                              </div>
                              <?php if (isset($_GET['update'])): ?>
                                <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                                  Barang berhasil diubah.
                                </div>
                              <?php endif; ?>
                              <div class="card-subtitle">
                                <div>
                                  <p class="tab">
                                  Nama Barang : <?php echo $data['nama_barang'] ?> <br>
                                  Harga : Rp. <?php echo $data['harga'] ?>,-
                                  </p>
                                  <img src="uploads/<?php echo $data['id_barang'] ?>.<?php echo $data['type'] ?>" width="150" height="150">
                                </div>
                                <div>
                                  <div class="float-right">
                                    <a type="button" class="btn btn-danger mr-1" href="?delete=<?php echo $data['id_barang'] ?>&&type=<?php echo $data['type'] ?>">Hapus</a>
                                  </div>
                                  <div class="float-right">
                                    <a type="button" class="btn btn-primary mr-1" href="ubahBarang.php?id=<?php echo $data['id_barang'] ?>">Ubah</a>
                                  </div>
                                </div>
                              </div>
                                <!-- <div class="card-body">
                                  <div class="card-title mb-2">
                                      <h4>Penjualan Barang</h4>
                                      <hr>
                                  </div>
                                    <div class="bootstrap-data-table-panel">
                                        <div class="table-responsive">
                                            <table id="row-select" class="display table table-borderd table-hover">
                                              <thead>
                                                  <tr>
                                                      <th>Tanggal</th>
                                                      <th>Pembeli</th>
                                                      <th>Jumlah</th>
                                                  </tr>
                                              </thead>
                                              <tbody>

                                                <?php foreach ($detail as $key => $value): ?>
                                                  <tr>
                                                      <td><?php echo $value['tanggal'] ?></td>
                                                      <td><?php echo $value['nama_pelanggan'] ?></td>
                                                      <td><?php echo $value['jumlah_barang'] ?></td>
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
                                </div> -->
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                </section>
            </div>
        </div>
    </div>

<?php include 'include/foot.php' ?>
