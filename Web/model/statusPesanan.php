<?php
/**
 *
 */
class statusPesanan
{
  function __construct(){}

  function getStatusPesanan(){
    $sql = "select * from status_pesanan";
    $result = $GLOBALS['mysqli']->query($sql);

    $arr = array();
    $i=0;
    while ($data = mysqli_fetch_assoc($result)) {
      $arr[$i]=$data;
      $i++;
    }

    return $arr;
  }

  function getStatusPesananById($id){
    $sql = "select * from status_pesanan where id_status = ".$id;
    $result = $GLOBALS['mysqli']->query($sql);

    if (mysqli_num_rows($result)==1) {
      $data = mysqli_fetch_assoc($result);
    }else{
      $data = null;
    }

    return $data;
  }

  function updateStatusPesanan($post){
    $sql = "update status_pesanan set
    nama_status = '".$post['nama_status']."',
    message = '".$post['message']."'
    where id_status = ".$post['id_status'];

    $GLOBALS['mysqli']->query($sql);

    $result = false;
    if (mysqli_affected_rows($GLOBALS['mysqli'])==1) {
      $result = true;
    }

    return $sql;
  }
}

?>
