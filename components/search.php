<?php
include_once( 'admin/conn.php' );
if(isset($_GET['search'])){
    $search_item = $_GET[ 'search_item' ];
    $sql = "SELECT `photo_id`, `title`, `photo`, `photo_date`, `tag_id`,`views` FROM `photos` WHERE `active` = 1  AND `title` LIKE :keyword ORDER BY `photo_date` DESC;";
    $selected_photo = $conn->prepare( $sql );
    $selected_photo->bindValue(':keyword', '%' . $search_item . '%');
    $selected_photo->execute();
    // $result = $selected_photo->fetchAll();
}

?>