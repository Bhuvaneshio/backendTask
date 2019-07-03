
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
<p>Beware, You are to delete some expense you made from your own account...</p>
<p>DELETE - Enter the id of the expense you need to remove from the list,</p>
<p>You may check the id from the view expenses tab and then enter in the input form</p>
<p>And yeah..!, DELETE IF YOU MEAN IT..</p>
</pre>


<form action="delete.php">
        <select name="action">
            <option> *select criteria* </option>
            <option> ID </option>
            <option> NAME </option>
        </select>
    
    <input type="int" name="value" placeholder=" value">
    <button type="submit" name="submit" value="given"> DELETE </button>
</form>

<?php

if(isset($_GET['value']) && isset($_GET['submit']) && isset($_GET['action'])){


    $value=$_GET['value'];
    $action=$_GET['action'];

    $host='localhost';
    $user='root';
    $pass='Gear@1807';
    $db='loginsys';
    
    $check=true;
    $uid=$_SESSION['u_id'];

    $con=mysqli_connect($host,$user,$pass,$db);

    switch($action){
        case 'ID':  $stmt="SELECT * FROM expense WHERE PersonId = $value AND user_uid = '$uid'";
                    $result=mysqli_query($con,$stmt);
                    $rowCheck=mysqli_num_rows($result);
                
                
                    if($rowCheck==0){
                        $check=false;        
                    }
                
                    if($check){
                    $sql="DELETE FROM expense WHERE PersonId = $value AND user_uid = '$uid' ";
                    $query=mysqli_query($con,$sql); }
                    break;
      case 'NAME':  $stmt="SELECT * FROM expense WHERE FirstName = '$value' AND user_uid = '$uid'";
                    $result=mysqli_query($con,$stmt);
                    $rowCheck=mysqli_num_rows($result);
                
                
                    if($rowCheck==0){
                        $check=false;        
                    }
                
                    if($check){
                    $sql="DELETE FROM expense WHERE FirstName = '$value' AND user_uid = '$uid' ";
                    $query=mysqli_query($con,$sql);} 
                    break;
        case '*select criteria*':  
                    header("Location: delete.php?error=notselected");
                    echo " <pre>Please select something..<pre/>";
                    break;
    }

    
    if(empty($query)){
        echo "<br/> Deletion failure";
    }
    else{
        if($query){
            echo "<br/>Deletion success";
        }
        
        else{
            echo "<br/> Deletion failure";
            echo "<br/> Enter only valid value<br/>";
            echo "<pre> You can check existing id's in the view tab<pre/>";
        }
    }

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