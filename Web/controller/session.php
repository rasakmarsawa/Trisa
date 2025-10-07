<?php
include 'connection.php';
session_start();
/**
 *
 */
class session
{

  function __construct()
  {
    // code...
  }

  function check(){
    if(isset($_SESSION['username'])){
      $result = true;
    }else{
      $result = false;
    }

    return $result;
  }

  function checkAdmin(){
    if($this->check()==true){
      if($_SESSION['admin']==1){
        $result = true;
      }else{
        $result = false;
      }
      return $result;
    }
  }

  function redirect($page){
      header('Location:'.$page);
  }

  function emptyCheck($arr,$exception){
    $check = true;
    foreach ($arr as $key => $value) {
      if ($value=='' && !in_array($key,$exception)) {
        $check = false;
      }
    }
    return $check;
  }
}

?>
