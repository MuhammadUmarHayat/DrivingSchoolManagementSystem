
<?php 
include '../config.php';
$username=   $_SESSION['username'];
$message="";

if (isset($_POST['save']))//save button
 {
    

    if (!empty($_FILES["image"]["name"]))
     {
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

//INSERT INTO `drivingschools`( `name`, `address`, `contactno`,
// `principal`, `description`, `dom`, `status`, `photo`) VALUES ('','','','','','','','')

      $name = $_POST['name'];
     $address=$_POST['address'];
            $contactno =$_POST['contactno'];
         $principal=$_POST['principal'];
          
         $description=$_POST['description'];
          $dom=$_POST['dom'];
            $status="ok";
            
          


       $query = "INSERT INTO `drivingschools`( `name`, `address`, `contactno`,`principal`, `description`, `dom`, `status`, `photo`) VALUES ('$name','$address','$contactno','$principal','$description','$dom','$status','$imgContent')";

            $insert = mysqli_query($con, $query);//execute


            header('Location:http://localhost/drivingschool/admin/schools.php');
          
        
        }
    }
}


include('header.php');
include('navbar.php');

?>

<br><br><br>
<h2>New School</h2>   
                        



<form method="post" action="newschool.php" enctype="multipart/form-data">
                    <div class="center">
                        <table>
                            <tr>
                                <td>Title </td>
                                <td><input type="text" name="name" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Principal Name </td>
                                <td><input type="text" name="principal" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Description </td>
                                <td><input type="text" name="description" required> <span class="error">*</span> </td>
                            </tr>
                            

                            <tr>
                                <td>Address </td>
                                <td><input type="text" name="address" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td><input type="text" name="contactno" required> <span class="error">*</span> </td>
                            </tr>
                           
                            <tr>
                                <td>Date of Creation </td>
                                <td><input type="text" name="dom" required> <span class="error">*</span> </td>
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