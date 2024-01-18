
<?php 
include '../config.php';
$username=   $_SESSION['username'];
$message="";

$name;
	  
$description;

$address;
   $contactno;
$principal;

$description;
$dom;
  $status="ok";


$id= $_GET['id'];
$result = $con->query("SELECT * FROM `drivingschools` WHERE `id`='$id'");

if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
	
        $name=  $row['name'];
	  
      $description= $row['description'];
     
      $address=$row['address'];
         $contactno =$row['contactno'];
      $principal=$row['principal'];
      
      $description=$row['description'];
      $dom=$row['dom'];
        $status="ok";
	
		
}
}


if (isset($_POST['save']))//edit button
 {
    

   //update changes
    $id= $_GET['id'];

      $name = $_POST['name'];
          $address=$_POST['address'];
             $contactno =$_POST['contactno'];
          $principal=$_POST['principal'];
          
          $description=$_POST['description'];
          $dom=$_POST['dom'];
            $status="ok";
          


       $query = "update `drivingschools` set  `name`='$name', `address`='$address', `contactno`='$contactno',`principal`='$principal', `description`='$description', `dom`='$dom', `status`='$status' where id='$id'";

            $insert = mysqli_query($con, $query);



          
           header('Location:http://localhost/drivingschool/admin/schools.php');
}
    

include('header.php');
include('navbar.php');

?>

<br><br><br>                     




<form method="post" action="edit_school.php?id=<?php echo $id; ?>"> 
                    <div class="center">
                        <table>
                        <tr>
                                <td># </td>
                                <td><?php echo $id; ?></td>
                            </tr>
                            <tr>
                                <td>Title </td>
                                <td><input type="text" name="name"  value="<?php echo $name; ?>"> </td>
                            </tr>
                            <tr>
                                <td>Principal Name </td>
                                <td><input type="text" name="principal" value="<?php echo $principal; ?>">  </td>
                            </tr>
                            <tr>
                                <td>Description </td>
                                <td><input type="text" name="description" value="<?php echo $description; ?>"> </td>
                            </tr>
                            

                            <tr>
                                <td>Address </td>
                                <td><input type="text" name="address" value="<?php echo $address; ?>"> </td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td><input type="text" name="contactno" value="<?php echo $contactno; ?>"> </td>
                            </tr>
                           
                            <tr>
                                <td>Date of Creation </td>
                                <td><input type="text" name="dom" value="<?php echo $dom; ?>"> </td>
                            </tr>
                            
                           <tr>
                                <td> </td>
                                <td> <button type="submit" name="save"> Submit </button> </td>
                            </tr>
                        </table>
                        <?php
                        echo $message;
                        ?>
                    </div>
                </form>

    </div>


</body>
</html>