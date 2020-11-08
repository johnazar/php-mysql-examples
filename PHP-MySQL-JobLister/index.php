<?php include_once 'config/init.php'; ?>
<?php
$job =new Job;
//create template
$template = new Template('templates/frontpage.php');

// Set variables
$template->title = 'Lates Jobs';
$template->jobs = $job->getAllJobs();
$template->categories = $job->getCategories();


//display template
echo $template;