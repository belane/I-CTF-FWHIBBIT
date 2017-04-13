<html> <head>
  <style>
    body {
      background-color:black;
      color:green;
    }
    </style>
  </head>
  <body>
    <center>
      <h1>Admin Zone - Secret</h1>
      <img src="http://i.imgur.com/2lprU.gif"/>
      <!-- Remember, credentials is the name of this file without extension -->
      <br/></br>
<?php
$FAKE_DATABASE = array ( "admin" => "21232f297a57a5a743894a0e4a801fc3", );
$page = $_GET['page'];
switch ($page) {
  case "login":
  echo "Trying to log in";
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  if ($FAKE_DATABASE[$user] === md5($pass)) {
    session_start();
    session_regenerate_id(True);
    $_SESSION['user'] = $user;
    header("Location: ?page=upload");
    die();
  }
  else {
    header("Location: ?");
  }
  break;
  case "admin_login_help":
  session_start();
  if(!isset($_SESSION['login_code']) ){
    $_SESSION['login_code'] = bin2hex(openssl_random_pseudo_bytes(18));
    echo "";
  }
  else {
    echo "";
  }
  break;
  case "code_submit":
  session_start();
  $code = $_POST['code'];
  if (isset($code) && isset($_SESSION['login_code'])) {
    if ($code === $_SESSION['login_code'] ){
      echo "Flag: ";
      passthru("sudo /bin/cat /etc/flag");
    }
    else {
      echo "Invalid code";
    }
  }
  else {
    echo "<form action='?page=code_submit' method='POST'>Please input the login code:<input name='code'/><input type='submit' value='submit'/></form>";
  }
  break;
  case "upload":
  session_start();
  if (!isset($_SESSION['user'])) {
    header("Location: ?");
  }
  else {
    echo "Welcome ".$_SESSION['user'] ." <button onclick='document.cookie=\"PHPSESSID=deleted\";location=\"?\"'>Logout</button>";
    echo "Use this form to verify zip integrity. Our flag is in /etc/flag
          <form action='?page=process_upload' method='post' enctype='multipart/form-data'><input type='file' name='zipfile'/>
          <input type='submit' name='submit' value='Upload'/></form>";
    }
    break;
    case "process_upload":
    session_start();
    if (isset($_SESSION['user']) && $_FILES['zipfile']['name']) {
      if ($_FILES['zipfile']['size'] > 16000) {
        echo "File above max size of 10kb";
        echo "<a href='?page=upload'>back</a>";
        break;
      }
      $tmp_file = '/var/www/html/tmp/upload_'.session_id();
      exec('unzip -o '.$_FILES['zipfile']['tmp_name']. ' -d '.$tmp_file);
      echo "Zip contents:";
      passthru("cat $tmp_file/* 2>&1");
      exec("rm -rf $tmp_file");
      echo "<a href='?page=upload'>back</a>";
    }

    break;
    default:

    echo "<form action='?page=login' method='POST'>Username: <input name='user'/>
      Password: <input type='password' name='pass'/>
      <input type='submit' value='Log in'/></form>";
    }
?>
    </center>
  </body>
</html>
