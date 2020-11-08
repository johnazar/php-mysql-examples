<?php include 'inc/header.php';?>
<h2 class="page-header">Edit Job Listing</h2>
<form method="POST" action="edit.php?id=<?php echo $job->id;?>">
    <div class="form-group">
        <lable>Company</lable>
        <input type="text" class="form-control" name="company" value="<?php echo $job->company;?>">
    </div>
    <div class="form-group">
        <lable>Category</lable>
        <select class="form-control" name="category_id">
        <option value="0">Choose category</option>
        <?php ?>
        <?php foreach ($categories as $category):?>
            <?php if($job->category_id == $category->id) : ?>
            <option value="<?php echo $category->id; ?>" selected><?php echo $category->name; ?></option>
            <?php else:?>
                <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
            <?php endif;?>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <lable>Job Title</lable>
        <input type="text" class="form-control" name="job_title" value="<?php echo $job->job_title;?>">
    </div>
    <div class="form-group">
        <lable>Description</lable>
        <textarea class="form-control" name="description"><?php echo $job->description;?></textarea>
    </div>
    <div class="form-group">
        <lable>Location</lable>
        <input type="text" class="form-control" name="location" value="<?php echo $job->location;?>">
    </div>
    <div class="form-group">
        <lable>Salary</lable>
        <input type="text" class="form-control" name="salary" value="<?php echo $job->salary;?>">
    </div>
    <div class="form-group">
        <lable>Contact user</lable>
        <input type="text" class="form-control" name="contact_user" value="<?php echo $job->contact_user;?>">
    </div>
    <div class="form-group">
        <lable>Contact Email</lable>
        <input type="email" class="form-control" name="contact_email" value="<?php echo $job->contact_email;?>">
    </div>
    <input type="submit" class="btn btn-primary" value="Submit" name="submit">
</form>


<?php include 'inc/footer.php';?>