<?php
include_once( 'pages/loginCkecker.php' );
include_once( 'conn.php' );
if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
        try {
            $sql = "INSERT INTO `users`(`fullname`, `username`, `email`, `password`, `active`) 
            VALUES (?,?,?,?,?)";
            $fullname = $_POST[ 'fullname' ];
            $username = $_POST['username']; 
            $email = $_POST[ 'email' ];
            $password = password_hash( $_POST[ 'password' ], PASSWORD_DEFAULT );
            $active =isset($_POST[ 'active' ]);
            $add_stmt = $conn->prepare( $sql );
            $add_stmt->execute( [ $fullname, $username,$email,$password,$active ] );
            // echo 'Inserted Successfuly';
            header('location:addUser.php?insert=success');
            die;
        } catch ( PDOException $e ) {
            echo 'falied insert: '.$e->getMessage();
        }
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
      $titlePage = "Add User";
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
            }
            ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <?php
                           include_once("pages/setting.php"); 
                        ?>
                                <div class="x_content">
                                    <br />
                                    <form action="" method="post" id="demo-form2" data-parsley-validate
                                        class="form-horizontal form-label-left">
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="first-name">Full Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="first-name" required="required"
                                                    class="form-control " name="fullname">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="user-name">Username <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="user-name" name="username" required="required"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="email"
                                                class="col-form-label col-md-3 col-sm-3 label-align">Email <span
                                                    class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input id="email" class="form-control" type="email" name="email"
                                                    required="required">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat" name="active">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="password">Password <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="password" id="password" name="password" required="required"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6 offset-md-3">
                                                <button class="btn btn-primary" type="submit"
                                                    formaction="users.php">Cancel</button>
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