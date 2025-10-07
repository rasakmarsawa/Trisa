<?php include 'controller/kasirController.php' ?>
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
                                    <h4>Buat Pesanan Baru</h4>
                                    <hr>
                                </div>
                                <div class="card-body">
                                  <?php if (isset($_GET['empty'])): ?>
                                    <div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                      Tidak ada barang yang dipesan.
                                    </div>
                                  <?php endif; ?>
                                  <form method="post">
                                    <div class="float-right">
                                      <button type="submit" name="submit" class="btn btn-primary">Buat Pesanan</button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Barang</th>
                                                    <th>Harga</th>
                                                    <th>Jumlah Barang</th>
                                                </tr>
                                            </thead>
                                              <tbody>

                                                <?php
                                                $i=1;
                                                foreach ($arr as $key => $value): ?>
                                                  <tr>
                                                      <th scope="row"><?php echo $i ?></th>
                                                      <td><?php echo $value['nama_barang'] ?></td>
                                                      <td><?php echo "Rp. ".$value['harga'] ?></td>
                                                      <td><input type='number' value="0" min="0" class="form-control" name="<?php echo $key ?>"/></td>
                                                  </tr>
                                                <?php $i++;
                                              endforeach; ?>
                                              </tbody>
                                        </table>
                                    </div>
                                  </form>
                                </div>
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
