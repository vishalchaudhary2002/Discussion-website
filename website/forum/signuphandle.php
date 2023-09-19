 <?php
 $error="false";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    require 'dbms.php';
    $signupemail=$_POST['signupemail'];
    $signuppassword=$_POST['signuppassword'];
    $confirmpassword=$_POST['confirmpassword'];
    //check whether email already exist or not 
    $existsql="SELECT * FROM `users` WHERE `user_email`= '$signupemail'";
    $res=mysqli_query($conn,$existsql);
    $row=mysqli_num_rows($res);
    if($row>0)
    {
        $showerror="Email already exist!...";
    }
    else{
        if(empty($signupemail)||empty($signuppassword)||empty($confirmpassword))
        {
            $showerror="Please fill all the field!";
            header("Location:index.php?signupsuccess=false&error=$showerror"); 
            exit();
        }
        if($signuppassword==$confirmpassword)
        {
            $hash=password_hash($signuppassword,PASSWORD_DEFAULT);
            $sql="INSERT INTO `users` ( `user_email`, `user_password`, `user_time`) VALUES ('$signupemail', '$hash', current_timestamp())";
            $res=mysqli_query($conn,$sql);
            if($res){
                $showalert=true;
                header("Location:index.php?signupsuccess=true");
                exit();
            }
        }
        else{
            $showerror=true;
            $showerror="Password do not match!...";
            header("Location:index.php?signupsuccess=false&error=$showerror");
        }
    }
    header("Location:index.php?signupsuccess=false&error=$showerror");
}
?>