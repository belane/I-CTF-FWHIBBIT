<?php
$FLAG='fwhibbit{I_L0v3_Brut3F0rc3}';
$INFO="Hi hacker!\n\nThis time we have intercepted the list of passwords and the salt used by our rabbit. Help us to decipher these hashes before the rabbit eats the carrot and you will be rewarded with a precious and juicy Flag.\n\nDownload the wordlist <a target='_blank' href='https://mega.nz/#!ptdBXCqa!I8N6SyGnfOy3tHejR4ud92K5ivnwe4awNgdk1-xUHbw'>here</a> and enter the passwords separated by '|'";
$TIME=50;
$USE_RECAPTCHA=true;

function CheckSolution($answer,$candidate)
{
	$answer=json_decode($answer);
	$candidate=explode('|',$candidate);
	for($x=count($candidate)-1;$x>=0;$x--)
		{
		for($y=count($answer)-1;$y>=0;$y--)
			if($answer[$y]===$candidate[$x])
				{
				unset($answer[$y]);
				break;
				}
		}
	return count($answer)===0;
}
// Get Random html
function randomString(&$handle,&$size)
{
	fseek($handle,mt_rand(0, $size-100),SEEK_SET);
	$line = fgets($handle);
	$line = fgets($handle);
	return trim($line);
}
function GetRandomHtml($randomValue,&$answer)
{
	$names = array( 'Christopher','Ryan','Matrix','Ethan','Follow','John','Zoey','Sarah','Michelle','Samantha','Rabbit');
	$surnames = array( 'Walker','Thompson','Tremblay','Neo','Johnson','Peltier','Cunningham','Simpson','Mercado','Sellers','White');
	$pref = array( '#','*','.',':','-','$');
	$method = array( 'md5','sha1','sha256','sha512');
	
	$random_name = $pref[mt_rand(0, sizeof($pref) - 1)];
	$random_name = $random_name.($names[mt_rand(0, sizeof($names) - 1)]).($surnames[mt_rand(0, sizeof($surnames) - 1)]).$random_name;
	$left=mt_rand(0,1)==1;

	$answer=array();
	$table='<br><br>';

	$handle = fopen('reto3.wordlist.txt', "r");
	if (!$handle) return '';
	$handleSize=filesize('reto3.wordlist.txt');
	
	for($x=0;$x<10;$x++) 
		{	
		for($y=0;$y<1;$y++) 
			{
			$val=randomString($handle,$handleSize);

			$answer[]=$val;
			$val=$left?$random_name.$val:$val.$random_name;
			$val=hash($method[mt_rand(0, sizeof($method) - 1)],$val,false);
			$table.=$val.'<br>';
			}
		}

    	fclose($handle);

	$answer=json_encode($answer);

	return ($left?'HashFunction(<span style="color:blue">"'.htmlentities($random_name).'"</span>+<b>Password</b>)':'HashFunction(<b>Password</b>+<span style="color:blue">"'.htmlentities($random_name).'"</span>)').$table;
}


