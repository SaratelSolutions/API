<?php
require 'vendor/autoload.php';

use JiraRestApi\Issue\IssueService;
use JiraRestApi\Issue\Comment; // allows the use of comment methods and objects
use JiraRestApi\JiraException;

$issueKey = "TESTSW-115";
$testsample = "Adds this comment on issue.
				* Php
				* Composer
				** jsonmapper
				** dotenv
				* Jira";
// * means a single bullet
//** means a sub bullet of the bullet before it.				
try {
	// allows the use of comment method and store it on the variable			
    $comment = new Comment();

// every comment requires body and the body stores the actual comment itself, in this case the $testsample
$body = $testsample;
/*
    $body = <<<COMMENT
Adds a new comment to an issue.
* Bullet 1
* Bullet 2
** sub Bullet 1
** sub Bullet 2
* Bullet 3
COMMENT;*/
	
	//set the $body variable and its data as the Body in Jira method.
    $comment->setBody($body);
    //executes the command
    $issueService = new IssueService();
    $ret = $issueService->addComment($issueKey, $comment);
    
    print_r($ret);
} catch (JiraException $e) {
    $this->assertTrue(FALSE, "add Comment Failed : " . $e->getMessage());
}
