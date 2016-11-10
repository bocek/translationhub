TranslationHUB PHP Library (for the [TranslationHUb API](http://translationhub.com/api/))
======================================================================================================================================================

This package contains a client library for accessing the TranslationHUB API


Installation & Requirements
------------------------------------------------------------------------------------------------------------------------------------------------------
Installing the library is simple. Just add it to "require" of your composer.json

## Composer

Our library can be installed using [composer](http://getcomposer.org/).  Simply add `pasyonis/translationhub` to your composer.json file.  

    {
        "require": {
            "pasyonis/translationhub": "*"
        }
    }

Then inside of your code you can call:

```php
\TranslationHub\Config::setEmail("your_email");
\TranslationHub\Config::setPassword("your_password");


$response = $projectApi->createProject(array(
		"source_language_id"=>"tr",
		"target_language_ids"=>"en,de",
		"quality"=>"basic",
		"callback_url"=>"http://mysite.com/postBack",
		"project_url"=>"http://mysite.com",
		"extras"=>array("id"=>"MyProjectId","type"=>"product description")
));

if($response->status=="error"){
	//lets see what is the error
	echo "There is an error : ".$response->errorMessage;
	echo "Error details\n";
	print_r($response->errors);
}
else {
	//ok lets start to post  my product description translations
	$projectId = $response->project->id;
	
	$response = $translationApi->postTranslation(array(
		"project_id"=>$projectId,
		"text_to_translate"=>"Merhaba, benim adım Aleyna. Merhaba, benim adım Aleyna. Nabersin ?", //there is two same sentences, i wonder if it will count it as once
		"extras" => array("id"=>"MyDatabaseRowId","type"=>"Product Desc")
	));
	
	if($response->status=="error"){
		echo "There is an error : ".$response->errorMessage;
		echo "Error details\n";
		print_r($response->errors);
	}else {
		echo "My Jobs Are, checkout word counts before analysis\n";
		print_r($response->jobs);
	}
	
	// i will wait little bit to let them be analysed	
	echo "waiting to be analysed";
	
	sleep(15);
	

	//Lets get our job details and analysed results
	$response = $projectApi->getTranslationJobs($projectId);
	print_r($response);
	if($response->status="success"){
		foreach ($response->jobs as $job){
			$wholeJob = $jobApi->getJob($job->id);
			echo "job is \n";
			print_r($wholeJob);
			$analyseResult = $jobApi->getAnalysis($job->id);
			echo "job analysis result\n";
			print_r($analyseResult);
		}
	}
	print_r($response);
	
	
}
```



Question, Comments, Complaints
------------------------------------------------------------------------------------------------------------------------------------------------------
If you have questions or comments and would like to reach us directly, We would love to hear from developers. 

* Email: info [at] pasyonis dot com


If you come across any issues, please file them on the [Github project issue tracker](https://github.com/pasyonis/translationhub/issues). Thanks!


Documentation
------------------------------------------------------------------------------------------------------------------------------------------------------
Check out the full [TranslationHub API documentation](http://translationhub.com/documentation).