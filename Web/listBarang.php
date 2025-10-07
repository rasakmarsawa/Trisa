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
                                    <h4>List Barang</h4>
                                    <hr>
                                </div>
                                <div class="card-body">
                                  <div class="float-right mb-3">
                                      <a type="button" class="btn btn-primary" href="tambahBarang.php">Tambah</a>
                                  </div>
                                  <?php if (isset($_GET['add'])): ?>
                                    <div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                      Barang baru berhasil ditambahkan.
                                    </div>
                                  <?php endif; ?>
                                  <?php if (isset($_GET['delete'])): ?>
                                    <div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                      Barang berhasil dihapus.
                                    </div>
                                  <?php endif; ?>
                                    <div class="bootstrap-data-table-panel">
                                        <div class="table-responsive">
                                            <table id="row-select" class="display table table-borderd table-hover">
                                              <thead>
                                                  <tr>
                                                      <th>#</th>
                                                      <th>Nama Barang</th>
                                                      <th></th>
                                                  </tr>
                                              </thead>
                                              <tbody>

                                                <?php
                                                $i=1;
                                                foreach ($arr as $key => $value): ?>
                                                  <tr>
                                                      <th scope="row"><?php echo $i ?></th>
                                                      <td><?php echo $value['nama_barang'] ?></td>
                                                      <td><center><a type="button" class="btn btn-primary" href="detailBarang.php?id=<?php echo $value['id_barang'] ?>">Detail</a></center></td>
                                                  </tr>
                                                <?php $i++;
                                              endforeach; ?>
                                              </tbody>
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
