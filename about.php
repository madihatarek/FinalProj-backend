<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    $titlePage = "ABOUT";
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
    <div class="container-fluid tm-mt-60">
        <?php
        $header_page = "About Catalog";
         include_once("components/headerPage.php");
         include_once("components/aboutCatalog.php");
         include_once("components/aboutContent1.php");
          include_once("components/aboutContent2.php");
          include_once("components/footer.php");
          include_once("components/footerJS.php");
   ?>
    </div>
    <!-- container-fluid, tm-container-content -->
    <?php
    include_once("components/footer.php");
    include_once("components/footerJS.php");
   ?>

</body>

</html>