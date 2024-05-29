<?php
include_once( 'pages/loginCkecker.php' );
include_once( 'conn.php' );
try {
    $sql = 'SELECT * FROM `users`';
    $usersData = $conn->prepare( $sql );
    $usersData->execute();
    // $usersData->fetchAll();
} catch( PDOException $e ) {
    $errMsg =  $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
      $titlePage = "Users";
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
                    ?>
                    <?php
                        if ( isset( $_GET[ 'updated' ] ) && $_GET[ 'updated' ] == 'success' ) {
                            ?>
                    <div class='alert alert-success'>
                        <strong>Success!</strong>Updated_Successfully
                    </div>
                    <?php
                        } ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <?php
                           include_once("pages/setting.php");
                           ?>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- users data... -->
                                            <div class="card-box table-responsive">
                                                <table id="datatable" class="table table-striped table-bordered"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Registration Date</th>
                                                            <th>Name</th>
                                                            <th>Username</th>
                                                            <th>Email</th>
                                                            <th>Active</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                            foreach($usersData->fetchAll() as $user_row){
                                                                $user_id=$user_row['user_id'];
                                                                $fullname = $user_row['fullname'];
                                                                $username = $user_row['username'];
                                                                $email= $user_row['email'];
                                                                if($user_row['active']==1){
                                                                    $active = "Yes";
                                                                }else{
                                                                    $active = "No";
                                                                }
                                                                $created_at = date( 'd M Y', strtotime( $user_row[ 'created_at' ] ) );
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $created_at ?></td>
                                                            <td><?php echo $fullname ?></td>
                                                            <td><?php echo $username ?></td>
                                                            <td><?php echo $email ?></td>
                                                            <td><?php echo $active ?></td>
                                                            <td><a href="edituser.php?user_id=<?php echo $user_id ?>"
                                                                    onclick="return confirm('Are you sure you want to update this user?')">
                                                                    <img src="./images/edit.png" alt="Edit"></a></td>
                                                        </tr>
                                                        <?php
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- users data end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
        </div>
        <?php
            include_once("pages/footer.php");
        ?>
    </div>
    <?php 
      include_once("pages/footerJS.php");
    ?>
</body>

</html>