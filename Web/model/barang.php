<?php
/**
 *
 */
class barang
{

  function __construct(){

  }

  function addBarang($nama,$harga,$type){
    $sql = "insert into barang (nama_barang,harga,type) values ('".$nama."',".$harga.",'".$type."')";
    $result = $GLOBALS['mysqli']->query($sql);

    return $result;
  }

  function getBarang(){
    $sql = "select * from barang order by nama_barang desc";
    $result = $GLOBALS['mysqli']->query($sql);

    $arr = array();
    $i=0;
    while ($data = mysqli_fetch_assoc($result)) {
      $arr[$i]=$data;
      $i++;
    }

    return $arr;
  }

  function getBarangById($id){
    $sql = "select * from barang where id_barang = ".$id;
    $result = $GLOBALS['mysqli']->query($sql);

    if (mysqli_num_rows($result)==1) {
      $data = mysqli_fetch_assoc($result);
    }else{
      $data = null;
    }

    return $data;
  }

  function deleteBarangById($id){
    $sql = "delete from barang where id_barang=".$id;
    $result = $GLOBALS['mysqli']->query($sql);

    return $result;
  }

  function updateBarang($post){

    $sql = "update barang set nama_barang='".$post['nama_barang']."' , harga=".$post['harga'];
    if ($post['type']!=NULL) {
      $sql .= ", type = '".$post['type']."'";
    }
    $sql .= " where id_barang=".$post['id'];
    $result = $GLOBALS['mysqli']->query($sql);

    return $result;
  }

  function getDetailBarang($id){
    $sql = "select * from barang inner join detail_pesanan on detail_pesanan.id_barang = barang.id_barang inner join pesanan on pesanan.tanggal = detail_pesanan.tanggal and pesanan.no = detail_pesanan.no inner join pelanggan on pesanan.id_pelanggan = pelanggan.username where pesanan.status = 4 and barang.id_barang = ".$id;

    $result = $GLOBALS['mysqli']->query($sql);

    $arr = array();
    $i=0;
    while ($data = mysqli_fetch_assoc($result)) {
      $arr[$i]=$data;
      $i++;
    }

    return $arr;
  }

  function api_getBarang(){
    $data = $this->getBarang();
    $result = array();

    if (count($data)!=0) {
      $result['empty']=false;
      $result['data']=$data;
    }else{
      $result['empty']=true;
    }

    return $result;
  }

  function getLastId(){
    $sql = "select * from barang where id_barang = (select max(id_barang) from barang)";
    $result = $GLOBALS['mysqli']->query($sql);

    if (mysqli_num_rows($result)==1) {
      $data = mysqli_fetch_assoc($result);
    }else{
      $data = null;
    }

    return $data;
  }
}

?>
