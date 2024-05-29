<?php
include_once( 'conn.php' );

session_start();
if ( isset( $_SESSION[ 'login' ] ) && $_SESSION[ 'login' ] == true ) {
    header( 'location: users.php' );
    die();
}
if ( !empty( $_POST[ 'signin' ] ) ) {
    if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
        try {
            $password = $_POST[ 'password' ];
            $username = $_POST[ 'username' ];
            $active = 1;
            $sql = 'SELECT `user_id`,`fullname`,`password` FROM `users` WHERE `username` = ? AND `active` = ? ';
            $login_stmt = $conn->prepare( $sql );
            $login_stmt->execute( [ $username, $active ] );
            // if username exist or not
            if ( $login_stmt->rowCount() ) {
                $user_row = $login_stmt->fetch();
                $verifyPass = password_verify( $password, $user_row[ 'password' ] );
                $user_id = $user_row['user_id'];
                $fullname = $user_row['fullname'];
                // Print the result depending if they match
                if ( $verifyPass ) {
                    // echo 'Password Verified :)';
                    $_SESSION[ 'login' ] = true;
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['fullname'] = $fullname;
                    header( 'location:users.php');
                    die;
                } else {
                    echo 'Incorrect Password!';
                }
            } else {
                echo 'Username not found';
            }

        } catch ( PDOException $e ) {
            echo $e->getMessage();

        }
    }

}

?>
<!-- Login Form start -->
<div class='animate form login_form'>
    <section class='login_content'>
        <form action='' method='post' name='signin'>
            <h1>Login Form</h1>
            <div>
                <input type='text' class='form-control' placeholder='Username' required='' name='username' />
            </div>
            <div>
                <input type='password' class='form-control' placeholder='Password' required='' name='password' />
            </div>
            <!-- <div>
<a class = 'btn btn-default submit' href = 'index.html'>Log in</a>
<a class = 'reset_pass' href = '#'>Lost your password?</a>
</div> -->
            <div>
                <input type="hidden" name="user_id">
                <input type='submit' name='signin' value='Log in' class='btn btn-default submit'
                    style='font-size: 13px;'>
                <a class='reset_pass' href='#'>Lost your password?</a>
            </div>

            <div class='clearfix'></div>

            <div class='separator'>
                <p class='change_link'>New to site?
                    <a href='#signup' class='to_register'> Create Account </a>
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
<!-- Login Form end -->