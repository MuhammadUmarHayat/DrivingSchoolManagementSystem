
<?php 
include '../config.php';
$username=   $_SESSION['username'];
$message="";

if (isset($_POST['save']))
 {
    

    if (!empty($_FILES["image"]["name"]))
     {
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes))
         {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

 //  INSERT INTO `packages`( `schoolid`, `title`, `description`, `price`, `duration`,
                    // `startingDate`, `endingDate`, `status`, `photo`) VALUES ('','','','','','','','','')

      $schoolid = $_POST['schoolid'];
     $title=$_POST['title'];
           
          
         $description=$_POST['description'];
         $price =$_POST['price'];
         $duration=$_POST['duration'];
          $startingDate=$_POST['startingDate']; ///////////////////////////////////////////////////////  INSERT INTO `packages`( `schoolid`, `title`, `description`, `price`, `duration`,`startingDate`, `endingDate`, `status`, `photo`)
          $endingDate=$_POST['endingDate'];
            $status="available";
            
          


       $query = "INSERT INTO `packages`( `schoolid`, `title`, `description`, `price`, `duration`,`startingDate`, `endingDate`, `status`, `photo`) VALUES ('$schoolid','$title','$description','$price','$duration','$startingDate','$endingDate','$status','$imgContent')";

            $insert = mysqli_query($con, $query);


            header('Location:http://localhost/drivingschool/admin/packages.php');
          
        
        }
    }
}

include('header.php');
include('navbar.php');

?>

<br><br><br>
<h2>New Package</h2>                      

<form method="post" action="newpackage.php" enctype="multipart/form-data">
                    <div class="center">
                 
                        <table>
                        <tr>
                                <td>Choose School </td>
<td>
<select name="schoolid" id="schoolid">
    <option disabled selected>-- Select school--</option>
    <?php
	//mysqli_query($con,$q1);
    include '../config.php';  // Using database connection file here
        $records = mysqli_query($con, "SELECT * From `drivingschools`");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['id'] ."'>" .$data['name'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
    </td>

                              
                            </tr>
                            <tr>
                                <td>Title </td>
                                <td><input type="text" name="title" required> <span class="error">*</span> </td>
                            </tr>
                            
                            <tr>
                                <td>Description </td>
                                <td><input type="text" name="description" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Price </td>
                                <td><input type="text" name="price" required> <span class="error">*</span> </td>
                            </tr>

                            <tr>
                                <td>Duration </td>
                                <td><input type="text" name="duration" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>starting Date</td>
                                <td><input type="date" name="startingDate" required> <span class="error">*</span> </td>
                            </tr>
                           
                            <tr>
                                <td>Ending Date </td>
                                <td><input type="date" name="endingDate" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Select product photo:</label>
                                </td>
                                <td> <input type="file" name="image">
                                </td>
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