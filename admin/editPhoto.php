<?php
include_once( 'pages/loginCkecker.php' );
include_once( 'conn.php' );
if ( isset( $_GET[ 'photo_id' ] ) &&  $_GET[ 'photo_id' ] > 0 ) {
    $photo_id = $_GET[ 'photo_id' ];
    //Update car into DB...
    if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
        try {
            $sql = "UPDATE `photos` SET `title`=?,`license`=?,`dimension`=?,`format`=?,
            `active`=?,`photo`=?,`tag_id`=?,`photo_date`=? WHERE `photo_id` =?";
            $title = $_POST[ 'title' ];
            $license = $_POST[ 'license' ];
            $dimension = $_POST[ 'dimension' ];
            $format = $_POST[ 'format' ];
            $active = isset($_POST[ 'active' ]);
            if ( $_FILES[ 'photo' ][ 'error' ] === UPLOAD_ERR_OK ) {
                include_once( 'pages/upload_photo.php' );
                $tag_photo = $image_name;
            } else {
                $tag_photo = $_POST[ 'oldPhoto' ];
            }
            $tag_id = $_POST[ 'tag_id' ];
            $photo_date = $_POST[ 'photo_date' ];
            $stmtUpdata = $conn->prepare( $sql );
            $stmtUpdata->execute( [ $title, $license, $dimension, $format,
            $active, $tag_photo, $tag_id, $photo_date, $photo_id ] );
            header( 'location:photos.php?updated=success' );
            die();
        } catch ( PDOException $e ) {
            echo 'falied update: '.$e->getMessage();
        }
    }
    // end updated..
    // show category data/..
    try {
        $sql = 'SELECT * FROM `tags` ';
        $tag_stmt = $conn->prepare( $sql );
        $tag_stmt->execute();
        $tag_result = $tag_stmt->fetchAll();
    } catch( PDOException $e ) {
        $errMsg =  $e->getMessage();
    }
    // end select category.
    // show selected photo details...
    try {
        $photo_sql = 'SELECT * FROM `photos` WHERE `photo_id` = ? ';
        $photo_id= $_GET['photo_id'];
        $photo_stmt = $conn->prepare( $photo_sql );
        $photo_stmt->execute( [ $photo_id ] );
        $result_photo = $photo_stmt->fetch();
        $title = $result_photo[ 'title' ];
        $license = $result_photo[ 'license' ];
        $dimension = $result_photo[ 'dimension' ];
        $format = $result_photo[ 'format' ];
        $active = $result_photo[ 'active' ]?'checked':'';
        $photo = $result_photo['photo'];
        $tag_id = $result_photo[ 'tag_id' ];
        $photo_date = $result_photo[ 'photo_date' ];
    } catch( PDOException $e ) {
        $errMsg =  $e->getMessage();
    }
}
// end selected car data.
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
      $titlePage = "Edit Photo";
      include_once("pages/head.php");
    ?>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php
				include_once("pages/bar.php");
				include_once("pages/navigation.php");
			?>
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <?php include_once("pages/page-title.php");
                    ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <?php include_once("pages/setting.php"); ?>
                                <div class="x_content">
                                    <br />
                                    <form action="" method="post" enctype='multipart/form-data' photo_id="demo-form2"
                                        data-parsley-valphoto_idate class="form-horizontal form-label-left">
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="photo-date">Photo Date <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="date" photo_id="photo-date" required="required"
                                                    class="form-control " name="photo_date"
                                                    value=<?php echo $photo_date ?>>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="title">Title <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" photo_id="title" required="required"
                                                    class="form-control " name="title" value="<?php echo $title ?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="license">License <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <textarea photo_id="content" name="license" required="required"
                                                    class="form-control"><?php echo $license ?></textarea>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="dimension"
                                                class="col-form-label col-md-3 col-sm-3 label-align">Dimension <span
                                                    class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input photo_id="dimension" class="form-control" type="text"
                                                    name="dimension" required="required" value=<?php echo $dimension ?>>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="format"
                                                class="col-form-label col-md-3 col-sm-3 label-align">Format <span
                                                    class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input photo_id="format" class="form-control" type="text" name="format"
                                                    required="required" value=<?php echo $format ?>>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat" name="active"
                                                        <?php echo $active ?>>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="image">Image <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="file" photo_id="photo" name="photo"
                                                    class="form-control">
                                                <br>
                                                <img src="images/<?php echo $photo?>" alt="<?php echo $title ?>"
                                                    style='width:200px'>
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Tag
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <select class='form-control' name='tag_id' id='tag_id'>
                                                    <?php
                                                    foreach ( $tag_result as $tag_row ) {
                                              ?>
                                                    <option value="<?php echo $tag_row['id'];?>"
                                                        <?php echo $tag_id == $tag_row[ 'id' ]?'selected':'' ?>>
                                                        <?php echo $tag_row[ 'tag_name' ];
                                                            ?></option>
                                                    <?php }
                                                     ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="ln_solphoto_id"></div>
                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6 offset-md-3">
                                                <input type='hidden' name='oldPhoto' value="<?php echo $photo?>">
                                                <button class="btn btn-primary" type="button">Cancel</button>
                                                <button type="submit" class="btn btn-success">Add</button>
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
				include_once("pages/footer.php");
			?>

        </div>
    </div>

    <?php
			include_once("pages/footerJS2.php");
		  ?>
</body>

</html>