<?php
  session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;
  charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="Mypage.css" />
  <title>ID送信用</title>
</head>
<body>

  <?php
    //$_SESSION["id"] = 00000001;
    //$_SESSION["id"] = 12345678;
    $_SESSION["id"] = "admin001";
   ?>

   <a href="Mypage.php">マイページへ</a>

</body>
