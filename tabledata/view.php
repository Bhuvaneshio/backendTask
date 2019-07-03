
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
<p>Hold On, You are to view all of your expenses you made...</p>
<p>VIEW - Enter the column and the order for sorting,</p>
<p>the expense table gets sorted by the order you give and the column you give, </p>
<p>And yeah..!, START SAVING..</p>
</pre>

<form action="view.php">
        <select name="action">
            <option> *select criteria* </option>
            <option> ID </option>
            <option> NAME </option>
            <option> EXPENSE </option>
            <option> COMMENTS </option>
        </select>
        <select name="order" >
            <option> *select the sort type* </option>
            <option> Ascending </option>
            <option> Descending </option>
        </select>
    <button type="submit" name="submit" value="given"> VIEW </button>
</form>

<?php
if(isset($_GET['submit']) && isset($_GET['action']) && isset($_GET['order'])){
    
    $host='localhost';
    $user='root';
    $pass='Gear@1807';
    $db='loginsys';

    $order=$_GET['order'];
    $sort=$_GET['action'];
    $total=0;
    switch($order){
        case 'Ascending':$order='ASC';
        break;
        case 'Descending':$order='DESC';
        break;
        case '*select the sort type*': header("Location: view.php?error=noorder");
        echo " <br/> Give the order type";
        break;
    }
    switch ($sort){

    case 'NAME':    
        $con=mysqli_connect($host,$user,$pass,$db);
        $uid=$_SESSION['u_id'];
        $stmt = $con->prepare("SELECT * FROM expense WHERE user_uid = '$uid' ORDER BY FirstName $order");
        $stmt->execute();
        $stmt->bind_result($PersonId,$Username,$FirstName,$Expense,$Comment);
                   
        echo '<table style="width:100%;border:1px solid black;border-collapse:collapse;">';
        echo "<tr> <th>".$uid."'s Expense List </th></tr></table>";

        echo '<table style="width:100%;border:1px solid black;border-collapse:collapse;">';
        echo "<tr> <th> ID </th> <th> Name </th> <th> Expense </th><th> Comments </th></tr>";
        while($stmt->fetch()){
            
            echo '<tr><td style="text-align:center;border:1px solid black;">';
            echo $PersonId;
            echo "</td><td style='text-align:center;border:1px solid black;'>";
            echo $FirstName;
            echo "</td><td style='text-align:center;border:1px solid black;'>";
            echo $Expense;
            echo "</td><td style='text-align:center;border:1px solid black;'>";
            echo $Comment;
            echo "</td></tr>";        

            $total=$total+$Expense;
        }
        echo "</table>";

        if($total>=0)
            echo "<br/> Total Expense : ".$total."<br/>";
        else
            echo "<br/> Total Balance : ".-$total."<br/>";

        $stmt->close();
        $con->close();
        break;
    case 'ID':    
        $con=mysqli_connect($host,$user,$pass,$db);
        $uid=$_SESSION['u_id'];
        $stmt = $con->prepare("SELECT * FROM expense WHERE user_uid = '$uid' ORDER BY PersonId $order");
        $stmt->execute();
        $stmt->bind_result($PersonId,$Username,$FirstName,$Expense,$Comment);
                    
        echo '<table style="width:100%;border:1px solid black;border-collapse:collapse;">';
        echo "<tr> <th>".$uid."'s Expense List </th></tr></table>";

        echo '<table style="width:100%;border:1px solid black;border-collapse:collapse;">';
        echo "<tr> <th> ID </th> <th> Name </th> <th> Expense </th><th> Comments </th></tr>";
        while($stmt->fetch()){
            echo '<tr><td style="text-align:center;border:1px solid black;">';
            echo $PersonId;
            echo "</td><td style='text-align:center;border:1px solid black;'>";
            echo $FirstName;
            echo "</td><td style='text-align:center;border:1px solid black;'>";
            echo $Expense;
            echo "</td><td style='text-align:center;border:1px solid black;'>";
            echo $Comment;
            echo "</td></tr>";

            $total=$total+$Expense;
        }
        echo "</table>";

        if($total>=0)
            echo "<br/> Total Expense : ".$total."<br/>";
        else
            echo "<br/> Total Balance : ".-$total."<br/>";

        $stmt->close();
        $con->close();
        break;
    case 'EXPENSE':
            
        $con=mysqli_connect($host,$user,$pass,$db);
        $uid=$_SESSION['u_id'];
        $stmt = $con->prepare("SELECT * FROM expense WHERE user_uid = '$uid' ORDER BY Expense $order");
        $stmt->execute();
        $stmt->bind_result($PersonId,$Username,$FirstName,$Expense,$Comment);
                    
        echo '<table style="width:100%;border:1px solid black;border-collapse:collapse;">';
        echo "<tr> <th>".$uid."'s Expense List </th></tr></table>";

        echo '<table style="width:100%;border:1px solid black;border-collapse:collapse;">';
        echo "<tr> <th> ID </th> <th> Name </th> <th> Expense </th><th> Comments </th></tr>";
        while($stmt->fetch()){
            echo '<tr><td style="text-align:center;border:1px solid black;">';
            echo $PersonId;
            echo "</td><td style='text-align:center;border:1px solid black;'>";
            echo $FirstName;
            echo "</td><td style='text-align:center;border:1px solid black;'>";
            echo $Expense;
            echo "</td><td style='text-align:center;border:1px solid black;'>";
            echo $Comment;
            echo "</td></tr>";

            $total=$total+$Expense;
        }
        echo "</table>";

        if($total>=0)
            echo "<br/> Total Expense : ".$total."<br/>";
        else
            echo "<br/> Total Balance : ".-$total."<br/>";

        $stmt->close();
        $con->close();
        break;
    case 'COMMENTS':
            
        $con=mysqli_connect($host,$user,$pass,$db);
        $uid=$_SESSION['u_id'];
        $stmt = $con->prepare("SELECT * FROM expense WHERE user_uid = '$uid' ORDER BY Comment $order");
        $stmt->execute();
        $stmt->bind_result($PersonId,$Username,$FirstName,$Expense,$Comment);
                    
        echo '<table style="width:100%;border:1px solid black;border-collapse:collapse;">';
        echo "<tr> <th>".$uid."'s Expense List </th></tr></table>";

        echo '<table style="width:100%;border:1px solid black;border-collapse:collapse;">';
        echo "<tr> <th> ID </th> <th> Name </th> <th> Expense </th><th> Comments </th></tr>";
        while($stmt->fetch()){
            echo '<tr><td style="text-align:center;border:1px solid black;">';
            echo $PersonId;
            echo "</td><td style='text-align:center;border:1px solid black;'>";
            echo $FirstName;
            echo "</td><td style='text-align:center;border:1px solid black;'>";
            echo $Expense;
            echo "</td><td style='text-align:center;border:1px solid black;'>";
            echo $Comment;
            echo "</td></tr>";

            $total=$total+$Expense;
        }
        echo "</table>";

        if($total>=0)
            echo "<br/> Total Expense : ".$total."<br/>";
        else
            echo "<br/> Total Balance : ".-$total."<br/>";

        $stmt->close();
        $con->close();
        break;
    case '*select criteria*' : 
        header("Location: view.php?error=notselected");
        echo " <pre>Please select something..<pre/>";
        break;
    }

}

?>