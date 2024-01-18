
<?php 
include '../config.php';
$username=  $_SESSION['username'];
$message="";
// Get image data from database 
$query="SELECT *
FROM enrollments
JOIN users ON enrollments.userid = users.userid
JOIN drivingschools ON enrollments.schoolid = drivingschools.id
JOIN packages ON enrollments.packageid = packages.id";
$result = $con->query($query);


if (isset($_POST['search']))//search button
 {
    $enrollmentno=$_POST['enrollmentno'];
    $query="SELECT *
    FROM enrollments
    JOIN users ON enrollments.userid = users.userid
    JOIN drivingschools ON enrollments.schoolid = drivingschools.id
    JOIN packages ON enrollments.packageid = packages.id
    WHERE enrollments.id = '$enrollmentno'";
    $result = $con->query($query);

 }


 include('header.php');
 include('navbar.php');
 
 ?>
 
 <br><br><br>                  




<a  href="index.php">Admin Panel </a>
<form method="post" action="search.php">

                    <div class="center">

                    <table>
    <tr>
        
<td><input type="text" name="enrollmentno" required> </td>
    
<td>
<button type="submit" name="search"> Search </button>
    </td>
    
    </tr>
    </table>
</form>

                    <?php  if ($result && $result->num_rows > 0) 
  {
    //`packages`( `schoolid`, `title`, `description`, `price`, `duration`,`startingDate`, `endingDate`, `status`, `photo`
     while ($row = $result->fetch_assoc())
    {
        
    ?>
    <table>
    <tr>
        
<td>
    

    
    </td>
    <td>


<?php echo $row['title'] ?> <br>
        
<?php echo $row['duration'] ?>
        <?php echo $row['description'] ?><br>
        
        <?php echo $row['price'] ?> <br>
        <?php echo $row['startingDate'] ?><br>
        <?php echo $row['endingDate'] ?>
       
    </td>

<?php
      }
    }
    else{
        echo "Record not found!";
    }
    ?>
                        
</td>
</tr>
</table>
                    </div>
                </form>

    </div>


</body>
</html>