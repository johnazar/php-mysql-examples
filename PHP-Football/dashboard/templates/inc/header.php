<?header('Content-Type: text/html; charset=utf-8');?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title><?php echo SITE_TITLE; ?></title>
    <script src="../../public/js/jquery-3.5.1.min.js"></script>
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/bootstrap.css" rel="stylesheet" >
    <!-- <link href="../../public/css/fwall.css" rel="stylesheet" > -->
    <script src="../../public/js/bootstrap.bundle.js"></script>
    <script src="../../public/js/bootstrap.bundle.min.js"></script>

  </head>
  <body>

    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand mb-0 mr-1 h1" href="/"><?php echo SITE_TITLE;?></a>|<a class="navbar-brand mb-0 ml-1" href="/dashboard">Dashboard</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Players</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Users</a>
          </li>
        </ul>
      <form class="form-inline">
         <a href="create.php" class="btn btn-outline-success mr-2 mr-sm-0">Add player</a>
         <a href="logout.php" class="btn btn-outline-danger my-2 my-sm-0">Logout</a>
      </form>
      </div>
    </nav>
      
    </header>
    <?php displayMessage(); ?>
    <main role="main">

