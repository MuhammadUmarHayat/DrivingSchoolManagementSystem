
<?php 
include '../config.php';
$username=  $_SESSION['username'];
$id;
$message="";
// Get image data from database 
$result = $con->query("SELECT * FROM `enquiries` where reply='pending'");

if (isset($_POST['save']))
 {
    $id= $_POST['id'];

   $reply = $_POST['reply'];
  $repliedBy=$username;
//   var_dump($id);
//   var_dump($reply);
     $query="UPDATE `enquiries` SET reply='$reply', repliedBy='$repliedBy' where id='$id'";
     $rslt = mysqli_query($con, $query);
    header('Location:http://localhost/drivingschool/admin/enquiries.php');
    }

    
include('header.php');
include('navbar.php');

?>

                        

<br><br><br>




                    <div class="center">
                    <?php  if ($result && $result->num_rows > 0) 
  {
   
    //SELECT `id`, `userid`, `subject`, `message`, 
    //`msgdate`, `reply`, `repliedBy` FROM `enquiries` 
     while ($row = $result->fetch_assoc())
    {
        $id= $row['id'];
    ?>
    
    <table>
    <tr>
       
<td>


<?php echo $row['userid'] ?> <br>
        
<?php echo $row['subject'] ?>
        <?php echo $row['message'] ?><br>
        
        <?php echo $row['msgdate'] ?> <br>
        <?php echo $row['reply'] ?><br>
        <?php echo $row['repliedBy'] ?>
       
        
        
</td>   

         <td>
         <form method="post" action="enquiries.php"> 
<table>
<tr>

                                <td>Enquiry # </td>
                                <td><?php echo  $row['id'] ?> </td>
                            </tr>
<tr>
                                <td> </td>
                                <td>
                                <textarea  name="reply" rows="4" cols="50" required>
                                    Enter your reply! </textarea>
                                     </td>
                            </tr>
                            </tr>
<tr>
                                <td> <input type="hidden" id="id" name="id" value="<?php echo $id; ?>"></td>
                                <td> <button type="submit" name="save"> Submit </button> </td>
                            </tr>
                           
    </table>
    </form>

    </td>
    


</td>
</tr>
</table>
                    </div>
               
                <?php
      }
    }
                        ?>

    </div>


</body>
</html>