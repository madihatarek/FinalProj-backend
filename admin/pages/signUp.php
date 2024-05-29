<?php
include_once( 'conn.php' );
if ( !empty($_POST[ 'signup' ])) {
    if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
        // echo $_POST[ 'fullname' ];
        try {
            $sql = "INSERT INTO `users`(`fullname`, `username`, `email`, `password`) 
        VALUES (?,?,?,?);";
            $fullname = $_POST[ 'fullname' ];
            $username = $_POST[ 'username' ];
            $email = $_POST[ 'email' ];
            $password = password_hash( $_POST[ 'password' ], PASSWORD_DEFAULT );
            $stmtUser = $conn->prepare( $sql );
            $stmtUser->execute( [ $fullname, $username, $email,  $password, ] );
            header('Location: login.php?insert=success');
            die;
            // echo 'Registered Successfuly';
        } catch ( PDOException $e ) {
            if ($e->getCode() == '23000' && strpos($e->getMessage(), 'Duplicate entry') !== false) {
                header('Location: login.php?insert=failed');
                die;
            } else {
                echo "Invalid: " . $e->getMessage();
            }
        }

    }
}

?>

<!-- register Form start -->
<div id='register' class='animate form registration_form'>
                <?php
               if ( isset( $_GET[ 'insert' ] ) && $_GET[ 'insert' ] == 'success' ) {
                ?>
                    <div class='alert alert-success'>
                        <strong>Success!</strong>Registered Successfuly
                    </div>
                                            <?php
            }else if(isset( $_GET[ 'insert' ] ) && $_GET[ 'insert' ] == 'failed'){
            ?>
                     <div class='alert alert-danger'>
                        <strong>Failed! </strong>This email or username is already exist.
                    </div>
                <?php } ?>
    <section class='login_content'>
        <form action='' method='post' name='signup'>
            <h1>Create Account</h1>
            <div>
                <input type='text' class='form-control' placeholder='Fullname' required='' name='fullname' />
            </div>
            <div>
                <input type='text' class='form-control' placeholder='Username' required='' name='username' />
            </div>
            <div>
                <input type='email' class='form-control' placeholder='Email' required='' name='email' />
            </div>
            <div>
                <input type='password' class='form-control' placeholder='Password' required='' name='password' />
            </div>
            <div>
                <!-- <a class = 'btn btn-default submit' href = '#signup'>Submit</a><br> -->
                <input type='submit' name='signup' value='Submit' class='btn btn-default submit' style='font-size: 13px;width:100%; margin-left:-1px;
                    '>

            </div>

            <div class='clearfix'></div>

            <div class='separator'>
                <p class='change_link'>Already a member ?
                    <a href='#signin' class='to_register'> Log in </a>
                </p>

                <div class='clearfix'></div>
                <br />

                <div>
                    <h1><i class='fa fa-file-image-o'></i></i> Images Admin</h1>
                    <p>©2016 All Rights Reserved. Images Admin is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
            </div>
        </form>
    </section>
</div>
<!-- register Form start -->