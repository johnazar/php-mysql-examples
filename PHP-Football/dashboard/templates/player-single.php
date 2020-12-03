<?php include 'inc/header.php';?>
<div class="container-md pt-5">
  <div class="card mb-2 pd-2" style="width: 18rem;">
    <img class="card-img-top" src="<?php echo $player->img;?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><?php echo $player->firstname .' '.$player->lastname ;?> </h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Team: <?php echo $player->tname;?></li>
      <li class="list-group-item">Position: <?php echo $player->pos;?></li>
      <li class="list-group-item">Number: <?php echo $player->num;?></li>
    </ul>
    <div class="card-body">
      <a href="index.php" class='btn btn-primary btn-sm'>Go back</a>
      <a href="update.php?id=<?php echo $player->id;?>" class='btn btn-success btn-sm'>Edit</a>
      <a href="delete.php?id=<?php echo $player->id;?>" class='btn btn-danger btn-sm'>Delete</a>
    </div>
   </div>
</div> <!-- /container -->
<br>
<br>
<?php include 'inc/footer.php';?>