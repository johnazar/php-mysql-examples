<?php include 'inc/header.php';?>
<h2 class="page-header">Create Job Listing</h2>
<form method="POST" action="create.php">
    <div class="form-group">
        <lable>Company</lable>
        <input type="text" class="form-control" name="company">
    </div>
    <div class="form-group">
        <lable>Category</lable>
        <select class="form-control" name="category">
        <option value="0">Choose category</option>
        <?php foreach ($categories as $category):?>
        <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <lable>Job Title</lable>
        <input type="text" class="form-control" name="job_title">
    </div>
    <div class="form-group">
        <lable>Description</lable>
        <textarea class="form-control" name="description"></textarea>
    </div>
    <div class="form-group">
        <lable>Location</lable>
        <input type="text" class="form-control" name="location">
    </div>
    <div class="form-group">
        <lable>Salary</lable>
        <input type="text" class="form-control" name="salary">
    </div>
    <div class="form-group">
        <lable>Contact user</lable>
        <input type="text" class="form-control" name="user">
    </div>
    <div class="form-group">
        <lable>Contact Email</lable>
        <input type="email" class="form-control" name="email">
    </div>
    <input type="submit" class="btn btn-default" value="Submit" name="submit">
</form>


<?php include 'inc/footer.php';?>