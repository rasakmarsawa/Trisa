<?php include 'controller/adminController.php'; ?>
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
                                    <h4>List Kasir </h4>
                                    <hr>
                                </div>
                                <div class="card-body">
                                  <div class="float-right mb-3">
                                      <a type="button" class="btn btn-primary" href="tambahKasir.php">Tambah</a>
                                  </div>
                                  <?php if (isset($_GET['add'])): ?>
                                    <div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                      Kasir baru berhasil ditambahkan.
                                    </div>
                                  <?php endif; ?>
                                  <?php if (isset($_GET['delete'])): ?>
                                    <div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                      Kasir berhasil dihapus.
                                    </div>
                                  <?php endif; ?>
                                  <div class="bootstrap-data-table-panel">
                                      <div class="table-responsive">
                                          <table id="row-select" class="display table table-borderd table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Username</th>
                                                    <th>Nama Kasir</th>
                                                    <th>Role</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                              <?php
                                              $i=1;
                                              foreach ($arr as $key => $value): ?>
                                                <tr>
                                                    <th scope="row"><?php echo $i ?></th>
                                                    <td><?php echo $value['username'] ?></td>
                                                    <td><?php echo $value['nama_kasir'] ?></td>
                                                    <td><?php if ($value['admin']==1): ?>
                                                        <span class="badge badge-primary">Admin</span>
                                                      <?php else: ?>
                                                        <span class="badge badge-success">Kasir</span>
                                                    <?php endif; ?></td>
                                                    <td><center><a type="button" class="btn btn-primary" href="detailKasir.php?id=<?php echo $value['username'] ?>">Detail</a></center></td>
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
                </section>
            </div>
        </div>
    </div>

<?php include 'include/foot.php' ?>
