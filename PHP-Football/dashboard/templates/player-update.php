<?php include 'inc/header.php';?>
<div class="container">
<h2 class="page-header">Update Player</h2>
<form method="POST" action="update.php?id=<?php echo $player->id;?>" enctype="multipart/form-data">
    <div class="form-group">
        <lable>First Name</lable>
        <input type="text" class="form-control" name="first_name" value="<?php echo $player->firstname; ?>" required>
    </div>
    <div class="form-group">
        <lable>Last Name</lable>
        <input type="text" class="form-control" name="last_name" value="<?php echo $player->lastname; ?>"required>
    </div>
    <div class="form-group">
        <lable>Photo</lable>
        <img class="img-thumbnail" onclick="triggerClick()" name="oldimg" value="<?php echo $player->img; ?>" src="<?php echo $player->img; ?>" id="displayimg" style="display:block;"/>
        <input type="hidden" name="currimg" value="<?php echo $player->img; ?>">
        <input type="file" name="img" onchange="displayImg(this)" id="playerimg" accept="image/*" style="display:none;">
    </div>
    <div class="form-group">
        <lable>Team</lable>
        <select class="form-control" name="team_id">
        <option value="<?php echo $player->team_id; ?>"><?php echo $player->tname;?></option>
        <?php foreach ($teams as $team):?>
        <option value="<?php echo $team->id; ?>"><?php echo $team->name; ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <lable>Speed</lable>
        <input type="number" class="form-control" name="speed" value="<?php echo $player->speed; ?>"required>
    </div>
    <div class="form-group">
        <lable>Postion</lable>
        <input type="text" class="form-control" name="position" value="<?php echo $player->pos; ?>" required>
    </div>
    <div class="form-group">
        <lable>Number</lable>
        <input type="text" class="form-control" name="number" value="<?php echo $player->num; ?>" required>
    </div>
    <input type="hidden" name="id" value="<?php echo $player->id;?>" >
    <input type="submit" class="btn btn-primary" value="Submit" name="submit">
</form>
</div>
<script src="./../../dashboard/public/js/football.js"> </script>


<?php include 'inc/footer.php';?>