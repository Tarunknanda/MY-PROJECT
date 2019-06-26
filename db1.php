<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <!--  <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->
    <title> sign up for registration </title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <style type="text/css">
         table{
    border-collapse: collapse;
    width: 100%;
    font-family:monospace;
    font-size: 25px;
    text-align: left;
    color: #42f448;
 /*background-color: #000000*/;
}
th{
     color: white;
}
</style>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
</head>
<body>
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
    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-interval="10000">
      <img src="stone.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-interval="2000">
      <img src="wall.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="wallpaper_hd.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- <script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>