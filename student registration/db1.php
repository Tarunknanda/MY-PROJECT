<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <title> sign up for registration </title>
     <style type="text/css">
         table{
    border-collapse: collapse;
    width: 100%;
    font-family:monospace;
    font-size: 25px;
    text-align: left;
    color: #42f448;
 background-color: #000000;
}
th{
     color: white;
}
</style>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
</head>
<body>
    <div name="loginbox">
<?php
$studentroll=$_POST['stroll'];
$studentname=$_POST['stname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
if(!empty($studentroll)|| !empty($studentname) || !empty($email)|| !empty($phone))
{
     $host="localhost";
    $username="root";
    $password="";
    $dbname="mongo";
    $conn=new mysqli($host,$username,$password,$dbname);
    if(mysqli_connect_error())
    {
        die('connection error'.mysqli_connect_error());
    }
    else
    {
        $INSERT="INSERT INTO student(student_roll,student_name,email_id,phone) VALUES('".$studentroll."','".$studentname."','".$email."','".$phone."')";
    $result=$conn->query($INSERT);
     if($result)
     {
         // echo "New Record Insert Successfully";
          $sql='SELECT id,student_roll,student_name,email_id,phone FROM student';
        $result1=$conn->query($sql);
       if($result1->num_rows > 0)
       {
        echo "<table border='1'>
<tr id='tar'>
<th>Id</th>
<th>Student Roll</th>
<th>Student Name</th>
<th>Email Id</th>
<th>Phone No.</th>
</tr>";
while($row =$result1->fetch_assoc())
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['student_roll'] . "</td>";
echo "<td>" . $row['student_name'] . "</td>";
echo "<td>" . $row['email_id'] . "</td>";
echo "<td>" . $row['phone'] . "</td>";
echo "</tr>";
}
echo "</table>";
       }
     }
     else
     {
         echo  "There is some internal problem";
     }
    }
}
else
{
    echo "All field are required";
}
?>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>