
<?php   session_start();    
echo '
<link rel="stylesheet" href="../login/styles.css">

<header>
<nav>
<div class="home"><a href="index.php">&nbsp  HOME &nbsp</a></div>
<div id="right"> Hi, '; echo $_SESSION['u_id']; echo '</div> 
<div class="home"><a href="../login/index.php">&nbsp  LOG OUT &nbsp</a></div>

</nav>

</header>

<section class="list">
<ul>
    <br/>
    <li> <a href="add.php">&nbsp Add Expense &nbsp</a> </li> <br/>
    <li> <a href="view.php">&nbsp View Expense &nbsp</a> </li> <br/>
    <li> <a href="delete.php">&nbsp Delete Expense &nbsp</a></li>
    <li> <a href="settle.php">&nbsp SETTLE &nbsp</a></li>
</ul>
</section>
';
?>

<br/>
<pre class="settle">
<p>Beware, You are to settle some amount to other user who you know of..</p>
<p>SETTLE - Enter the amount and the user to whom you should settle with,</p>
<p>the amount gets added to your expense and gets subtracted to their expense</p>
<p>And yeah..!, only if the user exists..</p>
</pre>

<form action="settle.php">
    <input type="text" name="name" placeholder=" To User">
    <input type="text" name="expense" placeholder=" Amount">
    <input type="text" name="comment" placeholder=" Description">
    <button type="submit" name="submit" value="given"> SETTLE </button>
</form>

<?php

if( isset($_GET['name']) && isset($_GET['expense']) && isset($_GET['comment']) && isset($_GET['submit'])){

    $name=$_GET['name'];
    $exp=$_GET['expense'];
    $com=$_GET['comment'];
   
    $host='localhost';
    $user='root';
    $pass='Gear@1807';
    $db='loginsys';
    
    $uid=$_SESSION['u_id'];

    $con=mysqli_connect($host,$user,$pass,$db);
    $stmt="SELECT * FROM users WHERE user_uid='$name'";
    
    $result=mysqli_query($con,$stmt);
    $resultCheck=mysqli_num_rows($result);
    if($resultCheck==0){
        header("Location: settle.php?user=notfound");
        exit();
    }
    else{
    
    $sql="INSERT INTO $uid (Firstname, Expense, Comment) VALUES ('$name',$exp,'$com')";
    $exp1=-$exp;
    $sql1="INSERT INTO $name (Firstname, Expense, Comment) VALUES ('$uid',$exp1,'$com')";

    $query=mysqli_query($con,$sql);
    $query1=mysqli_query($con,$sql1);

    if($query && $query1)
        echo "<br/> Settled to '".$name."' by '".$uid."' success<br/>";
    else
        echo "<br/> Insertion failure<br/>";
    }
}
    
else{
    echo "<br/> Please add detail in every column";
}



/*
<section class="list">
    <form>
<ul>
    <br/>
    <li> <button type="submit" name="add">&nbsp Add Expense &nbsp</button> </li> <br/>
    <li> <button type="submit" name="view">&nbsp View Expense &nbsp</button> </li> <br/>
    <li> <button type="submit" name="delete">&nbsp Delete Expense &nbsp</button></li>
</ul>
    </form>
</section>*/
?>