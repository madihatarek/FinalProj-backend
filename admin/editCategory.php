<?php
include_once( 'pages/loginCkecker.php' );
include_once( 'conn.php' );
//get id if found.
if ( isset( $_GET[ 'id' ] ) && $_GET['id'] > 0) {
    $id = $_GET[ 'id' ];
} else {
    header( 'location:categories.php' );
    die;
}
//START update tag(category..)
if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
    try {
        $sql = 'UPDATE `tags` SET `tag_name`=? WHERE `id` =?';
        $tag_name = $_POST[ 'tag_name' ];
        $edit_tag = $conn->prepare( $sql );
        $edit_tag->execute( [$tag_name , $id] );
        header( 'location:categories.php?updated=success' );
        die;
    } catch( PDOException $e ) {
        $errMsg = $e->getMessage();
    }
} else {
    echo 'invalid';
}
//end update tag
// start select tag data...
try {
    $sql = 'SELECT * FROM `tags` WHERE `id` = ?';
    $select_tag = $conn->prepare( $sql );
    $select_tag->execute( [ $id ] );
    $tag_row = $select_tag->fetch();
    $tag_name = $tag_row[ 'tag_name' ];
} catch( PDOException $e ) {
    $errMsg = $e->getMessage();
}
//end sselect tag data...
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <?php
$titlePage = 'Edit Tag';
include_once( 'pages/head.php' );
?>
</head>

<body class='nav-md'>
    <div class='container body'>
        <div class='main_container'>
            <?php
include_once( 'pages/bar.php' );
include_once( 'pages/navigation.php' );
?>

            <!-- page content -->
            <div class='right_col' role='main'>
                <div class=''>
                    <?php  include_once( 'pages/page-title.php' );
                        ?>
                    <div class='row'>
                        <div class='col-md-12 col-sm-12 '>
                            <div class='x_panel'>
                                <?php include_once( 'pages/setting.php' );?>
                                <div class='x_content'>
                                    <br />
                                    <form action="" method="post" id='demo-form2' data-parsley-validate class='form-horizontal form-label-left'>
                                        <div class='item form-group'>
                                            <label class='col-form-label col-md-3 col-sm-3 label-align'
                                                for='add-category'>Edit Tag <span class='required'>*</span>
                                            </label>
                                            <div class='col-md-6 col-sm-6 '>
                                                <input type='text' id='add-category' required='required'
                                                    class='form-control ' name="tag_name" value="<?php echo $tag_name ?>" >
                                            </div>
                                        </div>

                                        <div class='ln_solid'></div>
                                        <div class='item form-group'>
                                            <div class='col-md-6 col-sm-6 offset-md-3'>
                                                <button class='btn btn-primary' type="submit" formaction="categories.php">Cancel</button>
                                                <button type='submit' class='btn btn-success'>Update</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /page content -->

            <?php
    include_once( 'pages/footer.php' );
    ?>

        </div>
    </div>

    <?php
    include_once( 'pages/footerJS2.php' );
    ?>

</body>

</html>