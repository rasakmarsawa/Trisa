<?php
include 'controller/session.php';
include "model/kasir.php";
include 'controller/clearSession.php';

$user = new kasir();
$session = new session();

if (isset($_POST['submit'])) {
  $data = $user->login($_POST['username'],$_POST['password']);
  if($data==false){
    header('Location:?login_fail');
  }else{
    $session->redirect('index.php');
  }
}else{
    // clearSession();
}

if ($session->check()==true) {
  $session->redirect('index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Trisha</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="images/ic_fried_rice.png">

    <!-- Styles -->
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="bg-theme">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content">
                        <div class="login-logo">
                          <span>Trisha</span>
                        </div>
                        <div class="login-form">
                              <h4>Login</h4>
                              <hr>
                            <?php if (isset($_GET['login_fail'])): ?>
                              <div class="alert alert-danger">
      												  Login Gagal, Silahkan Coba Lagi
      												</div>
                            <?php endif; ?>

                            <form method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input name="username" type="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="password" type="password" class="form-control" placeholder="Password">
                                </div>
                                <button name="submit" type="submit" class="btn btn-primary btn-flat m-b-5 m-t-5">Masuk</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
