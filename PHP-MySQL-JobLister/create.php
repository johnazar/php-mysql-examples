<?php include_once 'config/init.php'; ?>
<?php
$job =new Job;

if(isset($_POST['submit'])){
    //create Data Array
    $data = array();
    $data['job_title'] = htmlspecialchars($_POST['job_title']);
    $data['company'] = htmlspecialchars($_POST['company']);
    $data['category_id'] = htmlspecialchars($_POST['category_id']);
    $data['description'] = htmlspecialchars($_POST['description']);
    $data['location'] = htmlspecialchars($_POST['location']);
    $data['salary'] = htmlspecialchars($_POST['salary']);
    $data['contact_user'] = htmlspecialchars($_POST['contact_user']);
    $data['contact_email'] = htmlspecialchars($_POST['contact_email']);

    if($job->create($data)){
        redirect('index.php', 'Your job has been listed', 'success');
    }else{
        redirect('index.php', 'Something went wrong', 'error');
    }
    
}




//create template
$template = new Template('templates/job-create.php');

$template->categories = $job->getCategories();







//display template
echo $template;