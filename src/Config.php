<?php
namespace  Translationhub;

class Config {
	private static $_settings = array(
			'baseurl' => 'http://api.translationhub.com/',
			'format' => 'json',
			'timeout' => 120,
			'email' => false,
			'password' => false,
			
			'version'=>'v1'
	);
	
	public static function get($name)
	{
		return (array_key_exists($name, self::$_settings) === true) ? self::$_settings[$name] : false;
	} 
	
	
	public static function switchToProduction()
	{
		self::$_settings['baseurl'] = 'https://api.translationhub.com/';
	}
	
	public static function switchToSandbox()
	{
		self::$_settings['baseurl'] = 'https://sandbox.translationhub.com/';
	}
	
	public static function setEmail($username)
	{
		
		self::$_settings['email'] = $username;
	}
	
	public static function setPassword($password)
	{
	
		self::$_settings['password'] = $password;
	}
	
	public static function setApiVersion($version)
	{
	
		self::$_settings['version'] = $version;
	}
	
	
}