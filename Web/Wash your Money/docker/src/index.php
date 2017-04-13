<?php
error_reporting(0);
header('Cache-Control: no-cache, must-revalidate');
$page=isset($_GET['page']) && is_string($_GET['page']) && $_GET['page']!='' ?$_GET['page']:'home';
$page=$page.'.php';
$ar=array(
//	'file',
	'http',
//	'https',
	'ftp',
//	'ftps',
//	'compress.zlib',
	'php',
	'data',
	'glob',
//	'phar',
	);

//print_r(stream_get_wrappers());
foreach($ar as $k) stream_wrapper_unregister($k);
//print_r(stream_get_wrappers());

if(strpos(strtolower($page),"file:")!==false)
	$page='home';
?>
<!-- header -->
<!DOCTYPE html>
<html lang="en"><head><title>Laundry Service</title></head><body>
<link href="bootstrap.min.css" rel="stylesheet">
<link href="clean-blog.min.css" rel="stylesheet">
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
<div class="container-fluid"><ul class="nav navbar-nav navbar-right">
<li><a href="home">Home</a></li>
<li><a href="contact">Contact</a></li>
<li><a href="upload">Upload</a></li></ul></div></nav>
<!-- banner -->
<header class="intro-header" style="background-image: url('rabbit_dark.jpg')">
<div class="container"><div class="page-heading" align="left">
<h1>Laundry Service</h1><hr class="small"><span class="subheading">Rabbit Exchange</span>
</div></div></header>
</br>
<div class="container"><div class="row"><div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
<!-- section start -->
<?php
if($page!='') include_once($page);
?>
<!-- section end -->
</div></div><hr></div>
<!-- footer -->
<footer><div class="container"><p class="caption text-muted">Copyleft &copy; rAbbits 2017</p></div></footer>
</body></html>
