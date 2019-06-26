<?php
$faname=$_POST['firstname'];
$lname=$_POST['lastname'];
$email=$_POST['email'];
$dob=$_POST['dat'];
$pass=$_POST['pass'];
if(!empty($faname)|| !empty($lname) || !empty($email)|| !empty($dob) || !empty($pass))
{
    $host="localhost";
    $username="root";
    $password="";
    $dbname="registration";
    $conn=new mysqli($host,$username,$password,$dbname);
	//print_r($conn);
    
    if(mysqli_connect_error())
    {
        die('connection error'.mysqli_connect_error());
    }
    else
    {
    $SELECT="SELECT email from reg where email= '".$email."'";
	$result = $conn->query($SELECT);
    $numOfRows = $result->num_rows;
        //echo $numOfRows;
    if($numOfRows == 0){
		$INSERT="INSERT Into reg(first_name,last_name,email,dob,password) values('".$faname."','".$lname."','".$email."',".$dob.",'".$pass.")";
    //echo $INSERT;
    $result=$conn->query($INSERT);
	
    
    if($result)
    {
    
        echo '{"status" : "success" , "message" : "New record insert successfully"}';
    }else{
    echo '{"status" : "error" , "message" : "There is some internal problem"}';
    }
}else{
		echo '{"status" : "error" , "message" : "User already exist"}';
	}
    
    $conn->close();
  }
}
else
{
 echo "All field are required"; 
    die();
}
?>

