<?php

function pushEmail($email, $request_type, $request_key){
  // $to = "somebody@example.com, somebodyelse@example.com";
  switch ($request_type) {
    case 'REG':
      $subject = "Email verification";
      $message = "<p> Kode verifikasi mu adalah : \n".$request_key."</p>";
      break;

    case 'FPW':
      $subject = "Forgot Password Request";
      $message = "<p> Kode verifikasi mu adalah : \n".$request_key."</p>";
      break;

    default:
      $subject = "Unknown Subject";
      $message = "Unknown Message";
      break;
  }

  // Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  // More headers
  $headers .= 'From: <support_trisha@onlinetrisha.000webhostapp.com>' . "\r\n";
  // $headers .= 'Cc: myboss@example.com' . "\r\n";

  mail($email,$subject,$message,$headers);
}

?>
