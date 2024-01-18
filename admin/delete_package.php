<?php include '../config.php';
 

 $id= $_GET['id'];


 $insert = $con->query("DELETE FROM `packages` WHERE `id`='$id'"); 
        
              
 header('Location:http://localhost/drivingschool/admin/packages.php');
 include('header.php');
include('navbar.php');

?>