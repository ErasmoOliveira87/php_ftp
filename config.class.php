<?php

/*
 * FTP config class
*/
class Config{

	public $server;
	public $user;
	public $pass;

	/*
	 * setConfig()
	 *
	 * $server	- server name
	 * $user	- username
	 * $pass	- password
	 * 
	 */
	public function setConfig($server, $user, $pass){
		
		$this->server	= $server;
		$this->user		= $user;
		$this->pass		= $pass;
	}
	
	/*
	 * getServerName
	 *
	 * Return a Server name
	 */
	public function getServerName(){
		return $this->server;
	}
	
	/*
	 * getServerUser
	 *
	 * Return a User name
	 */
	public function getServerUser(){
		return $this->user;
	}
	
	/*
	 * getServerPass
	 *
	 * Return a Password
	 */
	public function getServerPass(){
		return $this->pass;
	}

}

?>