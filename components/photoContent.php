<?php
include_once( 'admin/conn.php' );
try {
    $sql = "SELECT `photo_id`, `title`, `photo`, `photo_date`, `tag_id`,`views` FROM `photos` WHERE `active` = 1 ORDER BY `photo_date` DESC;";
    $selected_photo = $conn->prepare( $sql );
    $selected_photo->execute();
} catch( PDOException $e ) {
    $errMsg =  $e->getMessage();
}
?>
<!-- photo contant -->
<div class="row tm-mb-90 tm-gallery">
    <?php
           include_once("search.php");
           foreach($selected_photo->fetchAll() as $photo_record){
            $photo_id = $photo_record['photo_id'];
            $title = $photo_record['title'];
            $photo = $photo_record['photo'];
            $photo_date = date( 'd M Y', strtotime($photo_record['photo_date'] )); 
            $views = $photo_record['views'];
            $tag_id = $photo_record['tag_id'];
    ?>
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5" style="width:370px; height:300px;">
        <figure class="effect-ming tm-video-item" style="width:340px; height:270px; display: flex;
          align-items: center; justify-content:center;align-self:center">
            <img src="admin\images\<?php echo $photo?>" alt="Image" class="img-fluid">
            <figcaption class="d-flex align-items-center justify-content-center">
                <h2><?php echo $title ?></h2>
                <a href="photo-detail.php?photo_id=<?php echo $photo_id?> &&tag_id=<?php echo $tag_id?>">View more</a>
            </figcaption>
        </figure>
        <div class="d-flex justify-content-between tm-text-gray">
            <span class="tm-text-gray-light"><?php echo $photo_date?></span>
            <span><?php echo $views?> views</span>
        </div>
    </div>
        <?php }
    // }
       ?>
</div>
<!-- row -->