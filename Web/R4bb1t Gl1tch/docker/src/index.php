<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fwhibbit Web Hacking</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
	<link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
	<div class="container">
		<div class="row">
			<div class="page">
				<header id="header">
					<ul class="nav nav-tabs" role="tablist">
						<div class="">
							<center>
								<img width="50%" src="brab.jpg" alt="" class="img-responsive">
							</center>
							<div class="profile_name">
								<div class="author_name">
									<div class="profile_inner">
										 <!-- XML 1s aw3s0m3 -->
  										 <!-- We need the flag inside the file /etc/passwd -->
  										<?php
											error_reporting(0);
											libxml_disable_entity_loader (false);
											$xmlfile = file_get_contents('php://input');
											$dom = new DOMDocument();
											$dom->loadXML($xmlfile, LIBXML_NOENT | LIBXML_DTDLOAD); // this stuff is required to make sure
											$creds = simplexml_import_dom($dom);
											$user = $creds->user;
											$pass = $creds->pass;
										?>
<a><div class="name">Hello, your user is:</div></a>
										<?php
											if ($user == ""){
											  $user = "No user recived";
											}
											echo "<div class='pos'> Welcome, your user is: $user</div>";
										?>

									</div>
								</div>
							</div>
						</div>
					</ul>
				</header>
			</div>
		</div>
	</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/fancybox/jquery.fancybox.pack.js"></script>
	<script src="js/functions.js"></script>
    <script src="contactform/contactform.js"></script>
</body>
</html>
