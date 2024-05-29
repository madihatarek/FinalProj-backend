<?php
include_once( 'pages/loginCkecker.php' );
include_once( 'conn.php' );
if ( isset( $_GET[ 'id' ] ) &&  $_GET[ 'id' ] > 0 ) {
    $id = $_GET[ 'id' ];

    //select photo data...
    try{
    $sql_select = 'SELECT * FROM `photos` WHERE `tag_id` = ?';
    $tagsData = $conn->prepare( $sql_select );
    $tagsData->execute([$id]);
    $tag_result = $tagsData->fetch();
    }catch( PDOException $e ) {
        echo 'Error'.$e->getMessage();
        // $alert = 'alert-danger';
    }
// delete from tag table.
    try {
        if (!isset($tag_result['tag_id'])){
        $sql = 'DELETE FROM `tags` WHERE `id`= ?';
        $stmt = $conn->prepare( $sql );
        $stmt->execute( [ $id ] );
        header( 'Location:categories.php?delete=success' );
        die();
        } else {
            header( 'Location:categories.php?delete=failed' );
            die();
        }
    } catch( PDOException $e ) {
        echo 'Error'.$e->getMessage();
        // $alert = 'alert-danger';
    }
} else {
    echo 'Invalid Request';

}
?>