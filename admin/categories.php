<?php
include_once( 'pages/loginCkecker.php' );
include_once( 'conn.php' );
try {
    $sql = 'SELECT * FROM `tags`';
    $tagsData = $conn->prepare( $sql );
    $tagsData->execute();
    $tag_result = $tagsData->fetchAll();
} catch( PDOException $e ) {
    $errMsg =  $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
      $titlePage = "Tags";
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
                    <?php  include_once("pages/page-title.php"); ?>
                    <?php
                    if ( isset( $_GET[ 'delete' ] ) && $_GET[ 'delete' ] == 'success' ) {
                    ?>
                        <div class = 'alert alert-success'>
                        <strong>Success!</strong>Deleted_Successfully
                        </div>
                    <?php
                    } else  if ( isset( $_GET[ 'delete' ] ) && $_GET[ 'delete' ] == 'failed' ) { ?>
                     <div class = 'alert alert-danger'>
                        <strong>This Category contains items</strong> ,can't delete it.
                        </div>
                        <?php } ?>
                        <?php
                        if ( isset( $_GET[ 'updated' ] ) && $_GET[ 'updated' ] == 'success' ) {
                            ?>
                            <div class = 'alert alert-success'>
                            <strong>Success!</strong>Updated_Successfully
                            </div>
                            <?php
                        } ?> 
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                               <?php include_once("pages/setting.php"); ?>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box table-responsive">
                                                <table id="datatable" class="table table-striped table-bordered"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Tag Name</th>
                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach($tag_result as $tag_row) {
                                                            $id = $tag_row['id'];
                                                            $tag_name = $tag_row['tag_name'];
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $tag_name?></td>
                                                            <td><a href="editCategory.php?id=<?php echo $id ?>"
                                                                    onclick="return confirm('Are you sure you want to update this tag?')">
                                                                    <img src="./images/edit.png" alt="Edit"></a></td>
                                                            <td><a href="deletetag.php?id=<?php echo $id ?>"
                                                                    onclick="return confirm('Are you sure you want to delete this tag?')">
                                                                    <img src="./images/delete.png" alt="Delete"></a></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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
			include_once("pages/footerJS.php");
		  ?>

</body>

</html>