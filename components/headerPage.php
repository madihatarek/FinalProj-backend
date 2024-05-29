<div class="row mb-4">
        <h2 class="col-6 tm-text-primary">
            <?php echo $header_page?>
        </h2>
        <?php
            if($current_page == "index.php"){
        
        ?>
        <div class="col-6 d-flex justify-content-end align-items-center">
            <form action="" class="tm-text-primary">
                Page <input type="text" value="1" size="1" class="tm-input-paging tm-text-primary"> of 200
            </form>
        </div>
        <?php
            }
        ?>
</div>