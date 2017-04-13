<?php
$FLAG='fwhibbit{M4z3_S0lv3d_by_Sm4rt_R4bb1t}';
$INFO="Hi hacker! This time our rabbit is lost and he is looking for his carrot, so you must help him.
In order to scape from the laberinth you have to submit the whole string of movements the rabbit needs to make to reach his goal, following the pattern:\n\nL=Left - R=Right - D=Down - U=Up (Example: DDRULLUDR)\n\nHurry up and do it before the carrot gets rotten!";
$TIME=30;

$USE_RECAPTCHA=true;
$maze_width = 50;
$maze_height = 18;
$check_maze=null;

function CheckSolution($answer,$candidate)
{
	if($answer==NULL || $answer=='') return false;
	global $check_maze;
	$check_maze=json_decode($answer);

	return IsValidSolution($check_maze,$candidate);
}
function FailSolution($answer,$query)
{
	global $check_maze;
	if($check_maze==NULL) return '';
	return DrawMaze($check_maze).'<br><br>';
}
function IsValidSolution(&$maze,$query)
{
  $x=0; $y=1;
  $query=strtoupper($query);
  $m=strlen($query);

  for($i=0;$i<$m;$i++)
  {
    $c=substr($query,$i,1);

    $paso=0;
    switch($c)
    {
      case 'L': $y--; $paso=10; break;
      case 'R': $y++; $paso=11; break;
      case 'U': $x--; $paso=12; break;
      case 'D': $x++; $paso=13; break;
    }
    // Movimiento
    if($paso==0) continue;
    // Límites
    if($x<0 || $y<0) return false;

    if(!isset($maze[$x][$y])) return false;
    // Avanza
    switch($maze[$x][$y])
    {
      case 0: $maze[$x][$y]=$paso; break;
      case 1:
      case 2: $maze[$x][$y]=20; return false;
      case 3: return true;
    }
  }

  return false;
}
// Draw
function DrawMaze(&$maze)
{
	global $maze_width,$maze_height;
	$width = 2*$maze_width+1;
	$height = 2*$maze_height+1;
	$ret='<span style="font-family:Courier New;font-size:14px !important;display:inline-block !important;line-height:9px !important">';

for($x=0;$x<$height;$x++){
     for($y=0;$y<$width;$y++)
     {
          $val=$maze[$x][$y];
          switch($val)
          {
            case 10:$ret.= "<font style='color:blue'>◄</font>";break;
            case 11:$ret.= "<font style='color:blue'>►</font>";break;
            case 12:$ret.= "<font style='color:blue'>▲</font>";break;
            case 13:$ret.= "<font style='color:blue'>▼</font>";break;
            case 20:$ret.= "<font style='color:red'>■</font>";break;
            case 0:$ret.= "&nbsp;";break;
            case 1:$ret.= "■";break;
            case 2:$ret.= "<font style='color:blue'>☺</font>";break;
            case 3:$ret.= "<font style='color:red'>♥</font>";break;
          }
     }
     $ret.="<br>";
}
$ret.="</span>";
	return $ret;
}
// Get Random html
function GetRandomHtml($randomValue,&$answer)
{
	// max number of horizontal/vertical walkable tiles
	global $maze_width,$maze_height;
	$maze = array();
	$moves = array();
	$width = 2*$maze_width+1;
	$height = 2*$maze_height+1;
	for($x=0;$x<$height;$x++)
	     for($y=0;$y<$width;$y++)
		  $maze[$x][$y]=1;
	$x_pos = 1;
	$y_pos = 1;
	$maze[$x_pos][$y_pos]=0;
	array_push($moves,$y_pos+($x_pos*$width));
	while(count($moves))
	{
	     $possible_directions = "";
	     if($x_pos+2!=0 && $x_pos+2!=$height-1 && isset($maze[$x_pos+2][$y_pos]) && $maze[$x_pos+2][$y_pos]==1) $possible_directions .= "S";
	     if($x_pos-2!=0 && $x_pos-2!=$height-1 && isset($maze[$x_pos-2][$y_pos]) && $maze[$x_pos-2][$y_pos]==1) $possible_directions .= "N";
	     if($y_pos-2!=0 && $y_pos-2!=$width-1  && isset($maze[$x_pos][$y_pos-2]) && $maze[$x_pos][$y_pos-2]==1) $possible_directions .= "W";
	     if($y_pos+2!=0 && $y_pos+2!=$width-1  && isset($maze[$x_pos][$y_pos+2]) && $maze[$x_pos][$y_pos+2]==1) $possible_directions .= "E";
	     if($possible_directions)
	     {
		  $move = rand(0,strlen($possible_directions)-1);
		  switch ($possible_directions[$move]){
		       case "N": $maze[$x_pos-2][$y_pos]=0;
		                 $maze[$x_pos-1][$y_pos]=0;
		                 $x_pos -=2;
		                 break;
		       case "S": $maze[$x_pos+2][$y_pos]=0;
		                 $maze[$x_pos+1][$y_pos]=0;
		                 $x_pos +=2;
		                 break;
		       case "W": $maze[$x_pos][$y_pos-2]=0;
		                 $maze[$x_pos][$y_pos-1]=0;
		                 $y_pos -=2;
		                 break;
		       case "E": $maze[$x_pos][$y_pos+2]=0;
		                 $maze[$x_pos][$y_pos+1]=0;
		                 $y_pos +=2;
		                 break;
		  }
		  array_push($moves,$y_pos+($x_pos*$width));
	     }
	     else
	     {
		  $back = array_pop($moves);
		  $x_pos = floor($back/$width);
		  $y_pos = $back%$width;
	     }
	}
	// Huecos
	$maze[0][1]=2;
	$maze[$height-1][$width-2]=3;

$answer=json_encode($maze);

	return '<div>'. DrawMaze($maze).'</div>';
}
