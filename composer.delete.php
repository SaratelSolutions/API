<?php
require 'vendor/autoload.php';
//callingclassess
use JiraRestApi\Issue\IssueService;
use JiraRestApi\JiraException;

	//define the target issue
	$ProjetKEY ="TESTSW-";
	$targetKey = 237;
	//final value is TESTSW-237
	$issueKey = $ProjetKEY.$targetKey;



try
{
	// calliing the method
    $issueService = new IssueService();
    //executing the method to delete and passing the variable $issueKey containing the target Issue to be removed.
    $ret = $issueService->deleteIssue($issueKey);

    //dumps data on to be printed and read.
    var_dump($ret);
} //will catch any exception returned
catch (JiraException $e) 
{
	//will look into $this property, using assertTrue Method, if the method returns False it will print the message. It will acess the container of the messsage $e then access its property getMessage to show the error message.
    $this->assertTrue(FALSE, "Change Assignee Failed : " . $e->getMessage());
}


?>
