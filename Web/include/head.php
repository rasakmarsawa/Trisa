<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trisha</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="images/ic_fried_rice.png">
    <!-- Styles -->
    <!-- <link href="assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/lib/chartist/chartist.min.css" rel="stylesheet"> -->
    <!-- <link href="assets/cssx/lib/font-awesome.min.css" rel="stylesheet"> -->
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <!-- <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" /> -->
    <!-- <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" /> -->
    <!-- <link href="assets/css/lib/weather-icons.css" rel="stylesheet" /> -->
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="assets/css/lib/helper.css" rel="stylesheet"> -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="bg-theme">
    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="index.php">
                      <?php if ($_SESSION['admin']==1): ?>
                          <span>Administrator</span></a>
                      <?php else: ?>
                          <span>Trisha</span></a>
                      <?php endif; ?>
                    </div>
                    <li class="label">Menu</li>
                    <li><a href="index.php"><i class="ti-home"></i> Beranda </a></li>
                    <?php if ($_SESSION['admin']==1): ?>
                      <li><a href="listBarang.php"><i class="ti-truck"></i> Barang </a></li>
                      <li><a href="listKasir.php"><i class="ti-user"></i> Kasir </a></li>
                      <li><a href="listPesanan.php"><i class="ti-shopping-cart-full"></i> Pesanan </a></li>
                      <li><a href="listStatus.php"><i class="ti-list"></i> Status Pesanan </a></li>
                    <?php else: ?>
                      <li><a href="antrian.php"><i class="ti-shopping-cart"></i> Antrian </a></li>
                      <li><a href="topup.php"><i class="ti-wallet"></i> Topup </a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                      <div class="header-icon">
                        <a href="index.php?logout">
                            <i class="ti-power-off"></i>
                            <span>Logout</span>
                        </a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
