<?php
/**
 *
 */
class topup
{
  function __construct(){}

  function addTopup($post){
    $sql = "insert into topup (jumlah_topup,id_kasir,id_pelanggan)
    values (
      ".$post['jumlah_topup'].",
      '".$post['id_kasir']."',
      '".$post['id_pelanggan']."'
      )";
    $result = $GLOBALS['mysqli']->query($sql);

    return $result;
  }

  function getTopupByKasir($id){
    $sql = "select * from topup inner join pelanggan on topup.id_pelanggan = pelanggan.username where id_kasir='".$id."'";
    $result = $GLOBALS['mysqli']->query($sql);

    $arr = array();
    $i=0;
    while ($data = mysqli_fetch_assoc($result)) {
      $arr[$i]=$data;
      $i++;
    }

    return $arr;
  }
}

?>
