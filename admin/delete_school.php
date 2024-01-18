<?php include '../config.php';
 

 $id= $_GET['id'];


 $insert = $con->query("DELETE FROM `drivingschools` WHERE `id`='$id'"); 
        
              
 header('Location:http://localhost/drivingschool/admin/schools.php');
 

?>