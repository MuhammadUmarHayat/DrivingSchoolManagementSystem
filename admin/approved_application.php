<?php include '../config.php';
 

 $id= $_GET['id'];
 
$status="approved";

 $insert = $con->query("UPDATE `training_requests` SET `status`='$status' WHERE `id`='$id'"); 
        
              
 header('Location:http://localhost/drivingschool/admin/applications.php');
 include('header.php');
include('navbar.php');

?>