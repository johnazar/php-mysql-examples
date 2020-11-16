<?php include_once 'config/init.php'; ?>
<?php
$job =new Job;
//create template
$template = new Template('templates/frontpage.php');

// Set variables
$catrgory =isset($_GET['category'])?$_GET['category']:null;

if($catrgory!=0){
    $template->title = 'Latest Jobs from '. $job->getCategory($catrgory)->name;
    $template->jobs = $job->getByCategory($catrgory);

}else{
    $template->title = 'Latest Jobs';
    $template->jobs = $job->getAllJobs();
    }
$template->categories = $job->getCategories();





//display template
echo $template;