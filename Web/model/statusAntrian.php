<?php
/**
 *
 */
class statusAntrian
{

  function __construct(){}

  function getLastStatus(){
    $sql = "
      SELECT *
      FROM status_antrian
      WHERE tanggal = (
          SELECT MAX(tanggal)
          FROM status_antrian
          WHERE tanggal + INTERVAL 28 HOUR >= getNOW()
      	)
      AND no = (
          SELECT MAX(no)
          FROM status_antrian
          WHERE tanggal = (
              SELECT MAX(tanggal)
              FROM status_antrian
              WHERE tanggal + INTERVAL 28 HOUR >= getNOW()
          	)
      	)
    ";
    $result = $GLOBALS['mysqli']->query($sql);

    if (mysqli_num_rows($result)==1) {
      $data = mysqli_fetch_assoc($result);
    }else{
      $data = array('status'=>'2');
    }
    return $data;
  }

  function statusMeaning($status){
    switch ($status) {
      case '1':
        return 'Buka';
        break;
      default:
        return 'Tutup';
        break;
    }
  }

  function updateStatus($status,$id_kasir){
    $sql = "insert into status_antrian (status,id_kasir) values (".$status.",'".$id_kasir."')";
    $result = $GLOBALS['mysqli']->query($sql);

    return $result;
  }

  function api_getLastStatus(){
    $data = $this->getLastStatus();
    return $data;
  }
}

 ?>
