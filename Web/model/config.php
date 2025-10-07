<?php
/**
 *
 */
class config
{

  function __construct(){}

  function changeConfig($key, $value){
    $sql = "
    update `config`
    set `value` = '".$value."'
    where `key` = '".$key."'
    ";
    $GLOBALS['mysqli']->query($sql);

    $result = array();
    if (mysqli_affected_rows($GLOBALS['mysqli'])==1) {
      $result['status'] = true;
      $result['message'] = 'config change success';
    }else{
      $result['status'] = false;
      $result['message'] = 'config change fail';
    }

    return $result;
  }

  function getConfig($key){
    $sql = "
    select `value`
    from `config`
    where `key` = '".$key."'
    ";

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
