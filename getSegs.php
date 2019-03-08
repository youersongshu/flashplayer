<?php
include_once 'Http.class.php';
//include_once 'common.php';
//include_once 'js/player.js';
//include_once 'case.tpl';
	$url ='http://v.youku.com/player/getPlayList/VideoIDS/' .$_REQUEST["vid"] .'/timezone/+08/version/5/source/video?ran=9539&password=&n=3';
	//echo $url;
    $qaulity= $_REQUEST["q"];
	echo $quality;
	$data= Http::post($url);
			$str = json_decode($data);
			$time=0;
			for($i=0;$i<count($str->data[0]->segs->$_REQUEST["q"]);$i++)
					{
					$value=$str->data[0]->segs->{$_REQUEST["q"]}[$i]->seconds;
					$time=$time+$value;
					//$seg[$i]=$value/60;
					echo gmstrftime('%H:%M:%S',$time);
					echo "<br>";
					}



?>
