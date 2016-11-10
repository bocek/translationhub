<?php
namespace Translationhub;
class Project extends Client{
	
	public function createProject(array $payload){
		 $url = API::$URL_PROJECT;
		 return $this->post($url,$payload);
	}
	
	public function startProject($projectId){
		$url = API::$URL_PROJECT;
		return $this->get($url."/".$projectId."/start");
	}
	
	public function getTranslationJobs($projectId){
		$url = API::$URL_PROJECT;
		return $this->get($url."/".$projectId."/jobs");
	}
	
	public function updateProject(array $payload){
		$url = API::$URL_PROJECT;
		return $this->put($url,$payload);
	}
	
	public function deleteProject($projectId){
		$url = API::$URL_PROJECT;
		return $this->delete($url,array("id"=>$projectId));
	}
}