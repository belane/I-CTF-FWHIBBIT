<?php
session_start();

// Inicialización
$USE_RECAPTCHA=false;
$FLAG='';
$INFO='';
$TIME=30;

// Incluir core del reto
$page='';
$reto=0;

$sub=explode('.',$_SERVER['HTTP_HOST']);
$sub=array_shift($sub);

if($sub=='dev1') $_GET['reto']=1;
if($sub=='dev2') $_GET['reto']=2;
if($sub=='dev3') $_GET['reto']=3;

if(isset($_GET['reto']) && is_numeric($_GET['reto']))
  switch($_GET['reto'])
  {
    case '1':
    case '2':
    case '3': $reto=$_GET['reto']; $page='reto'.$_GET['reto'].'.php'; break;
  }

if($page=='') die();
require_once($page);

if($USE_RECAPTCHA)
	{
	require_once(__DIR__ . '/autoload.php');

	$secretKey='6LfTBQ8UAAAAAKFjvIoDiXM66qdKc01EkmTqtMj5';
	$siteKey='6LfTBQ8UAAAAAFWq_B7D_4OzQZdxyh-QhkjLoZNc';
	$recaptcha = new \ReCaptcha\ReCaptcha($secretKey);
	}

$error='';
// Comprobar solución
if (isset($_SESSION['s'.$reto]) && isset($_SESSION['t'.$reto]) && isset($_POST['solution']) && $_POST['solution']!=='')
{
	// Hay solución
	$time=time()-$_SESSION['t'.$reto];

	if($time<=$TIME)
	{
		if(isset($recaptcha))
		{
			$resp = $recaptcha->verify(isset($_POST['g-recaptcha-response'])?$_POST['g-recaptcha-response']:'',$_SERVER['REMOTE_ADDR']);
			if (!$resp->isSuccess())
			{
				$error='Bad captcha!';
			}
		}
		if($error=='')
		{
			// Ok
			$_POST['solution']=strtolower($_POST['solution']);
			if(CheckSolution($_SESSION['s'.$reto],$_POST['solution']))
			{
				// FLAG
				$error=$FLAG;
			}
			else
			{
				$error='Bad input! next try!';
			}
		}
	}
	else
	{
		// Tiempo excedido
		$error='Time exceded! dont cheat me!';
	}
}

// Sesion con solución
$randomValue=rand();
$answer='';

if($error!='')
{
	$TIME=0;
	$INFO=htmlentities($error);
	if($error===$FLAG)
		{
		$INFO="<div class='data alert alert-success'>".
			"<strong>Success!<br></strong>".$error."</div>";
		$ret='<img width=320 height=180 src="img/ok.gif">';
		}
	else
		{
		$INFO="<div class='data alert alert-danger'>".
			"<strong>Error!<br></strong>".$error."</div>";

		$ret='';
		if(function_exists('FailSolution') && isset($_SESSION['s'.$reto]) && isset($_POST['solution']))
			$ret.=FailSolution($_SESSION['s'.$reto],$_POST['solution']);

		if($ret=='') $ret.='<img width=320 height=180 src="img/error.gif">';
		}
}
else
{
	$ret=GetRandomHtml($randomValue,$answer);
	//$INFO=htmlentities($INFO);
}

$_SESSION['s'.$reto]=strtolower($answer);
$_SESSION['t'.$reto]=time();

// HTML
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="./css/bootstrap.css" />
	<link rel="stylesheet" href="./css/style.css" />

<meta name="viewport" content="width=1024, user-scalable=no">
</head>
<body><br><br>
	<div class="container">
		<div class="row">
			<p class="info"><?php echo str_replace("\n","<br>",$INFO); ?></p>
			<div class="data"><?php echo $ret; ?></div>
		</div>
	</div>
	<div class="container">
		<div class="row" id="countryside">
			<div class="col" id="containerRabbit">
				<img src="./img/conejo.png" id="bugsBunny">
			</div>
			<div class="col" id="containerCarrot">
				<img src="./img/zanahoria.gif" id="carrot">
			</div>
		</div>
		<form action="index.php?reto=<?php echo $reto; ?>" method="POST" id="sol">
    	<div class="form-group row">
		<input autofocus type="text" class="form-control" placeholder="Solution" id="solution" name="solution" value="<?php echo isset($_POST['solution'])?htmlspecialchars($_POST['solution'], ENT_QUOTES, 'UTF-8'):''; ?>">
					<input class="form-control" id="timer" type="text" readonly>
<?php
if(isset($recaptcha) && $error=='')
{
?>
					<button class="g-recaptcha btn btn-primary" data-sitekey="<?php echo $siteKey; ?>" data-callback='onSubmit'>Send</button>
<?php } else { ?>
  					<button type="submit" class="btn btn-primary" id="send">Send</button>
<?php } ?>
					<button type="button" class="btn btn-warning" id="reload">Reload</button>
			</div>
<?php
if(isset($recaptcha) && $error=='')
{
?>
     <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=en"></script>
<script>
     var onSubmit = function(token) {
       document.getElementById("sol").submit();
     }
     </script>
<?php } ?>
		</form>
	</div>

	<script src="./js/jquery-3.1.1.min.js"></script>
	<script>
	var time         = <?php echo $TIME; ?>;
var move         = 25;
var totalPercent = 80;
var position     = 0;
var x=0; //imagen a mostrar
var speed        = 1000*time/move;
var next         = totalPercent/move;
$('#timer').val(time);

if (time>0)
{
	timer = setInterval( function(){
	  if(time<=0){
	    endRun();
	  }
	  time-=1;
	  if(time<0)return;
	  $('#timer').val(time);
	},1000);
	timer

	run = setInterval( function(){
	  $('#containerRabbit').css('padding-left',position+'%');
	  if(x==0){
	    $("#bugsBunny").attr("src","./img/conejo.png");
	    x=1;
	  }
	  else{
	    $("#bugsBunny").attr("src","./img/conejo1.png");
	    x=0;
	  }

	  if(position>=totalPercent){
	    endRun();
	  }
	  position+=next;

	},speed);
}
else
{
	run=undefined;
	timer=undefined;
	endRun();
}

function endRun(){
  if(run!=undefined) clearInterval(run);
  if(timer!=undefined)   clearInterval(timer);
  $('#carrot').remove();
  $("#bugsBunny").remove();
  $("#containerCarrot").html('<img src="./img/fin.png" id="finish">');
  $("#solution").prop("disabled","disabled");
  $("#send").remove();
  $("#reload").show();
  $("#reload").click(e=>(

        window.location.href='index.php?reto=<?php echo $reto; ?>'
  ));
}
	</script>
</body>
</html>
