<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    $titlePage = "PHOTOS";
    $current_page = basename($_SERVER['PHP_SELF']);
    include_once("components/head.php");
  ?>
</head>

<body>
    <?php
    include_once("components/pageLoader.php");
    include_once("components/nav.php");
    include_once("components/scroll_image.php"); 
   ?>

    <div class="container-fluid tm-container-content tm-mt-60">
      <?php
       $header_page = "Latest Photos";
       include_once("components/headerPage.php");
        include_once("components/photoContent.php");
        include_once("components/pagination.php");
      ?>
    </div>
    <!-- container-fluid, tm-container-content -->
    <?php
      include_once("components/footer.php");
      include_once("components/footerJS.php");
    ?>
</body>

</html>