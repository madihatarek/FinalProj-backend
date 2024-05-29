<?php
include_once( 'admin/conn.php' );
if ( isset( $_GET[ 'tag_id' ] ) &&  $_GET[ 'tag_id' ] > 0 ) {
    $tag_id = $_GET[ 'tag_id' ];
}
try {
    $sql = "SELECT * FROM photos WHERE tag_id  =  ?";
    $selected_photo = $conn->prepare( $sql );
    $selected_photo->execute([$tag_id]);
} catch( PDOException $e ) {
    $errMsg =  $e->getMessage();
}



?>
<!-- relatedPhotos start -->
<div class="row mb-4">
    <h2 class="col-12 tm-text-primary">
        Related Photos
    </h2>
</div>
<div class="row mb-3 tm-gallery">
<?php
           foreach($selected_photo->fetchAll() as $photo_record){
            $photo_id = $photo_record['photo_id'];
            $title = $photo_record['title'];
            $photo = $photo_record['photo'];
            $photo_date = date( 'd M Y', strtotime($photo_record['photo_date'] )); 
            $views = $photo_record['views'];
    ?>
     <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5" style="width:370px; height:300px;">
        <figure class="effect-ming tm-video-item" style="width:340px; height:270px; display: flex;
          align-items: center; justify-content:center;align-self:center">
            <img src="admin\images\<?php echo $photo?>" alt="Image" class="img-fluid">
            <figcaption class="d-flex align-items-center justify-content-center">
                <h2><?php echo $title ?></h2>
                <a href="photo-detail.php?photo_id=<?php echo $photo_id?>">View more</a>
            </figcaption>
        </figure>
        <div class="d-flex justify-content-between tm-text-gray">
            <span class="tm-text-gray-light"><?php echo $photo_date?></span>
            <span><?php echo $views?> views</span>
        </div>
    </div>

    <?php } ?>

</div>
<!-- row -->
<!-- relatedPhotos end -->