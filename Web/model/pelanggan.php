<?php
/**
 *
 */
class pelanggan
{
  function __construct(){}

  function getPelangganById($id){
    $sql = "select * from pelanggan where username = '".$id."' and verify_status != 2";
    $result = $GLOBALS['mysqli']->query($sql);

    if (mysqli_num_rows($result)==1) {
      $data = mysqli_fetch_assoc($result);
    }else{
      $data = null;
    }
    return $data;
  }

  function getActivity($id){
    $sql = "
    select topup.tanggal, topup.no, topup.jumlah_topup as jumlah, 'Topup' as type
      from topup where topup.id_pelanggan = '".$id."'
    union
    select pesanan.tanggal, pesanan.no, pesanan.total_harga as jumlah, 'Pesanan' as type
      from pesanan where pesanan.id_pelanggan = '".$id."'
    order by tanggal,no asc, type desc
    ";
    $result = $GLOBALS['mysqli']->query($sql);

    $arr = array();
    $i=0;
    while ($data = mysqli_fetch_assoc($result)) {
      $arr[$i]=$data;
      $i++;
    }

    return $arr;
  }

  function register($arr){
    $sql = "insert into pelanggan (username,nama_pelanggan,password,email,no_hp,saldo) values
    ('".$arr['username']."',
    '".$arr['nama_pelanggan']."',
    md5('".$arr['password']."'),
    '".$arr['email']."',
    '".$arr['no_hp']."',
    0)";

    $result = $GLOBALS['mysqli']->query($sql);

    return $result;
  }

  function login($arr){
    $sql = "select * from pelanggan where username = '".$arr['username']."' and password = md5('".$arr['password']."')";
    $result = $GLOBALS['mysqli']->query($sql);

    $data = array();
    if(mysqli_num_rows($result)==1){
      $data['found'] = true;
      $data['data'] = mysqli_fetch_assoc($result);
    }else{
      $data['found'] = false;
    }
    return $data;
  }

  function getPelangganByUsername($username){
    $sql = "select * from pelanggan where username = '".$username."'";
    $result = $GLOBALS['mysqli']->query($sql);

    $data = array();
    if(mysqli_num_rows($result)==1){
      $data['found'] = true;
      $data['data'] = mysqli_fetch_assoc($result);
    }else{
      $data['found'] = false;
    }
    return $data;
  }

  function updateToken($post){
    $this->clearToken($post);

    $sql = "update pelanggan set fcm_token = '".$post['fcm_token']."' where username = '".$post['username']."'";
    $result = $GLOBALS['mysqli']->query($sql);
    return $result;
  }

  function clearToken($post){
    $sql = "update pelanggan set fcm_token = NULL where fcm_token = '".$post['fcm_token']."'";
    $result = $GLOBALS['mysqli']->query($sql);

    return $result;
  }

  function getAllToken(){
    $sql = "select fcm_token from pelanggan where fcm_token is not null";
    $result = $GLOBALS['mysqli']->query($sql);

    $arr = array();
    $i=0;
    while ($data = mysqli_fetch_assoc($result)) {
      $arr[$i]=$data['fcm_token'];
      $i++;
    }

    return $arr;
  }

  function clearUnveryfied(){
    $sql = "delete from pelanggan where verify_status = 0 and
    request_create + interval 5 minute < current_timestamp";

    $GLOBALS['mysqli']->query($sql);
  }

  function getRequest($post){
    $sql = "select * from pelanggan where request_key = '".$post['request_key']."'
     AND request_create + interval 5 minute >= current_timestamp";
    $result = $GLOBALS['mysqli']->query($sql);

    $data = array();
    $data['found'] = false;
    if(mysqli_num_rows($result)==1){
      $data['found'] = true;
      $data['data'] = mysqli_fetch_assoc($result);
    }
    return $data;
  }

  function verifyAccount($post){
    $sql = "update pelanggan set verify_status = 1, request_key = NULL,
    request_type = NULL, request_create = NULL where username = '".$post['username']."'";

    $result = $GLOBALS['mysqli']->query($sql);

    return $result;
  }

  function makeRequest($post,$request_type){

    $this->clearExpiredRequest();

    $sql = "update pelanggan set
    request_create = current_timestamp,
    request_type = '".$request_type."',
    request_key = MD5(CONCAT('".$post['username']."',current_timestamp))
    where username = '".$post['username']."'
    and email = '".$post['email']."'
    and verify_status = 1";

    $GLOBALS['mysqli']->query($sql);

    $result = false;
    if (mysqli_affected_rows($GLOBALS['mysqli'])==1) {
      $result = true;
    }

    return $result;
  }

  function changePassword($post){
    $sql = "update pelanggan set password = md5('".$post['password']."') where
    username = '".$post['username']."'";

    $GLOBALS['mysqli']->query($sql);

    $result = false;
    if (mysqli_affected_rows($GLOBALS['mysqli'])==1) {
      $result = true;
    }

    return $result;
  }

  function clearExpiredRequest(){
    $sql = "update pelanggan
    set
      request_create = null,
      request_type = null,
      request_key = null
    where
      request_create + interval 5 minute < getNow() and
      verify_status = 1
    ";

    $GLOBALS['mysqli']->query($sql);

    $result = false;
    if (mysqli_affected_rows($GLOBALS['mysqli'])!=0) {
      $result = true;
    }

    return $result;
  }
}

?>
