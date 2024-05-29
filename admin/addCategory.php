<?php
include_once( 'pages/loginCkecker.php' );
include_once( 'conn.php' );
if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
        try {
            $sql = "INSERT INTO `tags`(`tag_name`) 
            VALUES (?)";
            $tag_name = $_POST[ 'tag_name' ];
            $add_tag = $conn->prepare( $sql );
            $add_tag->execute( [$tag_name] );
            header('location:addCategory.php?insert=success');
            die();
        } catch (PDOException $e) {
            if ($e->getCode() == '23000' && strpos($e->getMessage(), 'Duplicate entry') !== false) {
                header('Location: addCategory.php?insert=failed');
                die;
            } else {
                echo "Invalid: " . $e->getMessage();
            }
        }
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
      $titlePage = "Add Tag";
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
                <?php
                    include_once("pages/page-title.php");
               if ( isset( $_GET[ 'insert' ] ) && $_GET[ 'insert' ] == 'success' ) {
                ?>
                    <div class='alert alert-success'>
                        <strong>Success!</strong>Inserted_Successfuly
                    </div>
                                            <?php
            }else if(isset( $_GET[ 'insert' ] ) && $_GET[ 'insert' ] == 'failed'){
            ?>
                     <div class='alert alert-danger'>
                        <strong>Failed! </strong>This Category is already exist.
                    </div>
                <?php } ?>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                            <?php
                           include_once("pages/setting.php"); 
                        ?>
                                <div class="x_content">
                                    <br />
                                    <form action="" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="add-category">Add Tag <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="add-category" required="required"
                                                    class="form-control " name="tag_name">
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6 offset-md-3">
                                                <button class="btn btn-primary"  type="submit" formaction="categories.php">Cancel</button>
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