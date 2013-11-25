<?php

include 'config.class.php';

Class FTP{

	public $ftp;
	public $config;
	public $login;

	/*
	 * init
	 * function to init a connection
	 *
	*/
	public function init(){
		$this->connectFTP();
		$this->loginServidor();
	}

	/*
	 * setFTPConfig
	 * function to set config
	 *
	 * $server	- server name
	 * $user	- user name
	 * $pass	- password
	 *
	*/
	public function setFTPConfig($server, $user, $pass){
		$this->config = new Config();
		$this->config->setConfig($server, $user, $pass);
	}

	/*
	 * connectFTP
	 * function to connect
	 *
	*/
	public function connectFTP(){
		$this->ftp = ftp_connect($this->config->getServerName());
	}

	/*
	 * loginServidor
	 * function to check if your credencials are ready
	 *  
	*/
	public function loginServidor(){

		$login = 0;

		//Test connection
		if(@ftp_login($this->ftp, $this->config->getServerUser(), $this->config->getServerPass())){
			$login = 1;
		}

		$this->messageStatus($login); 
	}

	/*
	 * send
	 * function to send/upload file to server
	 * 
	 * $to		- folder name to put a file. ex: /public_html/site/assets/lorem_ipsum.txt
	 * $from	- path of file. ex: C:\Users\myNameUser\Desktop\lorem_ipsum.txt
	 * 
	*/
	public function send($from, $to){
		ftp_put($this->ftp, $to, $from, FTP_ASCII);
		
		$this->disconnectFTP();
	}

	/*
	 * receive
	 * function to receive/download file from server
	 * 
	 * $from	- folder name to get a file. ex: /public_html/site/assets/lorem_ipsum.txt
	 * $to		- path of local file. ex: C:\Users\myNameUser\Desktop\lorem_ipsum.txt
	 * 
	*/
	public function receive($from, $to){
		ftp_get($this->ftp, $to, $from, FTP_ASCII);
		
		$this->disconnectFTP();
	}
	
	/*
	 * disconnectFTP
	 * 
	 * disconnect to ftp
	 * 
	*/
	public function disconnectFTP(){
		ftp_close($this->ftp);
	}

	/*
	 * messageStatus
	 * 
	 * Receive a parameter from loginServidor() function
	 * write connect r disconect message
	 * 
	*/
	public function messageStatus($login){

		switch($login){
			case 0:
				echo '<p>Status: <span style="color:red">You no have access to this server! </span> from ' . $this->config->getServerName() . '.</p>';
				break;
			case 1:
				echo '<p>Status: <span style="color:green">Connect success!</span> in ' . $this->config->getServerName() . '.</p>';
				break;			
		}

	}
	
	/*
	 * statusServer
	 * 
	 * Receive a parameter from loginServidor() function
	 * return true: connect
	 * return false: disconnect
	 * 
	*/
	public function statusServer($login){

		switch($login){
			case 0:
				return false;
				break;
			case 1:
				return true;
				break;			
		}

	}
	
}

?>