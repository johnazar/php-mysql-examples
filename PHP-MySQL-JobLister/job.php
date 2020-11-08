<?php include_once 'config/init.php'; ?>
<?php
$job =new Job;
//create template
$template = new Template('templates/job-single.php');

// Set variables
$job_id =isset($_GET['id'])?$_GET['id']:null;


$template->job = $job->getJob($job_id);







//display template
echo $template;