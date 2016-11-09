<?php
namespace Translationhub;
class Project extends Client{
	
	public function create(array $payload){
		 $url = API::$URL_PROJECT;
		 return $this->post($url,$payload);
	}
}