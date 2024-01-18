
<?php
include '../config.php';
 $username=  $_SESSION['username'];
$id= $_GET['id'];
$message;
if($username!=null)
{
$result = $con->query("SELECT * FROM `packages` where id='$id'");
if ($result && $result->num_rows > 0) 
{
    $row = $result->fetch_assoc();//get a single row
 echo $pakageid= $row['id'] ;
echo  $userid=$username ;
 echo $schoolid=$row['schoolid'] ;////////////////////////////////////////////////INSERT INTO `training_requests`( `schoolid`, `userid`, `pakageid`, `reqDate`, `status`)
 echo $reqDate=date('d/m/y');
 echo $status="pending";
  $query="INSERT INTO `training_requests`( `schoolid`, `userid`, `pakageid`, `reqDate`, `status`) VALUES ('$schoolid','$userid','$pakageid','$reqDate','$status')";

  $result = mysqli_query($con,$query);
  $message="Your request is submitted to admin for approval";
}
}

?>
<?php
include('header.php');
include('navbar.php');
?>
<br><br><br>
    <?php
    echo $message;
    ?>
</body>
</html>