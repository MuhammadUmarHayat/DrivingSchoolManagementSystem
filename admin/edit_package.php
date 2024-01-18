
<?php 
include '../config.php';
$username=   $_SESSION['username'];
$message="";
$schoolid ;
$title;
                       
    $description;
    $price ;
    $duration;
     $startingDate;
     $endingDate;
       $status;
       $id= $_GET['id'];
$result = $con->query("SELECT * FROM `packages`  WHERE `id`='$id'");
if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
	
       
	

        
                 $schoolid = $row['schoolid'];
                 $title=$row['title'];
                                        
                     $description=$row['description'];
                     $price =$row['price'];
                     $duration=$row['duration'];
                      $startingDate=$row['startingDate']; 
                      $endingDate=$row['endingDate'];
                        $status="available";




		
}
}


if (isset($_POST['save']))
 {
    $id= $_GET['id'];

    

 //  INSERT INTO `packages`( `schoolid`, `title`, `description`, `price`, `duration`,
                    // `startingDate`, `endingDate`, `status`, `photo`) VALUES ('','','','','','','','','')

      $schoolid = $_POST['schoolid'];
     $title=$_POST['title'];
           
          
        echo $description=$_POST['description'];
        echo  $price =$_POST['price'];
        echo $duration=$_POST['duration'];
        echo  $startingDate=$_POST['startingDate']; ///////////////////////////////////////////////////////  INSERT INTO `packages`( `schoolid`, `title`, `description`, `price`, `duration`,`startingDate`, `endingDate`, `status`, `photo`)
        echo  $endingDate=$_POST['endingDate'];
        echo    $status=$_POST['status'];
            
          


       $query = "update `packages` set `schoolid`='$schoolid', `title`='$title', `description`='$description', `price`='$price', `duration`='$duration',`startingDate`='$startingDate', `endingDate`='$endingDate', `status`='$status' where id='$id'";

            $rslt = mysqli_query($con, $query);


            header('Location:http://localhost/drivingschool/admin/packages.php');
          
        
        }
   
        include('header.php');
        include('navbar.php');

?>

                        




<br><br><br>

<form method="post" action="edit_package.php?id=<?php echo $id; ?>"> 
                    <div class="center">
                 
                        <table>
                        <tr>
                                <td># </td>
                                <td><?php echo $id; ?></td>
                            </tr>
                        <tr>
                                <td>Choose School </td>
<td>
<select name="schoolid">
    <option disabled selected>-- Select school--</option>
    <?php
	//mysqli_query($con,$q1);
    include '../config/config.php';  // Using database connection file here
        $records = mysqli_query($con, "SELECT * From `drivingschools`");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['schoolid'] ."'>" .$data['name'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
    </td>

                              
                            </tr>
                            <tr>
                                <td>Title </td>
                                <td><input type="text" name="title" value="<?php echo $title; ?>"> </td>
                            </tr>
                            
                            <tr>
                                <td>Description </td>
                                <td><input type="text" name="description" value="<?php echo $description; ?>"> </td>
                            </tr>
                            <tr>
                                <td>Price </td>
                                <td><input type="text" name="price" value="<?php echo $price; ?>"> </td>
                            </tr>

                            <tr>
                                <td>Duration </td>
                                <td><input type="text" name="duration" value="<?php echo $duration; ?>"> </td>
                            </tr>
                            <tr>
                                <td>starting Date</td>
                                <td><input type="date" name="startingDate" value="<?php echo $startingDate; ?>"> </td>
                            </tr>
                           
                            <tr>
                                <td>Ending Date </td>
                                <td><input type="date" name="endingDate" value="<?php echo $endingDate; ?>"> </td>
                            </tr>
                            
                            <tr>
                                <td>Status </td>
                                <td><input type="text" name="status" value="<?php echo $status; ?>"> </td>
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