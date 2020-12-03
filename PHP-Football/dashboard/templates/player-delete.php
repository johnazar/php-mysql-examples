<?php include 'inc/header.php';?>
<div class="container d-flex justify-content-around flex-wrap">
    <form calss="well" method="POST" action="delete.php">
        <div class="form-group">
            <label>Are you sure, that you want to delete <?php echo $player->firstname.' '.$player->lastname;?></label>
        </div>
        <div class="form-group">
            <a href="player.php?id=<?php echo $player->id;?>" class="btn btn-primary">Cancel</a>
            <input type="hidden" name="del_id" value="<?php echo $player->id;?>">
            <input type="submit" class="btn btn-danger" value="Delete">
        </div>
    </form>
</div>

<?php include 'inc/footer.php';?>

