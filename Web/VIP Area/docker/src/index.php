<?php
class User {
	public $user = '';
	public $pass = '';
}

function set_cookie($login) {
  $expire = time() + 7200;
  $cookie_auth = base64_encode(serialize($login));
  $cookie_check = base64_encode(md5($cookie_auth));
  unset($_COOKIE['auth']);
  unset($_COOKIE['check']);
  setcookie('auth', $cookie_auth, $expire, '/');
  setcookie('check', $cookie_check, $expire, '/');
}

function get_credentials() {
  $login=null;
  if (isset($_COOKIE['auth']) && isset($_COOKIE['check'])) {
    if(md5($_COOKIE['auth']) === base64_decode($_COOKIE['check'])) {
      $login = unserialize(base64_decode($_COOKIE['auth']));
    }
    else {
      //echo "Bad check";
    }
  }
  elseif (isset($_POST['user'])) {
    $login=new User();
    $login->user=$_POST['user'];
    $login->pass=$_POST['pass'];
  }
  return $login;
}

if(isset($_GET['logout'])) {
	setcookie('auth', '', time()-7000000, '/');
  setcookie('check', '', time()-7000000, '/');
}
else {
	$login = new User();
	$login = get_credentials();
}
?>
<!-- header -->
<!DOCTYPE html>
<html lang="en"><head><title>VIP Area</title></head><body>
<link href="bootstrap.min.css" rel="stylesheet">
<link href="clean-blog.min.css" rel="stylesheet">
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
<div class="container-fluid"><ul class="nav navbar-nav navbar-right"><li><a href="index.php">Home</a></li></ul></div></nav>
<!-- banner -->
<header class="intro-header" style="background-image: url('rabbit_dark.jpg')">
<div class="container"><div class="page-heading" align="left">
<h1>VIP ZONE</h1><hr class="small"><span class="subheading">Restricted area for elite rabbits</span>
</div></div></header>

<?php
if (isset($login) && $login->user === "guest" && $login->pass == "guest") {
  set_cookie($login);
?>
<!-- guest -->
<div class="container"><div class="row"><div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
<p><h3>Guest account</h3></br>Nothing here, try admin account better.</p>
<p><a href="index.php?logout">Logout</a></p>
</div></div><hr></div>

<?php
}
elseif (isset($login) && $login->user === "admin" && $login->pass == "gv(QnX6b#Rc_yuTM@FH") {
  set_cookie($login);
?>
<!-- admin -->
<div class="container"><div class="row"><div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
<p><h3>Admin account</h3><h4>fwhibbit{bAdc0d1n6_PHP}</h4></p>
<p><a href="index.php?logout">Logout</a></p>
</div></div><hr></div>

<?php
}
else {
?>
<!-- form -->
<div class="container"><div class="row"><div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
 <div class="caption text-muted"> guest:guest account enabled </div></br>
<form action="index.php" method="POST">
<div class="row control-group"><div class="form-group col-xs-12 floating-label-form-group controls">
<label>User</label>
<input type="text" class="form-control" placeholder="user" name="user" id="user" required data-validation-required-message="Please enter your user name.">
</div></div><div class="row control-group">
<div class="form-group col-xs-12 floating-label-form-group controls">
<label>Password</label>
<input type="password" class="form-control" placeholder="password" name="pass" id="pass" required data-validation-required-message="Please enter your password.">
</div></div><div class="row"><div class="form-group col-xs-12">
</br><button type="submit" class="btn btn-default" name="submit">Login</button>
</div></div></form></div></div><hr></div>
<?php
	}
?>

<!-- footer -->
<footer><div class="container"><p class="caption text-muted">Copyleft &copy; rAbbits 2017</p></div></footer>
</body></html>
