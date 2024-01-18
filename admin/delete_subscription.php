<?php include '../config.php';
 

 $id= $_GET['id'];
 
$status="deleted";

 $insert = $con->query("UPDATE `subscriptions` SET `status`='$status' WHERE `id`='$id'"); 
        
              
 header('Location:http://localhost/drivingschool/admin/subscribers.php');
 

?>