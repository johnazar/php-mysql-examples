<?php include_once 'inc/header.php';?>
<div class="container">
<h2 class="page-header">Add Player</h2>
<form method="POST" action="create.php" enctype="multipart/form-data">
    <div class="form-group">
        <lable>First Name</lable>
        <input type="text" class="form-control" name="first_name" required>
    </div>
    <div class="form-group">
        <lable>Last Name</lable>
        <input type="text" class="form-control" name="last_name" required>
    </div>
    <div class="form-group">
        <img class="img-thumbnail" onclick="triggerClick()" src="../public/img/uploads/placeholder.jpg" id="displayimg" style="display:block;"/>
        <lable>Photo</lable>
        <input type="file" name="img" onchange="displayImg(this)" id="playerimg" accept="image/*" style="display:none;">
    </div>
    <div class="form-group">
        <lable>Team</lable>
        <select class="form-control" name="team_id">
        <option value="1">Choose team</option>
        <?php foreach ($teams as $team):?>
        <option value="<?php echo $team->id; ?>"><?php echo $team->name; ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <lable>Speed</lable>
        <input type="number" class="form-control" name="speed" required>
    </div>
    <div class="form-group">
        <lable>Postion</lable>
        <input type="text" class="form-control" name="position" required>
    </div>
    <div class="form-group">
        <lable>Number</lable>
        <input type="text" class="form-control" name="number" required>
    </div>


    <input type="submit" class="btn btn-primary" value="Submit" name="submit">
</form>
</div>
<script src="./../../dashboard/public/js/football.js"> </script>



<?php include_once 'inc/footer.php';?>