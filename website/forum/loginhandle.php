<?php
// $loginerror="false";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    require 'dbms.php';
    $loginemail=$_POST['loginemail'];
    $loginpassword=$_POST['loginpassword'];
    //check whether user  exist or not 
    $existsql="SELECT * FROM `users` WHERE `user_email`= '$loginemail'";
    $res=mysqli_query($conn,$existsql);
    $row=mysqli_num_rows($res);
    if($row==1)
    {
        $data=mysqli_fetch_assoc($res);
        //used to verify a hash password of user 
        if(password_verify($loginpassword,$data['user_password']))
        {
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['user_id']=$data['user_id'];//this is used to get user id of user when user logged in 
            $_SESSION['loginemail']=$loginemail;
            header("Location:index.php");
        }
        else{
            $loginerror="Enter a Correct Password!...";
            header("Location:index.php?loginerror=$loginerror");
        }
    }
    else{
        $loginerror="You have not Signup!.. ";
        header("Location:index.php?loginerror=$loginerror");
    }

}
?>