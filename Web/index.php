<?php
include 'controller/session.php';
include 'model/pesanan.php';
include 'model/barang.php';
include 'model/detailPesanan.php';

$session = new session();
$pesanan = new pesanan();
$barang = new barang();
$detail = new detailPesanan();

if ($session->check()==false) {
  $session->redirect('login.php');
}

if(isset($_GET['logout'])){
  session_destroy();
  $session->redirect('login.php');
}

//graph pemasukan
$pesanan_harian = $pesanan->getPesananHarian();
$today = $pesanan_harian['today'];

$dataPemasukan = array();
$i = 0;
foreach ($pesanan_harian['all'] as $key => $value) {
  $dataPemasukan[$i]=[
    'x' => $value['timestamp'],
    'y' => $value['total_harian']
  ];
  $i = $i + 1;
}

//graph barang terjual
$barang_terjual = $detail->getDetailByBarangTerjual();

$dataBarangTerjual = array();
$i = 0;
foreach ($barang_terjual as $key => $value) {
  $dataBarangTerjual[$i]=[
    'label' => $value['nama_barang'],
    'y' => $value['jumlah_barang']
  ];
  $i = $i + 1;
}
?>

<?php include 'include/head.php' ?>

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="card bg-success">
                          <div class="stat-widget-six">
                            <div class="stat-icon">
                              <i class="ti-stats-up"></i>
                            </div>
                            <div class="stat-content">
                              <div class="text-left dib">
                                <div class="stat-heading">Pesanan Hari Ini</div>
                                <div class="stat-text"><?php echo $today['jumlah_pesanan']; ?> Pesanan</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="card bg-success">
                          <div class="stat-widget-six">
                            <div class="stat-icon">
                              <i class="ti-stats-up"></i>
                            </div>
                            <div class="stat-content">
                              <div class="text-left dib">
                                <div class="stat-heading">Pemasukan Hari Ini</div>
                                <div class="stat-text">Rp. <?php echo $today['total_harian']; ?>,-  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row"`style="position:fixed;bottom:0">
                        <!-- /# column -->
                        <div class="col-lg-6">
                          <div class="card">
                            <div class="card-title">
                              <h4>Jumlah Barang Terjual Bulanan</h4>
                              <hr>
                            </div>
                            <div class="flot-container">
                              <div id="barang_terjual" class="flot-line"></div>
                            </div>
                          </div>
                          <!-- /# card -->
                        </div>
                        <!-- /# column -->
                        <div class="col-lg-6">
                          <div class="card">
                            <div class="card-title">
                              <h4>Pemasukan Harian</h4>
                              <hr>
                            </div>
                            <div class="flot-container">
                              <div id="pemasukan" class="flot-line"></div>
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

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <script>
    window.onload = function () {

    var pemasukan = new CanvasJS.Chart("pemasukan", {
      animationEnabled: true,
      axisY: {
        title: "Pemasukan harian",
        suffix: ",-",
        prefix: "Rp. "
      },
      data: [{
        type: "spline",
        markerSize: 10,
        xValueFormatString: "DD-MM-YYYY",
        yValueFormatString: "Rp#,##0.-",
        xValueType: "dateTime",
        dataPoints: <?php echo json_encode($dataPemasukan, JSON_NUMERIC_CHECK); ?>
      }]
    });

    pemasukan.render();

    var barang_terjual = new CanvasJS.Chart("barang_terjual", {
    	theme: "light1", // "light2", "dark1", "dark2"
    	animationEnabled: true, // change to true
    	data: [
    	{
    		type: "column",
    		dataPoints: <?php echo json_encode($dataBarangTerjual, JSON_NUMERIC_CHECK); ?>
    	}]
    });
    barang_terjual.render();

    }
    </script>
<?php include 'include/foot.php' ?>
