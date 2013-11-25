<?php

	include 'ftp.class.php';

	$SendFrom 	= 'C:\Users\YourUserName\Desktop\FTP_File.txt';			// File Origin
	$SendTo 	= '/public_html/FTP_File.txt';							// File Destiny
	
	$ReceiveFrom 	= '/public_html/FTP_File.txt';						// File Origin
	$ReceiveTo 		= 'C:\Users\YourUserName\Desktop\FTP_File.txt';		// File Destiny
	
	//Create object
	$ftp = new FTP();
	//Set server access config
	$ftp->setFTPConfig('ftp.server.com.br', 'user', 'password');
	
	//Init
	$ftp->init();
	
	//Send file to destiny
	//$ftp->send($SendFrom, $SendTo);

	//Get file from remote server to your computer
	//$ftp->receive($ReceiveFrom, $ReceiveTo);
?>