<?php
include 'controller/session.php';
include 'controller/imageUpload.php';
include 'model/barang.php';
include 'model/kasir.php';
include 'model/topup.php';
include 'model/pesanan.php';
include 'model/statusPesanan.php';

$session = new session();
$barang = new barang();
$kasir = new kasir();
$topup = new topup();
$pesanan = new pesanan();
$spesanan = new statusPesanan();
$imgup = new imageUpload();

//check user log in
if ($session->check()==false) {
  $session->redirect('login.php');
}

//check user status
if ($session->checkAdmin()==false) {
  $session->redirect('index.php');
}

//get file name
if (empty($_SERVER['QUERY_STRING'])) {
  $filename = basename($_SERVER['REQUEST_URI'],'.php');
}else{
  $filename = basename($_SERVER['REQUEST_URI'], '.php?' . $_SERVER['QUERY_STRING']);
}

switch ($filename) {
  case 'listBarang':
    $arr = $barang->getBarang();
    break;

  case 'tambahBarang':
    if (isset($_POST['submit'])) {
      $result = $imgup->checkImage($_FILES);
      if ($result['status']==1) {
        if ($session->emptyCheck($_POST,array('submit'))) {
          $result2 = $barang->addBarang(trim($_POST['nama']),$_POST['harga'],$result['type']);
          if ($result2) {
            $id = $barang->getLastId();
            $imgup->upload($_FILES, "uploads/".$id['id_barang'].".".$id['type']);
            $session->redirect('listBarang.php?add');
          }else{
            $session->redirect('?fail');
          }
        }else {
          $session->redirect('?empty');
        }
      }else{
        $session->redirect('?imgfail='.$result['message']);
      }


    }
    break;

  case 'detailBarang':
    if (isset($_GET['delete'])) {
      $result = $barang->deleteBarangById($_GET['delete']);
      if ($result==true) {
        $filename = $_GET['delete'].".".$_GET['type'];
        $imgup->delete($filename);
        $session->redirect('listBarang.php?delete');
      }
    }

    $data = $barang->getBarangById($_GET['id']);
    break;

  case 'ubahBarang':
    $data = $barang->getBarangById($_GET['id']);

    if (isset($_POST['submit'])) {
      $_POST['id']=$_GET['id'];
      $filename = $_FILES['foto']['name'];
      $filecheck = true;
      $result = null;

      if ($filename!='') {
        $type = $imgup->getType($filename);
        $_POST['old_type'] = $data['type'];
        $_POST['type'] = $type;
        $result = $imgup->checkImage($_FILES);
        if ($result['status']==0) {
          $filecheck = false;
        }
      }else{
        $_POST['type'] = NULL;
      }

      if ($filecheck==true) {
        if ($session->emptyCheck($_POST,array('submit','foto','old_type'))) {
          $old_filename = $_POST['id'].".".$_POST['old_type'];
          $imgup->delete($old_filename);

          $new_filename = $_POST['id'].".".$_POST['type'];
          $imgup->upload($_FILES, 'uploads/'.$new_filename);
          $result = $barang->updateBarang($_POST);
          if ($result) {
            $session->redirect('detailBarang.php?id='.$_GET['id'].'&update');
          }else{
            $session->redirect('ubahBarang.php?id='.$_GET['id'].'&fail');
          }
        }else{
          $session->redirect('ubahBarang.php?id='.$_GET['id'].'&empty');
        }
      }else{
        $session->redirect('ubahBarang.php?id='.$_GET['id'].'&failcheck='.$result['message']);
      }
    }
    break;

  case 'listKasir':
    $arr = $kasir->getKasir();
    break;

  case 'tambahKasir':
    if (isset($_POST['submit'])) {
      $exception = array("submit");
      if ($session->emptyCheck($_POST,$exception)) {
        $result = $kasir->addKasir($_POST);
        if ($result) {
          $session->redirect('listKasir.php?add');
        }else{
          $session->redirect('?fail');
        }
      }else{
        $session->redirect('?empty');
      }
    }
    break;

  case 'detailKasir':
    if (isset($_GET['delete'])) {
      $result = $kasir->deleteKasirById($_GET['delete']);
      if ($result==true) {
        $session->redirect('listKasir.php?delete');
      }
    }

    $data = $kasir->getKasirById($_GET['id']);
    $data1 = $topup->getTopupByKasir($_GET['id']);
    break;

  case 'ubahKasir':
    $data = $kasir->getKasirById($_GET['id']);

    if (isset($_POST['submit'])) {
      $_POST['username']=$_GET['id'];
      $exception = array("submit","password");
      if ($session->emptyCheck($_POST,$exception)) {
        $result = $kasir->updateKasir($_POST);
        if ($result) {
          $session->redirect('detailKasir.php?id='.$_GET['id'].'&update');
        }else{
          $session->redirect('ubahKasir.php?id='.$_GET['id'].'&fail');
        }
      }else{
        $session->redirect('ubahKasir.php?id='.$_GET['id'].'&empty');
      }
    }
    break;

  case 'listPesanan':
    $data = $pesanan->getPesanan();
    break;

  case 'listStatus':
    $arr = $spesanan->getStatusPesanan();
    break;

  case 'ubahStatus':
    $data = $spesanan->getStatusPesananById($_GET['id']);

    if (isset($_POST['submit'])) {
      $_POST['id_status']=$_GET['id'];
      if ($session->emptyCheck($_POST,array('submit','message'))) {
        $result = $spesanan->updateStatusPesanan($_POST);
        if ($result) {
          $session->redirect('listStatus.php?update');
        }else{
          $session->redirect('ubahStatus.php?id='.$_GET['id'].'&fail');
        }
      }else{
        $session->redirect('ubahStatus.php?id='.$_GET['id'].'&empty');
      }
    }
    break;

  default:
    // echo "page {$filename} not found";
    break;
}
?>
