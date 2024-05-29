<?php
    //check user logged
    include_once( 'pages/loginCkecker.php' );
    // db connection
    include_once( 'conn.php' );
     //get id if found.
     if ( isset( $_GET[ 'user_id' ] ) ) {
        $user_id = $_GET[ 'user_id' ];
    } else {
        header( 'location:users.php' );
        die;
    }
    //START update user
     if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
        try {
            $sql = "UPDATE `users` SET `fullname`=?,`username`=?,`email`=?,`password`=?,`active`=? WHERE `user_id` =?";
            $fullname = $_POST[ 'fullname' ];
            $username = $_POST['username'];
            $email = $_POST[ 'email' ];
            if ( empty( $_POST[ 'password' ] ) ) {
                $password = $_POST[ 'oldPassword' ];
            } else {
                $password = password_hash( $_POST[ 'password' ], PASSWORD_DEFAULT );
            }
            $active = isset( $_POST[ 'active' ] );
            $stmt = $conn->prepare( $sql );
            $stmt->execute([$fullname, $username, $email, $password, $active, $user_id]);
            // echo 'updated Successfuly';
            header( 'location:users.php?updated=success' );
            die;
        }catch( PDOException $e ) {
        $errMsg = $e->getMessage();
       }
    }else {
        echo 'invalid';
    }
    //end update user
    // start user person data...
    try {
        $sql = 'SELECT * FROM `users` WHERE `user_id` = ?';
        $stmt = $conn->prepare( $sql );
        $stmt->execute( [ $user_id ] );
        // if ( $stmt->rowCount() ) {
        $row_result = $stmt->fetch();
        $fullname = $row_result[ 'fullname' ];
        $username = $row_result['username'];
        $email = $row_result[ 'email' ];
        $password = $row_result['password'];
        $active = $row_result[ 'active' ]?'checked':'';
    } catch( PDOException $e ) {
        $errMsg = $e->getMessage();
    }
    //end select user data...
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
      $titlePage = "Edit User";
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
                                                for="first-name">Full Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="first-name" required="required"
                                                    class="form-control " name="fullname" value="<?php echo $fullname?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="user-name">Username <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="user-name"  required="required"
                                                    class="form-control" name="username" value="<?php echo $username?>" >
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="email"
                                                class="col-form-label col-md-3 col-sm-3 label-align">Email <span
                                                    class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input id="email" class="form-control" type="email" name="email" value="<?php echo $email?>"
                                                    required="required">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat"  name='active'  <?php echo $active?>>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="password">Password <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="password" id="password" name="password"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6 offset-md-3">
                                                <button class="btn btn-primary" type="submit" formaction="users.php">Cancel</button>
                                                <input type="hidden" name="oldPassword" value=<?php echo $password ?>>
                                                <input type="submit" value="Update" class="btn btn-success"/>
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