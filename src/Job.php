<?php
namespace Translationhub;

class Job extends Client {
	
	public function getJob($jobId){
		$url = API::$URL_JOB;
		return $this->get($url,array("id"=>$jobId));
	}
	
	public function getAnalysis($jobId){
		$url = API::$URL_JOB;
		return $this->get($url."/".$jobId."/analyse");
	}
}