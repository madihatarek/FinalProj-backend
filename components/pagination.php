<!-- pagination number -->
<div class="row tm-mb-90">
        <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
            <a href="javascript:void(0);" class="btn btn-primary tm-btn-prev mb-2 disabled">Previous</a>
            <div class="tm-paging d-flex">
                <a href="index.php" class="<?php echo $current_page == 'index.php' ? 'active':''; ?> tm-paging-link">1</a>
                <a href="videos.php" class=" <?php echo $current_page == 'videos.php' ? 'active':''; ?> tm-paging-link">2</a>
                <a href="about.php" class=" <?php echo $current_page == 'about.php' ? 'active':''; ?> tm-paging-link">3</a>
                <a href="contact.php" class=" <?php echo $current_page == 'contact.php' ? 'active':''; ?> tm-paging-link">4</a>
            </div>
            <a href="javascript:void(0);" class="btn btn-primary tm-btn-next">Next Page</a>
        </div>
</div>