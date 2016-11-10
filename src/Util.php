<?php
namespace Translationhub;

class Util extends Client {
	public function getSupportedLanguages(){
		$url = API::$URL_UTIL_SUPPORTED_LANGUAGES;
		return $this->get($url);
	}
	
	public function getLanguagePairs($quality="basic"){
		$url = API::$URL_UTIL_LANGUAGE_PAIRS;
		return $this->get($url,array("quality"=>$quality));
	}
	
	public function getQualityLevels(){
		$url = API::$URL_UTIL_LEVELS;
		return $this->get($url);
	}
	
	public function getExpertises(){
		$url = API::$URL_UTIL_EXPERTISES;
		return $this->get($url);
	}
}