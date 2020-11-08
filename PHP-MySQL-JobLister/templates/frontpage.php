<?php include 'inc/header.php';?>


<div class="jumbotron">
  <h1 class="display-3">Find a job</h1>
  <form>
  </form>
  </div>
<?php foreach($jobs as $job): ?>
<div class="row marketing">
  <div class="col-md-10">
    <h4><?php echo $job->job_title; ?></h4>
    <p><?php echo $job->description; ?></p>
  </div>
  <div class="col-md-2">
    <a class="btn btn-default" href="#">View</a>
  </div>
</div>
<?php endforeach;?>



<?php include 'inc/footer.php';?>
