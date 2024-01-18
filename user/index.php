<?php
include '../config.php';
echo $username=  $_SESSION['username'];
$message="";
// Get image data from database 
$result ;
////	btnsearch,btnName,btnDuration,btnPrice
if (isset($_POST['btnsearch']))//search button
 {
    //schoolid,duration,price
    $schoolid = $_POST['schoolid'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];

    //SELECT `id`, `schoolid`, `title`, `description`, `price`, `duration`, 
    //`startingDate`, `endingDate`, `status`, `photo` FROM `packages` 
    
    $result = $con->query("SELECT * FROM `packages` where schoolid='$schoolid' and duration='$duration' and price='$price'");
 }
 else if (isset($_POST['btnName']))
 {
 $schoolid = $_POST['schoolid'];
    $result = $con->query("SELECT * FROM `packages` where schoolid='$schoolid'");
 }
 else if (isset($_POST['btnDuration']))
 {
    $duration = $_POST['duration'];
    $result = $con->query("SELECT * FROM `packages` where duration='$duration'");
 }
 else if (isset($_POST['btnPrice']))
 {
    $price = $_POST['price'];
    $result = $con->query("SELECT * FROM `packages` where price='$price'");
 }
 else{
    $result = $con->query("SELECT * FROM `packages`");//by default
 }
?>
<?php
include('header.php');
include('navbar.php');
?>
<br><br><br>






<form method="post" action="index.php" >
<h1>Online Car Driving School Management System</h1>
    
<div>
    <table>
    <tr>
    <td>
<select name="schoolid">
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
    <td>
<select name="duration">
    <option disabled selected>-- Select duration--</option>
    <?php
	//mysqli_query($con,$q1);
    include '../config.php';  // Using database connection file here
        $records = mysqli_query($con, "SELECT * From `packages`");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['duration'] ."'>" .$data['duration'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
    </td>
    <td>
<select name="price">
    <option disabled selected>-- Select Price Range--</option>
    <?php
	//mysqli_query($con,$q1);
    include '../config.php';  // Using database connection file here
        $records = mysqli_query($con, "SELECT * From `packages`");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['price'] ."'>" .$data['price'] ."</option>";  // displaying data in option menu
        }
        
    ?>  
  </select>
    </td>
    <td> <button type="submit" name="btnsearch"> Search </button></td>
    <td> <button type="submit" name="btnName"> School Name </button></td>
    <td> <button type="submit" name="btnDuration"> Duration </button></td>
    <td> <button type="submit" name="btnPrice"> Price Range </button></td>

    </tr>
</table>
    
</div>
<div>
<div class="center">
                    <?php  if ($result && $result->num_rows > 0) 
  {
    //`packages`( `schoolid`, `title`, `description`, `price`, `duration`,`startingDate`, `endingDate`, `status`, `photo`
     while ($row = $result->fetch_assoc())
    {
        
    ?>
    <table>
    <tr>
        <td>
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>"width=300px; height=150px; />
    </td>
<td>


<?php echo $row['title'] ?> <br>
        
<?php echo $row['duration'] ?>
        <?php echo $row['description'] ?><br>
        
        <?php echo $row['price'] ?> <br>
        <?php echo $row['startingDate'] ?><br>
        <?php echo $row['endingDate'] ?>
       
        
         </td>   
         <td> 
         <?php echo '<a  text-decoration: none;"  href="view_Details.php?id=' . $row['id'] . '">View Details</a>';?>
         <?php echo '<a text-decoration: none;"  href="send_Application.php?id=' . $row['id'] . '">Submit Application</a>';?>
    </td>
<?php
      }
    }
                        ?>
</td>
</tr>
</table>
                    </div>
</div>
</form>
</body>
</html>