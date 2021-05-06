<?php

$server = "localhost";
$user = "root";
$password0 = "";
$database = "userregistration";
$con = mysqli_connect($server, $user, $password0, $database);

if($con)
{
    echo "";
}
else
{
    echo"server not connected";
}


if(isset($_POST['submit']))
{

    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password2=$_POST['cpassword'];
    $gender=$_POST['gender'];
    $date=$_POST['date'];
    $phone=$_POST['phone'];

    $s="select * from usertable where email = '$email'";
    $result=mysqli_query($con,$s);
    $num=mysqli_num_rows($result);

    if($num>0)
    {
	    echo "<script>alert('email alredy register ,try another email');</script>";
    }
    else
    {
	    if(($password == $password2))
	    {
            $pass = password_hash($password, PASSWORD_DEFAULT);
	        $reg="insert into usertable(name,email,password,gender,date,phone) 
            values ('$name','$email','$pass','$gender','$date','$phone')";
	        $result=mysqli_query($con,$reg);

	        if($result)
	        {
                echo "<script>alert('register successful');</script>";
	        }
        }
        else
        {
	        echo "<script>alert('two password are not match');</script>";
        }	
    }
}



?>