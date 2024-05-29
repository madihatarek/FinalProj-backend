<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    $titlePage = "PHOTOS-DETAILS";
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
        $header_page = "Photos Details";
        include_once("components/headerPage.php");
        include_once("components/detail.php");
        include_once("components/relatedPhotos.php");
      ?>

    </div>
    <!-- container-fluid, tm-container-content -->

    <?php
      include_once("components/footer.php");
      include_once("components/footerJS.php");
    ?>
</body>

</html>