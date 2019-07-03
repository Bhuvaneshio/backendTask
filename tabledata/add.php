
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
<p>Beware, You are to add some expense to your own account...</p>
<p>ADD - Enter the amount and the name of expense,</p>
<p>the amount gets added to your expense and give comments on which how u spent the amount</p>
<p>And yeah..!, START SAVING..</p>
</pre>

<form action="add.php">
    <input type="int" name="id" placeholder=" id">
    <input type="text" name="name" placeholder=" name">
    <input type="text" name="expense" placeholder=" amount">
    <input type="text" name="comment" placeholder=" comment">
    <button type="submit" name="submit" value="given"> ADD </button>
</form>

<?php

if(isset($_GET['id']) && isset($_GET['name']) && isset($_GET['id']) && isset($_GET['expense']) && isset($_GET['comment']) && isset($_GET['submit'])){
    $id=$_GET['id'];
    $name=$_GET['name'];
    $exp=$_GET['expense'];
    $com=$_GET['comment'];
   
    $host='localhost';
    $user='root';
    $pass='Gear@1807';
    $db='loginsys';
    
    $uid=$_SESSION['u_id'];

    $con=mysqli_connect($host,$user,$pass,$db);

    $stmt="SELECT COUNT(PersonId) FROM expense GROUP BY user_uid HAVING COUNT(PersonId)>1";
    $result=mysqli_query($con,$stmt);
    $rowCheck=mysqli_num_rows($result);

    if($rowCheck == 1){
    
    //change personid into non primary or column which allows duplicate values..

    $sql="INSERT INTO expense (PersonId, user_uid, Firstname, Expense, Comment) VALUES ($id,'$uid','$name',$exp,'$com')";
    
    $query=mysqli_query($con,$sql);
    if($query)
        echo "<br/> Inserted success<br/>";
    else
        echo "<br/> Insertion failure<br/>";
    }

    else {
        echo "<br/> Invalid ID <br/>";
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