<?php
include_once( 'admin/conn.php' );
if ( isset( $_GET[ 'photo_id' ] ) &&  $_GET[ 'photo_id' ] > 0 ) {
    $photo_id = $_GET[ 'photo_id' ];
}
try {
    $sql = "SELECT photos.photo_id,photos.title,photos.`license`,photos.dimension,photos.`format`,
    photos.`photo`,photos.`active`, photos.`tag_id`,photos.`photo_date`,photos.`views`,
    tags.tag_name 
    FROM `photos` INNER JOIN tags on tags.id = photos.tag_id AND `photo_id` = ?";
    $selected_photo = $conn->prepare( $sql );
    $selected_photo->execute([$photo_id]);
    $result_selected = $selected_photo->fetch();
    $title = $result_selected[ 'title' ];
    $license = $result_selected[ 'license' ];
    $dimension = $result_selected[ 'dimension' ];
    $format = $result_selected[ 'format' ];
    $active = $result_selected[ 'active' ]?'checked':'';
    $photo = $result_selected['photo'];
    $tag_id = $result_selected[ 'tag_id' ];
    $photo_date = $result_selected[ 'photo_date' ];
    $tag_name = $result_selected['tag_name'];
} catch( PDOException $e ) {
    $errMsg =  $e->getMessage();
}

//increase views in database....
try {
    $sql = "UPDATE `photos` SET photos.`views` = photos.`views`+1 WHERE `photo_id` = ?";
    $selected_photo = $conn->prepare( $sql );
    $selected_photo->execute([$photo_id]);
} catch( PDOException $e ) {
    $errMsg =  $e->getMessage();
}
?>
<!-- detail start -->
<div class="row tm-mb-90">
    <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12" style="display: flex;
          align-items: center; justify-content:center;align-self:center">
        <img src="admin\images\<?php echo $photo?>" alt="Image" class="img-fluid" style="width:700px; height:700px;" >
    </div>
    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
        <div class="tm-bg-gray tm-video-details">
            <p class="mb-4">
                Please support us by making <a href="https://paypal.me/templatemo" target="_parent" rel="sponsored">a
                    PayPal donation</a>. Nam ex nibh, efficitur eget libero ut, placerat
                aliquet justo. Cras nec varius leo.
            </p>
            <div class="mb-4">
                <h3 class="tm-text-gray-dark mb-3">Title</h3>
                <span class="tm-text-gray-dark mb-3"><?php echo $title ?></span>
            </div>
            <div class="text-center mb-5">
                <a href="#" class="btn btn-primary tm-btn-big">Download</a>
            </div>
            <div class="mb-4 d-flex flex-wrap">
                <div class="mr-4 mb-2">
                    <span class="tm-text-gray-dark">Dimension: </span><span class="tm-text-primary"><?php echo $dimension ?></span>
                </div>
                <div class="mr-4 mb-2">
                    <span class="tm-text-gray-dark">Format: </span><span class="tm-text-primary"><?php echo $format ?></span>
                </div>
            </div>
            <div class="mb-4">
                <h3 class="tm-text-gray-dark mb-3">License</h3>
                <p><?php echo $license ?></p>
            </div>
            <div>
                <h3 class="tm-text-gray-dark mb-3">Tags</h3>
                <span class="tm-text-primary"><?php echo $tag_name ?></span>
                <!-- <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Cloud</a>
                <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Bluesky</a>
                <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Nature</a>
                <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Background</a>
                <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Timelapse</a>
                <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Night</a>
                <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">Real Estate</a> -->
            </div>
        </div>
    </div>
</div>

<!-- detail end -->