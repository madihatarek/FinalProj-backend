<!DOCTYPE html>
<html lang='en'>

<head>
    <?php
$titlePage = 'Login/Register';
include_once( 'pages/loginHead.php' );
?>
</head>

<body class='login'>
    <div>
        <a class='hiddenanchor' id='signup'></a>
        <a class='hiddenanchor' id='signin'></a>

        <div class='login_wrapper'>

            <?php
include_once( 'pages/signIn.php' );
include_once( 'pages/signUp.php' );
?>

        </div>
    </div>
</body>

</html>