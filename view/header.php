<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>E-store Database Demo</title>

  <!-- Bootstrap Core CSS -->
  <link href="<?=$path ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">

  <!-- Fonts -->
  <link href="<?=$path ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="<?=$path ?>assets/css/animate.css" rel="stylesheet" />
  <!-- Squad theme CSS -->
  <link href="<?=$path ?>assets/css/style.css" rel="stylesheet">
  <link href="<?=$path ?>assets/color/default.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Squadfree
    Theme URL: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->

</head>

<body id="page-top"  data-target=".navbar-custom">
 

  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
        <a class="navbar-brand" href="./">
          <h1> <?=isset($_SESSION['username'])? 'Hello '.$_SESSION['username']: 'E-store Home' ?></h1>
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
        <ul class="nav navbar-nav">
              <?php if($path == ''): ?>       
                  <li class="active"><a href="./">Home</a></li>

                  <li class="active"><a href="?action=login">Login</a></li>

              <?php endif; ?>
              <?php if($path == '../'): ?>    
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="?action=getProducts">View Products</a></li>
                      <li><a href="?action=searchProducts">Search Products</a></li>
                     </ul>
                    </li>
                  <li class="active"><a href="?action=logout">Logout</a></li>
                <?php endif; ?>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
  </nav>

  <!-- Section: intro -->
  <section id="intro" class="intro">
  <div class="container">

