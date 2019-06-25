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
    <?php   include_once 'header.php'; ?>
    
    <section class="sign">
        <h2> SIGN-UP </h2>
        <h5>*fill the form below*</h5>
        <form action="includes/signup-inc.php" method="POST">
            <input type="text" name="first" placeholder="First Name">
            <input type="text" name="last" placeholder="Last Name">
            <input type="text" name="email" placeholder="E-mail">
            <input type="text" name="uid" placeholder="User Name">
            <input type="password" name="pwd" placeholder="PassWord">
            <button type="submit" name="submit">Sign-up</button>
        </form>
    </section>
    
    <?php   include_once 'footer.php'; ?>

</body>
</html>