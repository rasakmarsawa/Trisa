<?php include 'controller/adminController.php' ?>
<?php include 'include/head.php' ?>

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <!-- /# column -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Tambah Barang</h4>
                                    <hr>
                                </div>
                                <?php if (isset($_GET['fail'])): ?>
                                  <div class="alert alert-danger alert-dismissible fade show">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                    Tambah data tidak berhasil.
                                  </div>
                                <?php endif; ?>
                                <?php if (isset($_GET['imgfail'])): ?>
                                  <div class="alert alert-danger alert-dismissible fade show">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                    <?php echo $_GET['imgfail'] ?>
                                  </div>
                                <?php endif; ?>
                                <?php if (isset($_GET['empty'])): ?>
                                  <div class="alert alert-danger alert-dismissible fade show">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                    Data input tidak boleh kosong.
                                  </div>
                                <?php endif; ?>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Nama Barang</label>
                                                <input name="nama" type="nama" class="form-control" placeholder="Nama Barang" maxlength="50">
                                            </div>
                                            <div class="form-group">
                                                <label>Harga</label>
                                                <input name="harga" type="harga" class="form-control" placeholder="Harga" maxlength="11">
                                            </div>
                                            <div class="form-group">
                                                <label>Foto</label>
                                                <input name="foto" type="file" class="form-control">
                                            </div>
                                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
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
