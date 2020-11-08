<?php include_once 'config/init.php'; ?>
<?php
$job =new Job;
// Set variables
$job_id =isset($_GET['id'])?$_GET['id']:null;

if(isset($_POST['del_id'])){
    $del_id = $_POST['del_id'];
    if($job->delete($del_id)){
        redirect('index.php','Job Deleted','success');
    }else{
        redirect('index.php','Job was not deleted','error');
    }

}

//create template
$template = new Template('templates/job-single.php');




$template->job = $job->getJob($job_id);







//display template
echo $template;