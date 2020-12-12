<?php include_once 'inc/header.php';?>
<div class="container-md pt-5">
<div class="col-md-4 align-self-center">
              <div class="card mb-2 pd-2" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo $player->img;?>" alt="Card image cap">
                <div c  lass="card-body">
                  <h5 class="card-title"><?php echo $player->firstname .' '.$player->lastname ;?> </h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Team: <?php echo $player->tname;?></li>
                  <li class="list-group-item">Position: <?php echo $player->pos;?></li>
                  <li class="list-group-item">Number: <?php echo $player->num;?></li>
                </ul>
                <div class="card-body">
                <a href="index.php">Go back</a>
                </div>
              </div>
          </div><!-- /.col-md-4 -->

</div> <!-- /container -->
<?php include_once 'inc/footer.php';?>