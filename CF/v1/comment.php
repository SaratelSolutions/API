<?php
session_start();

require 'vendor/autoload.php';

use JiraRestApi\Issue\IssueService;
use JiraRestApi\Issue\Comment; // allows the use of comment methods and objects
use JiraRestApi\JiraException;
$testsample ='';
$issueKey = $_SESSION['storedkey'];
$spinid = $_SESSION['spinfield'];

if ($spinid == 1) 
{

    $testsample = "A Customer sent us a message from our Saratel Website.
    				* Contact Form 2/Customer Page
    				** Added with API				
    				";
}
elseif ($spinid == 3) {
    $testsample = "A Customer Requested for an Inquery on the Saratel Website.
                    * Contact Request/ Let's Get Started Page
                    ** Added with API             
                    ";
}
elseif ($spinid == 4) 
{

    $testsample = "An Job Seeker Applied on the Saratel Website.
                    * Career Form/ Career Page
                    ** Added with API             
                    ";
}
else
{
    $testsample = "Error";
}

try {
	// allows the use of comment method and store it on the variable			
    $comment = new Comment();


    $body = $testsample;

    $comment->setBody($body);
    //executes the command
    $issueService = new IssueService();
    $ret = $issueService->addComment($issueKey, $comment);
    
    // print_r($ret);
    $url = "/Word/wordpress/API/v4/asignee.php/";
    header( 'Location: '.$url);
} catch (JiraException $e) {
    $this->assertTrue(FALSE, "add Comment Failed : " . $e->getMessage());
}
