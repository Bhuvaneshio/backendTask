<?php


session_start();

$host='localhost';
$user='root';
$pass='Gear@1807';
$db='loginsys';

$con=mysqli_connect($host,$user,$pass,$db);
if(isset($_GET['user']))
$uid=$_GET['user'];
echo '
<link rel="stylesheet" href="../login/styles.css">

<header>
<nav class="navi">
<div class="home"><a href="index.php">&nbsp  HOME &nbsp</a></div>
<div id="right"> Hi, '; echo $_SESSION['u_id'].' </div> 
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
<br/>
<section style="text-align:center;">
    <p>Welcome to the DashBoard of expenses</p>
    <p>press any one of the tabs above</p>
    <p>START SAVING, BTW..!</p>
</section>
';
/*
if(isset($_GET['user'])){
    
$sql="CREATE TABLE $uid ( PersonId int AUTO_INCREMENT, FirstName varchar(255), Expense int(20), Comment varchar(255), PRIMARY KEY(PersonId)) ";

$query=mysqli_query($con,$sql);
echo "<br/><br/><br/>";
if($query) echo "table created..";
}
*/
?>