<?php include 'inc/header.php';?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Find a Player</h1>
    <form method="GET" action="index.php">
    <select name="team" class="form-control">
      <option value="0">Choose team</option>
      <?php foreach ($teams as $team):?>
      <option value="<?php echo $team->id ?>"><?php echo $team->name ?></option>
      <?php endforeach; ?>
      </select>
      <br>
      <input type="submit" class="btn btn-lg btn-success" value="Find">
  </form>
  </div>
</div>

<div class="container d-flex justify-content-around flex-wrap">
<?php foreach($players as $player):?>
        <!-- Three columns of text below the carousel -->
          <div class="col-md-4">
              <div class="card mb-2" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo $player->img;?>" alt="Card image cap">
                <div c  lass="card-body">
                  <h5 class="card-title"><?php echo $player->firstname;?></h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><?php echo $player->tname;?></li>
                  <li class="list-group-item">Position: <?php echo $player->pos;?></li>
                  <li class="list-group-item">Number: <?php echo $player->num;?></li>
                </ul>
                <div class="card-body">
                  <a href="player.php?id=<?php echo $player->id; ?>" class="card-link">View</a>
                  <a href="#" class="card-link">Another link</a>
                </div>
              </div>
          </div><!-- /.col-md-4 -->
  <?php endforeach;?>
                         
  </div> <!-- /container -->
<?php include 'inc/footer.php';?>