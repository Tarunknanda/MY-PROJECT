<?php
$email=$_POST['email'];
$pass=$_POST['pass'];
if(!empty($email)|| !empty($pass))
{
    $host="localhost";
    $username="root";
    $password="";
    $dbname="registration";
    $conn=new mysqli($host,$username,$password,$dbname);
    if(mysqli_connect_error())
    {
        die('connection error'.mysqli_connect_error());
    }
    else
    {
    $SELECT="SELECT count(1) from reg where email= '".$email."' and password= '".$pass."'";
   // $SELECT="SELECT password from reg where password= '".$pass."'";
    $result = $conn->query($SELECT);
    
    $conn->close();
}
}
else
{
echo "All field are required"; 
  die();
}
?>


}
?>