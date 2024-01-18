
<?php 
include '../config.php';
$username=   $_SESSION['username'];
$message1="";

if (isset($_POST['save']))
 {
    

    
 //INSERT INTO `enquiries`( `userid`, `subject`, `message`, `msgdate`,
 //`reply`, `repliedBy`) VALUES ('','','','','','')

      $userid = $_POST['userid'];
     $subject=$_POST['subject'];
            $message =$_POST['message'];
         
          $msgdate=date('d/m/y');
            $reply="pending";
            $repliedBy="-";
            
          


       $query = "INSERT INTO `enquiries`( `userid`, `subject`, `message`, `msgdate`,`reply`, `repliedBy`) VALUES ('$userid','$subject','$message','$msgdate','$reply','$repliedBy')";

            $insert = mysqli_query($con, $query);


           echo "Your enquiry has been submitted to admin";
          
        
        }
    


?>

                        
<?php
include('header.php');
include('navbar.php');
?>
<br><br><br>


<h2>Put Your Enquiry</h2>
<form method="post" action="user_enquiries.php" >
                    <div class="center">
                        <table>
                            <tr>
                               
                                <td>User name</td>
                                <td><input type="text" name="userid" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Subject </td>
                                <td><input type="text" name="subject" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Your Message </td>
                                <td><input type="text" name="message" required> <span class="error">*</span> </td>
                            </tr>
                            
<tr>
                                <td> </td>
                                <td> <button type="submit" name="save"> Submit </button> </td>
                            </tr>
                        </table>
                        <?php
                        echo $message1;
                        ?>
                    </div>
                </form>

    </div>


</body>
</html>