<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title></title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./page.css?<?php echo filemtime("page.css"); ?>" />
    <link rel="stylesheet" href="./colors.css?<?php echo filemtime("colors.css"); ?>" />
    <link rel="stylesheet" href="../aeT.css?<?php echo filemtime("../aeT.css"); ?>" />
    <link rel="stylesheet" href="../aeM.css?<?php echo filemtime("../aeM.css"); ?>" />
    <link rel="stylesheet" href="../aeS.css?<?php echo filemtime("../aeS.css"); ?>" />
  </head>
  <body>

  <div class="container-fluid mb-0">
    <div class="row justify-content-center mt-0">
        <div class="col-12 justify-content-center align-items-center d-flex mt-0">
            <img src="logo.jpg" alt="App Logo" class="img-fluid mb-0">
        </div>
    </div>
</div>




  <?php
  include "./login.php";
  include "./account.php";
  include "./forgot.php";
  include "../aeS.php";
  include "../aeM.php";
  include "../aeT.php";
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
    <script src="https://kit.fontawesome.com/c1db89cf54.js" crossorigin="anonymous"></script>

    <script src="../ae.js?version=<?php echo filemtime('../ae.js'); ?>"></script>
    <script src="page.js?version=<?php echo filemtime('page.js'); ?>"></script>
    <script src="account.js?version=<?php echo filemtime('account.js'); ?>"></script>
    <script src="login.js?version=<?php echo filemtime('login.js'); ?>"></script>
    <script src="forgot.js?version=<?php echo filemtime('forgot.js'); ?>"></script>
    
    
  </body>
</html>
