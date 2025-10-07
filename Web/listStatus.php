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
                                <div class="card-title mb-2">
                                    <h4>List Status Pesanan </h4>
                                    <hr>
                                </div>
                                <div class="card-body">
                                  <?php if (isset($_GET['update'])): ?>
                                    <div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                      Status pesanan berhasil diubah.
                                    </div>
                                  <?php endif; ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Status</th>
                                                    <th>Message</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                              <?php
                                              $i=1;
                                              foreach ($arr as $key => $value): ?>
                                                <tr>
                                                    <th scope="row"><?php echo $i ?></th>
                                                    <td><?php echo $value['nama_status'] ?></td>
                                                    <td><?php echo $value['message'] ?></td>
                                                    <td><center><a type="button" class="btn btn-primary" href="ubahStatus.php?id=<?php echo $value['id_status'] ?>">Ubah</a></center></td>
                                                </tr>
                                              <?php $i++;
                                            endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
            </div>
        </div>
    </div>

<?php include 'include/foot.php' ?>
