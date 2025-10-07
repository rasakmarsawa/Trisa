<?php include 'controller/kasirController.php' ?>
<?php include 'include/head.php' ?>

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                      <div class="card col-lg-12">
                          <div class="card-title">
                              <h4>Cari Detail Pelanggan</h4>
                              <hr>
                          </div>
                          <?php if (isset($_GET['notfound'])): ?>
                            <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                              Kode pelanggan tidak ditemukan.
                            </div>
                          <?php endif; ?>
                          <div class="card-body">
                              <div class="basic-form">
                                  <form method="post">
                                      <div class="form-group">
                                          <label>Kode Pelanggan</label>
                                          <input name="username" class="form-control" placeholder="Kode Pelanggan" maxlength="50">
                                      </div>
                                      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

<?php include 'include/foot.php' ?>
