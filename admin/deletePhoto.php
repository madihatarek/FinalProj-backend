<?php
include_once( 'pages/loginCkecker.php' );
include_once( 'conn.php' );
if ( isset( $_GET[ 'photo_id' ] ) &&  $_GET[ 'photo_id' ] > 0 ) {
    $photo_id = $_GET[ 'photo_id' ];
// delete from photo from table.
    try {
        $sql = 'DELETE FROM `photos` WHERE `photo_id`= ?';
        $stmt = $conn->prepare( $sql );
        $stmt->execute( [ $photo_id ] );
        header( 'Location:photos.php?delete=success' );
        die();
    } catch( PDOException $e ) {
        echo 'Error'.$e->getMessage();
    }
} else {
    echo 'Invalphoto_id Request';

}
?>