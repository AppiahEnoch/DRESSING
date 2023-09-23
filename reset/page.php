<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Reset | aamutsed IRB online</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
   
    <link rel="stylesheet" href="./style1.css?
    <?php echo filemtime("style1.css"); ?>
    " />
    <link rel="stylesheet" href="./style2.css?
    <?php echo filemtime("style2.css"); ?>
    " />
    <link rel="stylesheet" href="./aeR.css?
    <?php echo filemtime("aeR.css"); ?>
    " />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />
    <link rel="icon" type="image/png" href="../dev_image/2.jpeg" />

    <link rel="stylesheet" href="fw/all.css">
  </head>
  <body>
    <div id="fixed-Header-wrapper" class="row m-0 p-0 bg-color">
      <div id="headerContainer1" class="container-fluid p-1 m-0">
        <div class="row d-flex gap-0">
          <div id="social-links" class="row align-items-center mt-2">
            <div class="col-6 d-none d-sm-block align-items-center text-center">
              <h6
                style="text-align: center"
                class="text-start align-items-center"
              >
                <a
              class="heading-color"
                  href="#"
                  aria-label="AAMUSTED Fair Elections App"
                  >AAMUSTED Internship Record Book (IRB)</a
                >
            
              </h6>
            </div>
            <div class="col-12 col-sm-6 text-center text-sm-end">
              <a
              class="link-icon"
                href="https://www.facebook.com"
                target="_blank"
                aria-label="Visit our Facebook page"
              >
                <i
                  class="fa fa-facebook"
                  aria-hidden="true"
                  alt="Facebook Icon"
                ></i>
              </a>
              <a
                class="link-icon"
                href="https://www.instagram.com"
                target="_blank"
                aria-label="Visit our Instagram page"
              >
                <i
                  class="fa fa-instagram"
                  aria-hidden="true"
                  alt="Instagram Icon"
                ></i>
              </a>
              <a
              class="link-icon"
                href="https://www.twitter.com"
                target="_blank"
                aria-label="Visit our Twitter page"
              >
                <i
                  class="fa fa-twitter"
                  aria-hidden="true"
                  alt="Twitter Icon"
                ></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <?php 
    include "aeR.php";
    include "../aeT.php";
    include "../aeM.php";
    include "../aeS.php";
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
    <script src="aeR.js?version=<?php echo filemtime('aeR.js'); ?>"></script>
    <script src="selectID.js?version=<?php echo filemtime('selectID.js'); ?>"></script>
  </body>
</html>
