<?php

function pushNotification($count_to ,$to, $title, $msg, $type ,$data, $action){
  $url = 'https://fcm.googleapis.com/fcm/send';
  $apikey = 'AAAAxtmVDpE:APA91bGWra8XUsqkUl_al0xPEG-ME3F2gSVrQnlyNARjq9LuMmBP6k5fMynbURKKBSg04DB-yA3ZhBAuz4sP3pErKDFRaeEIwle6S8RtyOBtatOwG9gqQmh0_mHZhJnovjffloveoiEl';

  $header = array(
    'Authorization:key='.$apikey,
    'Content-Type:application/json'
  );

  $notifdata = [
    'title' => $title,
    'body' => $msg
  ];

  if ($action!=NULL) {
    $notifdata['click_action'] = $action;
  }

  $x = [
    'type' => $type,
    'data' => $data
  ];

  $notifbody = [
    'notification' => $notifdata,
    'data' => $x,
  ];

  if ($count_to==1) {
      $notifbody["to"] = $to;
  }else{
      $notifbody["registration_ids"] = $to;
  }

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($notifbody));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

  $result = curl_exec($ch);
  curl_close($ch);
}
?>
