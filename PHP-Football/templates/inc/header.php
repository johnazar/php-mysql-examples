
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title><?php echo SITE_TITLE; ?></title>
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet" >
    <link href="../../public/css/bootstrap.css" rel="stylesheet" >
    <link href="../../public/css/fwall.css" rel="stylesheet" >   
    <script src="../../public/js/bootstrap.bundle.js"></script>
    <script src="../../public/js/bootstrap.bundle.min.js"></script>
    <script src="../../public/js/jquery-3.5.1.min.js"></script>
  </head>
  <body>

    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand mb-0 h1" href="/"><?php echo SITE_TITLE;?></a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Teams</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/">Players</a>
          </li>
        </ul>
      <form class="form-inline">
                <a class="btn btn-light my-2 my-sm-0" href="/dashboard">Dashboard</a>
      </form>
      </div>
    </nav>
    </header>
    <main role="main">
<?php displayMessage(); ?>
