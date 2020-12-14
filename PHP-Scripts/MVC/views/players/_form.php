
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
       <?php foreach ($errors as $error): ?>
           <div><?php echo $error ?></div>
       <?php endforeach; ?>
   </div>
<?php endif; ?>

<form action="" method="post" enctype="multipart/form-data">
    <?php if ($player['image']): ?>
        <img src="/<?php echo $player['img'] ?>" class="player-img-view">
    <?php endif; ?>
    <div class="form-group">
        <label>Player Image</label><br>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label>First name</label>
        <input type="text" name="firstname" class="form-control" value="<?php echo $player['firstname'] ?>">
    </div>
    <div class="form-group">
        <label>Last name</label>
        <input type="text" name="lastname" class="form-control" value="<?php echo $player['lastname'] ?>">
    </div>
    <div class="form-group">
        <label>Player's position</label>
        <input type="text" name="pos" class="form-control" value="<?php echo $player['pos'] ?>">
    </div>
    <div class="form-group">
        <label>Player's number</label>
        <input type="text" name="num" class="form-control" value="<?php echo $player['num'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>