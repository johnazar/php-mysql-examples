<?php include_once 'inc/header.php';?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Players</h1>
    <form method="POST" action="index.php">
    <div class="input-group">
    <input type="text" class="form-control" name="searchq" placeholder="Search for player" aria-label="Search for player" aria-describedby="button-addon2">
    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Find</button>
    </div>
  </form>
  </div>

</div>

<div class="container d-flex justify-content-around flex-wrap">
<h2><?php echo $title; ?></h2>
  <table class='table table-bordered table-striped'>
    <thead>
      <tr>
        <th>#</th>
        <th>Photo</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Team</th>
        <th>Position</th>
        <th>Number</th>
        <th>Action</th>
      </tr>
    </thead>
    <?php foreach($players as $player):?>
      <tr>
        <td>#</th>
        <td><img src="<?php echo $player->img;?>" width="80"></th>
        <td><?php echo $player->firstname;?></th>
        <td><?php echo $player->lastname;?></th>
        <td><?php echo $player->tname;?></th>
        <td><?php echo $player->pos;?></th>
        <td><?php echo $player->num;?></th>
        <td>
          <a href='player.php?id=<?php echo $player->id;?>' class='btn btn-success btn-sm' title='View Player' data-toggle='tooltip'>View</a>
          <a href='update.php?id=<?php echo $player->id;?>' class='btn btn-primary btn-sm' title='Update Player' data-toggle='tooltip'>Edit</a>
          <a href='delete.php?id=<?php echo $player->id;?>' class='btn btn-danger btn-sm' title='Delete Player' data-toggle='tooltip'>Delete</a>
        </td>
      </tr> 
    <?php endforeach;?>
  </table>                    
</div> <!-- /container -->
<?php include_once 'inc/footer.php';?>