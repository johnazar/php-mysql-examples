
<?php //if (!empty($errors)): ?>
<!--    <div class="alert alert-danger">-->
<!--        --><?php //foreach ($errors as $error): ?>
<!--            <div>--><?php //echo $error ?><!--</div>-->
<!--        --><?php //endforeach; ?>
<!--    </div>-->
<?php //endif; ?>

<form method="post" enctype="multipart/form-data">
    <?php if ($player['img']): ?>
        <img src="/<?php echo $player['img'] ?>" class="player-img-view">
    <?php endif; ?>
    <div class="form-group">
        <label>Player's photo</label><br>
        <input type="file" name="img">
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
        <label>Player's Position</label>
        <input type="number" name="pos" class="form-control" value="<?php echo $player['pos'] ?>">
    </div>

    <div class="form-group">
        <label>Player's Number'</label>
        <input type="number" name="num" class="form-control" value="<?php echo $player['num'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>