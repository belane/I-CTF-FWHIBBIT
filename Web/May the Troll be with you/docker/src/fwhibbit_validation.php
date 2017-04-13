<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gimme Flag Game</title>

   
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/clean-blog.min.css" rel="stylesheet">


    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php


if(isset($_POST['submit'])){
	if ((empty($_POST['key1'])) || (empty($_POST['key2']))){
		echo "Both keys are required";
	} else {
		$key1 = $_POST['key1'];
		$key2 = $_POST['key2'];
		
		$items = Array("fwhibbit{trolls everywhere}","fwhibbit{try harder noob}","fwhibbit{really...?this is not the flag}","fwhibbit{keep trying}","fwhibbit{you mad bro}");
	
		if (($key1 == 'gimme0x038792') && ($key2 == 'flag0x085927')) {
			echo ' <h2 class="post-title">OOOKAYYYYYY...YOU WIN....</h2>';
            echo ' <h3 class="post-subtitle">fwhibbit{h3r3_1s_y0ur_7r0ll_fl4g}</h3>';
			echo ' <img src="img/chic.gif">'; 
			echo ' <br/><audio controls="controls" autoplay="true" loop="loop"><source src="/img/guapi.mp3" type="audio/mp3" /></audio>';
		}else {
			echo ' <h2 class="post-title">YOU LOSE AGAIN...</h2>';
            echo ' <h3 class="post-subtitle">'.$items[array_rand($items)].'</h3>';
			echo ' <img src="img/troll.gif">'; 
			echo ' <br/><audio controls="controls" autoplay="true" loop="loop"><source src="/img/troll.mp3" type="audio/mp3" /></audio>';
		}
		
	}

}

?>
<br/>
<!--<audio controls="controls" autoplay="true" loop="loop"><source src="/img/guapi.mp3"" type="audio/mp3" /></audio>-->

</body>

</html>
