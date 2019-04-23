<?php
session_start();

require 'vendor/autoload.php';
// require 'comment.php';
use JiraRestApi\Issue\IssueService;
use JiraRestApi\Issue\IssueField;
use JiraRestApi\Issue\Comment;
use JiraRestApi\JiraException;

try
{
	$issueField = new IssueField();

	$spinfield = $_POST['spinid'];
	$name = $_POST['field1'];
	$contact = $_POST['field2'];
	$email = $_POST['field3'];
	$message = $_POST['field4'];
	$notification = $_POST['field5'];
	$portfolio = $_POST['field6'];
	
//
		
//
	if ($spinfield == 1) 
	{

		if ($notification == '' or is_null($notification))
		 {

		$notification = "No";

		}	

		$issueField->setProjectKey("TESTSW")
					->setSummary("Customer Message from the Website")
					->setPriorityName("Medium")
					->setIssueType("Service Request")
					->setDescription("Customer's Details.\n
						 Name : ".$name ."
						 Contact Number : ".$contact. "
						 Email : ".$email."\n
						 Messsage : \n  ".$message."
						
						 Notify Me: \n" .$notification. "
						")
					->addLabel("Contact_Form")
					->addLabel("Customer")
					->addLabel("Website")
					->addLabel($contact)				
					;
		$issueService = new IssueService();	
	}
	elseif ($spinfield == 3) 
	{
		$issueField->setProjectKey("TESTSW")
					->setSummary("Customer Requested Inquiry from the Website")
					->setPriorityName("Medium")
					->setIssueType("Service Request")
					->setDescription("Customer's Details.\n
						 Name : ".$name ."
						 Contact Number : ".$contact. "
						 Email : ".$email."\n
						 Messsage : \n  ".$message."		
						")
					->addLabel("Contact_Request")
					->addLabel("Customer")
					->addLabel("Website")
					->addLabel($contact)				
					;
		$issueService = new IssueService();	
	}
	elseif ($spinfield == 4) 
	{
		if ($portfolio == '' or is_null($portfolio)) 
		{
			$portfolio = "None";
		}

		$issueField->setProjectKey("TESTSW")
					->setSummary("Application from the Website")
					->setPriorityName("Medium")
					->setIssueType("Service Request")
					->setDescription("Applicant's Details.\n
						 Name : ".$name ."
						 Contact Number : ".$contact. "
						 Email : ".$email."\n
						 Messsage : \n  ".$message."
						
						 Portfolio URL : \n" .$portfolio. "

						 Resume : \n on the Attached Files.
						")
					->addLabel("Career_Form")
					->addLabel("Applicant")
					->addLabel("Website")
					->addLabel($contact)				
					;


		$issueService = new IssueService();		
	}
	else
	{
		$issueField->setProjectKey("TESTSW")
					->setSummary("Error, Not Recieving data from the Website")
					->setPriorityName("High")
					->setIssueType("Service Request")
					->setDescription(" Error Exception.						 
						")
					->addLabel("Bug")
					->addLabel("Error")
					->addLabel("Website")
					;

		$issueService = new IssueService();
	}
//
	$ret = $issueService->create($issueField);

	$projectkey = $ret->key;
//
	if ($spinfield == 4) 
	{
		$ret = $issueService->addAttachments($projectkey,'sample_resume.png');
	}

	$_SESSION['storedkey'] = $projectkey;
	$_SESSION['spinfield'] = $spinfield;
	$url ="/Word/wordpress/API/v4/comment.php/";
	header( 'Location: '.$url);
		
}
catch (JiraException $e)
{
	print_r("Error Occured! " . $e->getMessage());
}

?>
