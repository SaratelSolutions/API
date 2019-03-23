<?php

require 'vendor/autoload.php';

use JiraRestApi\Issue\IssueService;
use JiraRestApi\Issue\Transition; // call this class function to allow the use of the transition objects and methods.
use JiraRestApi\Issue\JiraException;

$issueKey = "TESTSW-115";

try
{
	// $transition will contain the Transtion() methods.
	$transition = new Transition();
	// calling the method TransitionName and set it on which Transition you want.
	$transition->setTransitionName('Resolved');
	//an additional comment when the transition happens. NOTE that its action IS BASED on SCREEN SCHEMES required FIELDS AND WORKFLOW status.
	$transition->setCommentBody('performing the transition via Rest API ! ');
	//executes the request.
	$issueService = new IssueService();
	//passes the issuekey and transition type on the execution.
	$issueService ->transition($issueKey, $transition);

}
catch(JiraException $e)
{
	$this ->assertTrue(FALSE, "add Comment Failed: ". $e ->getMessage);
}

?>
