<?php
namespace Translationhub ;

class Translation extends Client {
	
	public function postTranslation(array $payload){
		$url = API::$URL_TRANSLATION;
		return $this->post($url,$payload);
	}
	
	
	
}