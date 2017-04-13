<?php
$FLAG='fwhibbit{Qr_1s_y0ur_Fr1end}';
$INFO="Hi hacker!\n\nThe rabbit boss of the rival burrow has sent a QR-encrypted message.\nDecode and get a hash in SHA1, introduce it before the rabbit eats the carrot and you will get your precious flags";
$TIME=4;

    //
    // Morse Convertor v1.0 by Edwin Groothuis (edwin@mavetju.org)
    //
    // If you didn't get this file via http://www.mavetju.org, please
    // check for the availability of newer versions.
    //
    // See LICENSE for distribution issues. If this file isn't in
    // the distribution, please inform me about it.
    //
    // Feel free to use this yourself.
    //

    $lettertomorse=array();
    $lettertomorse["a"]=".-";
    $lettertomorse["b"]="-...";
    $lettertomorse["c"]="-.-.";
    $lettertomorse["d"]="-..";
    $lettertomorse["e"]=".";
    $lettertomorse["f"]="..-.";
    $lettertomorse["g"]="--.";
    $lettertomorse["h"]="....";
    $lettertomorse["i"]="..";
    $lettertomorse["j"]=".---";
    $lettertomorse["k"]=".-.";
    $lettertomorse["l"]=".-..";
    $lettertomorse["m"]="--";
    $lettertomorse["n"]="-.";
    $lettertomorse["o"]="---";
    $lettertomorse["p"]=".--.";
    $lettertomorse["q"]="--.-";
    $lettertomorse["r"]=".-.";
    $lettertomorse["s"]="...";
    $lettertomorse["t"]="-";
    $lettertomorse["u"]="..-";
    $lettertomorse["v"]="...-";
    $lettertomorse["w"]=".--";
    $lettertomorse["x"]="-..-";
    $lettertomorse["y"]="-.--";
    $lettertomorse["z"]="--..";
    $lettertomorse["1"]=".----";
    $lettertomorse["2"]="..---";
    $lettertomorse["3"]="...--";
    $lettertomorse["4"]="....-";
    $lettertomorse["5"]=".....";
    $lettertomorse["6"]="-....";
    $lettertomorse["7"]="--...";
    $lettertomorse["8"]="---..";
    $lettertomorse["9"]="----.";
    $lettertomorse["0"]="-----";
    $lettertomorse[" "]="   ";
    $lettertomorse["."]=".-.-.-";
    $lettertomorse[","]="--..--";
    $lettertomorse["EOM"]=".-.-.";

    $morsetoletter=array();
    reset($lettertomorse);
    while (list($letter,$code)=each($lettertomorse)) {
	$morsetoletter[$code]=$letter;
    }

    function morse_encode($txt) {
	global $lettertomorse;

	$line="";
	for ($i=0;$i<strlen($txt);$i++) {
	    $letter=substr($txt,$i,1);

	    // ignore unknown characters
	    if ($lettertomorse[$letter]=="") continue;

	    $line.=$lettertomorse[$letter]." ";
	}
	return $line;
    }

    function morse_decode($string) {
	global $morsetoletter;

	$line="";
	$letters=array();
	$letters=explode(" ",$string);
	foreach ($letters as $letter) {
	    // ignore unknown characters
	    if ($letter=="") $line.=" ";
	    if ($morsetoletter[$letter]=="") continue;

	    $line.=$morsetoletter[$letter];
	}
	return $line;
    }
function CheckSolution($answer,$candidate)
{
	return $answer===$candidate;
}
// Get Random html
function GetRandomHtml($randomValue,&$answer)
{
	// Generate QR
	$answer=strtolower(sha1('#FollowTheRabbit#1#'.$randomValue.'#FollowTheRabbit#'));

	$img=$answer;
	// Morse
	$img=morse_encode($img);

	// Qr
	$url='https://chart.googleapis.com/chart?chs=320x320&cht=qr&chl='.urlencode ($img);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$data = curl_exec($ch);
	curl_close($ch);

	// Invert
	$img=imagecreatefromstring($data);
	imagefilter($img,IMG_FILTER_NEGATE);

	ob_start();
	imagepng($img);
	$data =  ob_get_contents();
	ob_end_clean();
	imagedestroy($img);

	return '<img src="data:image/png;base64,'.base64_encode($data).'">';
}
