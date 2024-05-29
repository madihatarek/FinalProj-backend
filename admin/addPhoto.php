<?php
include_once( 'pages/loginCkecker.php' );
include_once( 'conn.php' );
// show categories of photo/..
try {
    $sql = 'SELECT * FROM `tags` ';
    $stmt = $conn->prepare( $sql );
    $stmt->execute();
    $result_tag = $stmt->fetchAll();
} catch( PDOException $e ) {
    $errMsg =  $e->getMessage();
}
// end select category.

//insert into photo table
if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
    try {
        $title = $_POST[ 'title' ];
        $license = $_POST[ 'license' ];
        $dimension = $_POST[ 'dimension' ];
        $format = $_POST[ 'format' ];
        $active = isset( $_POST[ 'active' ] );
        $tag_id = $_POST[ 'tag_id' ];
        $photo_date = $_POST[ 'photo_date' ];
		include_once( 'pages/upload_photo.php' );
		$sql_photo = "INSERT INTO `photos`(`title`, `license`, `dimension`, `format`,`photo`,
		`active`, `tag_id`, `photo_date`) VALUES (?,?,?,?,?,?,?,?)";
        $add_photo = $conn->prepare( $sql_photo );
        $add_photo->execute( [ $title, $license, $dimension, $format,$image_name, $active, $tag_id, $photo_date ] );
        header( 'location:addPhoto.php?insert=success' );
        die;
    } catch ( PDOException $e ) {
        echo 'falied insert: '.$e->getMessage();
    }

}
// end insert into photo table

?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <?php
$titlePage = 'Add Photo';
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
                    <?php
include_once( 'pages/page-title.php' );
if ( isset( $_GET[ 'insert' ] ) && $_GET[ 'insert' ] == 'success' ) {
    ?>
                    <div class='alert alert-success'>
                        <strong>Success!</strong>Inserted_Successfuly
                    </div>
                    <?php }
    ?>

                    <div class='row'>
                        <div class='col-md-12 col-sm-12 '>
                            <div class='x_panel'>
                                <?php
    include_once( 'pages/setting.php' );

    ?>
                                <div class='x_content'>
                                    <br />
                                    <form id='demo-form2' data-parsley-validate class='form-horizontal form-label-left'
                                        action='' method='post' enctype='multipart/form-data'>
                                        <div class='item form-group'>
                                            <label class='col-form-label col-md-3 col-sm-3 label-align'
                                                for='photo-date'>Photo Date <span class='required'>*</span>
                                            </label>
                                            <div class='col-md-6 col-sm-6 '>
                                                <input type='date' id='photo-date' required='required'
                                                    class='form-control ' name='photo_date'>
                                            </div>
                                        </div>
                                        <div class='item form-group'>
                                            <label class='col-form-label col-md-3 col-sm-3 label-align'
                                                for='title'>Title <span class='required'>*</span>
                                            </label>
                                            <div class='col-md-6 col-sm-6 '>
                                                <input type='text' id='title' required='required' class='form-control '
                                                    name='title'>
                                            </div>
                                        </div>
                                        <div class='item form-group'>
                                            <label class='col-form-label col-md-3 col-sm-3 label-align'
                                                for='license'>License <span class='required'>*</span>
                                            </label>
                                            <div class='col-md-6 col-sm-6 '>
                                                <textarea id='content' name='license' required='required'
                                                    class='form-control'>License</textarea>
                                            </div>
                                        </div>
                                        <div class='item form-group'>
                                            <label for='dimension'
                                                class='col-form-label col-md-3 col-sm-3 label-align'>Dimension <span
                                                    class='required'>*</span></label>
                                            <div class='col-md-6 col-sm-6 '>
                                                <input id='dimension' class='form-control' type='text' name='dimension'
                                                    required='required'>
                                            </div>
                                        </div>
                                        <div class='item form-group'>
                                            <label for='format'
                                                class='col-form-label col-md-3 col-sm-3 label-align'>Format <span
                                                    class='required'>*</span></label>
                                            <div class='col-md-6 col-sm-6 '>
                                                <input id='format' class='form-control' type='text' name='format'
                                                    required='required'>
                                            </div>
                                        </div>
                                        <div class='item form-group'>
                                            <label class='col-form-label col-md-3 col-sm-3 label-align'>Active</label>
                                            <div class='checkbox'>
                                                <label>
                                                    <input type='checkbox' class='flat' name='active'>
                                                </label>
                                            </div>
                                        </div>
                                        <div class='item form-group'>
                                            <label class='col-form-label col-md-3 col-sm-3 label-align'
                                                for='image'>Image <span class='required'>*</span>
                                            </label>
                                            <div class='col-md-6 col-sm-6 '>
                                                <input type='file' id='image' name='photo' required='required'
                                                    class='form-control'>
                                            </div>
                                        </div>

                                        <div class='item form-group'>
                                            <label class='col-form-label col-md-3 col-sm-3 label-align' for='tag_id'>Tag
                                                <span class='required'>*</span>
                                            </label>
                                            <div class='col-md-6 col-sm-6 '>
                                                <select class='form-control' name='tag_id' id=''>
                                                    <option value='Please Select the Category of photo'>Please Select the Category of photo</option>
                                                    <?php
    foreach ( $result_tag as $tag ) {
        ?>
                                                    <option value="<?php echo $tag['id'] ?> ">
                                                        <?php echo $tag[ 'tag_name' ];
        ?>
                                                    </option>
                                                    <?php
    }
    ?>
                                                    <!-- <option value = 'cat1'>Category 1</option>
    <option value = 'cat2'>Category 2</option> -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class='ln_solid'></div>
                                        <div class='item form-group'>
                                            <div class='col-md-6 col-sm-6 offset-md-3'>
                                                <button class='btn btn-primary' type='button'>Cancel</button>
                                                <button type='submit' class='btn btn-success'>Add</button>
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