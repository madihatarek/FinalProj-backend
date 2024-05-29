<div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll"
    data-image-src="img/hero.jpg">
    <?php
            if($current_page == "index.php" || $current_page == "photo-detail.php"){
        
        ?>
    <form action="" method="get" class="d-flex tm-search-form">
        <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search" name="search_item" >
        <button class="btn btn-outline-success tm-search-btn" type="submit" name="search">
            <i class="fas fa-search"></i>
        </button>
    </form>
    <?php
            }
        ?>

</div>