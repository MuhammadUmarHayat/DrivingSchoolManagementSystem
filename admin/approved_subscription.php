<?php include '../config.php';
 

 $id= $_GET['id'];
 
$status="approved";

 $insert = $con->query("UPDATE `subscriptions` SET `status`='$status' WHERE `id`='$id'"); 
        
              
 header('Location:http://localhost/drivingschool/admin/subscribers.php');
 
 include('header.php');
 include('navbar.php');
?>