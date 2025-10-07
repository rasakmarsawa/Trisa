<?php
include 'controller/session.php';
include 'controller/notification.php';
include 'model/statusAntrian.php';
include 'model/pelanggan.php';
include 'model/barang.php';
include 'model/pesanan.php';
include 'model/detailPesanan.php';
include 'model/topup.php';

$session = new session();
$status = new statusAntrian();
$pelanggan = new pelanggan();
$barang = new barang();
$pesanan = new pesanan();
$detailPesanan = new detailPesanan();
$topup = new topup();

//check user log in
if ($session->check()==false) {
  $session->redirect('login.php');
}

//check user status
if ($session->checkAdmin()==true) {
  $session->redirect('index.php');
}

//get file name
if (empty($_SERVER['QUERY_STRING'])) {
  $filename = basename($_SERVER['REQUEST_URI'],'.php');
}else{
  $filename = basename($_SERVER['REQUEST_URI'], '.php?' . $_SERVER['QUERY_STRING']);
}

switch ($filename) {
  case 'antrian':
    if (isset($_POST['submit'])) {
      switch ($_POST['submit']) {
        case '1':
          $status->updateStatus(1,$_SESSION['username']);

          pushNotification(
            0,
            $pelanggan->getAllToken(),
            "Restoran buka",
            "Udah bisa pesan makanan lagi nih",
            3,
            1,
            null
          );
          break;
        case '2':
          $status->updateStatus(2,$_SESSION['username']);
          pushNotification(
            0,
            $pelanggan->getAllToken(),
            "Restoran tutup",
            "Udah ga bisa mesan makanan lagi deh",
            3,
            2,
            null
          );
          break;
      }
    }

    $data = $pesanan->getAntrian();
    $stat = $status->getLastStatus();
    break;

    case 'tambahPesanan':
      $arr = $barang->getBarang();

      if (isset($_POST['submit'])) {
        $data = $pesanan->addPesananGuess($_POST,$arr);
        if ($data['dataPesanan']['total_harga']!=0) {
          $pesanan->api_addPesanan($data['dataPesanan']);
          $detailPesanan->api_addDetailPesanan($data['dataDetail']);

          $session->redirect('antrian.php');
        }else{
          $session->redirect('tambahPesanan.php?empty');
        }
      }
      break;

    case 'topup':
      if (isset($_POST['submit'])) {
        $session->redirect('detailPelanggan.php?id='.$_POST['username']);
      }
      break;

    case 'detailPelanggan':
      if (isset($_POST['submit'])) {
        if ($session->emptyCheck($_POST,array('submit'))) {
          if ($_POST['jumlah_topup']>0) {
            $_POST['id_pelanggan']=$_GET['id'];
            $_POST['id_kasir']=$_SESSION['username'];
            $result = $topup->addTopup($_POST);

            if ($result) {
              $session->redirect('detailPelanggan.php?id='.$_GET['id'].'&&topup');
            }else{
              $session->redirect('detailPelanggan.php?id='.$_GET['id'].'&&fail');
            }
          }else{
            $session->redirect('detailPelanggan.php?id='.$_GET['id'].'&&fail');
          }
        }else{
          $session->redirect('detailPelanggan.php?id='.$_GET['id'].'&&empty');
        }
      }

      $data = $pelanggan->getPelangganById($_GET['id']);
      if (empty($data)) {
        $session->redirect('topup.php?notfound');
      }

      $activity = $pelanggan->getActivity($_GET['id']);
      break;

    default:
    echo "page {$filename} not found";
    break;
}
?>
