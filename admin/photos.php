<?php
include_once( 'pages/loginCkecker.php' );
include_once( 'conn.php' );
try {
    $sql = 'SELECT * FROM `photos`';
    $photoData = $conn->prepare( $sql );
    $photoData->execute();
} catch( PDOException $e ) {
    $errMsg =  $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
      $titlePage = "List of Photos";
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
                    <?php   include_once("pages/page-title.php"); 
                      if ( isset( $_GET[ 'delete' ] ) && $_GET[ 'delete' ] == 'success' ) {
                      ?>
                          <div class = 'alert alert-success'>
                          <strong>Success!</strong>Deleted_Successfully
                          </div>
                      <?php
                      }
                    ?>
                     <?php if ( isset( $_GET[ 'updated' ] ) && $_GET[ 'updated' ] == 'success' ) {
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
                                                            <th>Photo Date</th>
                                                            <th>Title</th>
                                                            <th>Active</th>
                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            foreach($photoData->fetchAll() as $photo){
                                                                $photo_id=$photo['photo_id'];
                                                                $title = $photo['title'];
                                                                if($photo['active'] == 1){
                                                                    $active = "Yes";
                                                                }else{
                                                                    $active = "No";
                                                                }
                                                                $photo_date = date( 'd M Y', strtotime( $photo[ 'photo_date' ] ) );
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $photo_date ?></td>
                                                            <td><?php echo $title ?></td>
                                                            <td><?php echo $active ?></td>
                                                            <td><a href="editPhoto.php?photo_id=<?php echo $photo_id ?>"
                                                                    onclick="return confirm('Are you sure you want to update this photo?')">
                                                                    <img src="./images/edit.png" alt="Edit"></a></td>
                                                            <td><a href="deletePhoto.php?photo_id=<?php echo $photo_id ?>"
                                                                    onclick="return confirm('Are you sure you want to delete this photo?')">
                                                                  <img src="./images/delete.png" alt="Edit"></a></td>
                                                        </tr>
                                                        <?php }
                                                        ?>


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