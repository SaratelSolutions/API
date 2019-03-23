<?php
require 'vendor/autoload.php';

use JiraRestApi\Issue\IssueService;
use JiraRestApi\Issue\IssueField;
use JiraRestApi\JiraException;

try {//stores the properties for the creating field
    $issueField = new IssueField();

    /*Project Key is the Project key in Jira
    next are the Screen Fields data for that Issue
    If there are an screen fields called but not within the screen field in JIRA it will return error.
        */
    $issueField->setProjectKey("TESTSW")
    
                ->setSummary("anothertest")
            //    ->setAssigneeName("Brian Felizar")
                ->setPriorityName("High")

                ->setIssueType("Service Request")

                ->setDescription("test Full description for issue")
            //    ->addLabels("PHP", "Composer")
            //    ->addVersion(["1.0.1", "1.0.3"])
             //   ->addComponents(['Component-1', 'Component-2'])
                // set issue security if you need.
             //   ->setSecurityId(10001 /* security scheme id */)
            //    ->setDueDate('2019-06-19')
            ;
	
    $issueService = new IssueService();
    //executes the method.
    $ret = $issueService->create($issueField);
	
    //If success, Returns a link to the created issue.
    var_dump($ret);
} catch (JiraException $e) {
	print("Error Occured! " . $e->getMessage());
}
