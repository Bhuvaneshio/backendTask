<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>

<?php   include_once 'header.php'; 
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
if(isset($_SESSION['u_id']))
if($_SESSION['u_id']==true)
    echo "<br/>Current / Previous User : '".$_SESSION['u_id']."'";
?>
 
<section class="info">
        <h2> HOME </h2>
        <h4>
            <p>Do u have an account ?</p>
            <p>If u have one just login</p>
            <p>If u dont have one click <a class="signup1" href="signup.php">&nbsp sign up &nbsp</a> and create an account</p>
        </h4>
</section>
<br/>

<?php   include_once 'footer.php'; ?>

</body>
</html>

