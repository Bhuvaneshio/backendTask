<?php

if(isset($_POST['submit'])){
    include_once 'dbh-inc.php';

    $first= mysqli_real_escape_string($con,$_POST['first']);
    $last= mysqli_real_escape_string($con,$_POST['last']);
    $email= mysqli_real_escape_string($con,$_POST['email']);
    $uid= mysqli_real_escape_string($con,$_POST['uid']);
    $pwd= mysqli_real_escape_string($con,$_POST['pwd']);

    if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)){
        header("Location: ../signup.php?signup=empty");
        exit();
    }
    else{
        if(!preg_match("/^[a-zA-Z]*$/",$first) ||!preg_match("/^[a-zA-Z]*$/",$last) ){
            header("Location: ../signup.php?signup=invalid");
            exit();
        }
        else{ 
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: ../signup.php?signup=email");
                exit();
            }
            else{
                $sql="SELECT * FROM users WHERE user_uid='$uid'";
                $result=mysqli_query($con,$sql);
                $resultCheck = mysqli_num_rows($result);

                if($resultCheck>0){
                    header("Location: ../signup.php?signup=usertaken");
                    exit();
                }
                else{
                    //Hashing password
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

                    //Insert the user into the database
                    $sql = "INSERT INTO users (user_first,user_last,user_email,user_uid,user_pass) VALUES ('$first','$last','$email','$uid','$hashedPwd')";
                    $result=mysqli_query($con,$sql);
                    if($result){
                              
                        //create table here..
                        
                        header("Location: ../../tabledata/index.php?signup=success&table=created&user=$uid");
                        exit();
                        
                    }
                    else{    
                        echo "Failed signup";
                        header("Location: ../index.php?signup=fail&pwd=$hashedPwd");
                        exit();
                    }
                }
            }
        }
    }

}
else{
    header("Location: ../signup.php");
    exit();   
}

?>