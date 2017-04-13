<!DOCTYPE html>
<html lang="en">

<head>
<!-- Login Formulary, lets try something... -->
<!--
 * I hate medicins
 * Key? = --------
 *
-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gimme Flag - Login</title>


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


    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">

            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">Gimme Flag Challenge</a>
            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="about.html">About us</a>
                    </li>
                    <li>
                        <a href="post.html">Troll Gimme</a>
                    </li>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                </ul>
            </div>

        </div>

    </nav>

<!-- No more needles -->
    <header class="intro-header" style="background-image: url('img/rabbit_dark.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading" align="left">
                        <h1>LOGIN</h1>
                        <hr class="small">
                        <span class="subheading">Forgot your password? Good Luck!</span>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p></p>
                <form action="login.php" method="POST">
                    <div class="row control-group">
						<?php

						if (isset($_POST['submit'])){
							if ((strpos($_POST['name'],"'") !== false) || (strpos($_POST['pass'], "'") !== false)){
								echo "<span>You don't have any error in your SQL syntax; do not check the manual that corresponds to your MySQL server version for the right syntax to use near '\' at line 1</span>";
							}
							else{
								echo "<div class='alert alert-danger'><span>User or password incorrect</span></div>";
							}
						}
						?>
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>User</label>
                            <input type="text" class="form-control" placeholder="user" name="name" required data-validation-required-message="Please enter your user name.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="password" name="pass" required data-validation-required-message="Please enter your password.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-default" name="submit">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <hr>

<!-- Awesome container -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyleft &copy; fwhibbit 2017</p>
                </div>
            </div>
        </div>
    </footer>

<!-- fwhibbit{not that easy hahah, keep trying}-->
    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <script src="js/clean-blog.min.js"></script>

</body>

</html>
