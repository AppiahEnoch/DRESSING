<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Product Details| The Dressing</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="./body.css?
    <?php echo filemtime("body.css"); ?>
    " />

    <link rel="stylesheet" href="./aeT.css?
    <?php echo filemtime("aeT.css"); ?>
    " />
    <link rel="stylesheet" href="./aeM.css?
    <?php echo filemtime("aeM.css"); ?>
    " />
    <link rel="stylesheet" href="./aeNav.css?
    <?php echo filemtime("aeNav.css"); ?>
    " />
    <link rel="stylesheet" href="./aeC.css?
    <?php echo filemtime("aeC.css"); ?>
    " />
    
    <link rel="stylesheet" href="./aeD.css?
    <?php echo filemtime("aeD.css"); ?>
    " />


    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />
    <link rel="icon" type="image/jpg" href="devimage/logo.jpg" />
  </head>
  <body>
   





  <?php 
include "aeNav2.php";
include "aeT.php";
include "aeM.php";
include "aeS.php";
include "aeD.php";
?>

    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
      integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
      integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://code.jquery.com/jquery-3.7.0.min.js"
      integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://kit.fontawesome.com/c1db89cf54.js"
      crossorigin="anonymous"
    ></script>

    <script src="ae.js?version=<?php echo filemtime('ae.js'); ?>"></script>
    <script src="productDetails.js?version=<?php echo filemtime('productDetails.js'); ?>"></script>
  </body>
</html>
