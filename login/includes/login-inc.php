<?php

session_start();

if(isset($_POST['login'])){
    include_once 'dbh-inc.php';

    $uid=$_POST['user'];
    $pwd=$_POST['pass'];

    $uid=stripcslashes($username);
    $pwd=stripcslashes($password);

    $uid=mysqli_real_escape_string($con,$_POST['user']);
    $pwd=mysqli_real_escape_string($con,$_POST['pass']);

    if((empty($uid)) || (empty($pwd))){
        header("Location: ../index.php?login=errorempty");
        exit();
    } 
    else{
        $sql="SELECT * FROM users WHERE user_uid='$uid'";
        $result=mysqli_query($con,$sql);
        $resultCheck=mysqli_num_rows($result);
        if($resultCheck<1){
            header("Location: ../index.php?login=erroremptyuser");
            exit();
        }
        else{
            if($row = mysqli_fetch_assoc($result)){
                
                //de-Hashing PassWord
                $hashedPwdCheck=password_verify($pwd, $row['user_pass']);
                if($hashedPwdCheck==false){
                    header("Location: ../index.php?login=passerror");
                    exit();
                }
                else if($hashedPwdCheck==true){
                    //login
                    $_SESSION['u_id']=$row['user_uid'];
                    $user=$row['user_uid'];
                    header("Location: ../../tabledata/index.php?login=success&user=$user");
                    
                }
                /*
                $sql="SELECT * FROM users WHERE user_pwd='$pwd'";
                $result=mysqli_query($con,$sql);
                $resultCheck=mysqli_num_rows($result);
                if($resultCheck<1){
                    header("Location: ../index.php?login=erroremptypass");
                    exit();
                }
                else{
                    header("Location: ../index.php?login=success");
                    exit();
                }
                */
            }
        }
    }
    

}
else{
    header("Location: ../index.php?login=error");
    exit();
}

?>
