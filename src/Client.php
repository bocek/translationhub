<?php

namespace Translationhub;

use Httpful\Request;
use Httpful\Mime;

class Client {
	protected static function attachToken($url) {
		$loginUrl = Config::get ( "baseurl" ) . Config::get ( "version" ) . API::$URL_AUTH_LOGIN . "?email=" . Config::get ( "email" ) . "&password=" . Config::get ( "password" );
		
		$data = $response = Request::get ( $loginUrl )->send ();
		
		if(!isset($data->body->token)){
			throw new \Exception(json_encode($data->body));
			return;
		}
		$url = Config::get ( "baseurl" ) . Config::get ( "version" ) . $url;
		
		if (strpos ( $url, "?" ) === false) {
			$url = $url . "?token=" . $data->body->token;
		} else
			$url = $url . "&token=" . $data->body->token;
		
		return $url;
	}
	
	protected static function get($url, array $params = array()) {
		$url = self::attachToken ( $url );
		$url = $url ."&". http_build_query ( $params );
		
		try {
			$response = Request::get ( $url )->send ();
		} catch ( \Exception $ex ) {
			throw $ex;
			return false;
		}
		
		return $response->body;
	}
	
	protected static function post($url, array $payload = array()) {
		$url = self::attachToken ( $url );
	
		try {
			
			$response = Request::post ( $url, $payload,Mime::JSON)->send ();
		} catch ( \Exception $ex ) {
			throw $ex;
			return false;
		}
		
		return $response->body;
	}
	
	protected static function put($url, array $payload = array()) {
		$url = self::attachToken ( $url );
		try {
			$response = Request::put ( $url, $payload )->send ();
		} catch ( \Exception $ex ) {
			throw $ex;
			return false;
		}
		
		return $response->body;
	}
	
	protected static function delete($url, array $payload = array()) {
		try {
			$url = self::attachToken ( $url );
			$response = Request::delete ( $url )->send ();
		} catch ( \Exception $ex ) {
			throw $ex;
			return false;
		}
		
		return $response->body;
	}
}