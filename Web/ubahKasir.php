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
                                <h4>Ubah Data Kasir</h4>
                                <hr>
                            </div>
                            <?php if (isset($_GET['fail'])): ?>
                              <div class="alert alert-danger alert-dismissible fade show">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                                Merubah data kasir tidak berhasil.
                              </div>
                            <?php endif; ?>
                            <?php if (isset($_GET['empty'])): ?>
                              <div class="alert alert-danger alert-dismissible fade show">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                                Merubah data kasir tidak berhasil. Data tidak boleh dikosongkan.
                              </div>
                            <?php endif; ?>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post">
                                        <div class="form-group">
                                            <label>Nama Kasir</label>
                                            <input name="nama_kasir" class="form-control" placeholder="Nama Kasir" maxlength="50" value="<?php echo $data['nama_kasir'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input name="password" class="form-control" placeholder="Password" maxlength="20">
                                        </div>
                                        <div class="form-group">
                                            <select
                                            <?php if ($_GET['id']=='admin'): ?>
                                              hidden
                                            <?php endif; ?>
                                            class="form-control" name="admin">
                                              <option value="0">Kasir</option>
                                              <option
                                              <?php if ($data['admin']==1): ?>
                                                selected
                                              <?php endif; ?>
                                               value="1">Admin</option>
                                            </select>
                                        </div>
                                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                    </div>
                </section>
            </div>
        </div>
    </div>

<?php include 'include/foot.php' ?>
