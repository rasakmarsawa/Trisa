<?php
/**
 *
 */
class kasir
{

  function __construct(){}

  function login($username,$password){
    $sql = "select * from kasir where username = '".$username."' and password = md5('".$password."')";
    $result = $GLOBALS['mysqli']->query($sql);

    if(mysqli_num_rows($result)==1){
      $_SESSION = mysqli_fetch_assoc($result);
      $data = true;
    }else{
      $data = false;
    }
    $GLOBALS['mysqli']->close();

    return $data;
  }

  function getKasir(){
    $sql = "select * from kasir";
    $result = $GLOBALS['mysqli']->query($sql);

    $arr = array();
    $i=0;
    while ($data = mysqli_fetch_assoc($result)) {
      $arr[$i]=$data;
      $i++;
    }

    return $arr;
  }

  function addKasir($post){
    $sql = "insert into kasir (username,nama_kasir,password,admin) values (
      '".$post['username']."',
      '".$post['nama_kasir']."',
      md5('".$post['password']."'),
      ".$post['admin']."
      )";
    $result = $GLOBALS['mysqli']->query($sql);

    return $result;
  }

  function getKasirById($id){
    $sql = "select * from kasir where username = '".$id."'";
    $result = $GLOBALS['mysqli']->query($sql);

    if (mysqli_num_rows($result)==1) {
      $data = mysqli_fetch_assoc($result);
    }else{
      $data = null;
    }

    return $data;
  }

  function deleteKasirById($id){
    $sql = "delete from kasir where username='".$id."'";
    $result = $GLOBALS['mysqli']->query($sql);

    return $result;
  }

  function updateKasir($post){
    $sql = "update kasir set
    nama_kasir='".$post['nama_kasir']."' ,";

    if($post['password']!=''){
        $sql = $sql."password=md5('".$post['password']."'),";
    }

    $sql = $sql."
    admin=".$post['admin']."
    where
    username='".$post['username']."'";
    $result = $GLOBALS['mysqli']->query($sql);

    return $result;
  }
}

?>
