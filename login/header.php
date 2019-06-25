<?php
session_start();

?>

<link rel="stylesheet" href="styles.css">


<header>
    <nav>
        <div class="home"><a href="index.php">&nbsp  HOME &nbsp</a></div>
        <div class="login">
            <form action="includes/login-inc.php" method="POST">
                <input type="text" name="user" placeholder="User Name"> 
                <input type="password" name="pass" placeholder="PassWord">
                <button type="submit" name="login" value="submit"> LOGIN </button>
            </form>
            <br/><br/>
        </div>
        <div><a class="signup" href="signup.php"> &nbsp SIGN UP &nbsp </a></div>

    </nav>
</header>