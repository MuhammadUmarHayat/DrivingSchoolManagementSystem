<?php
session_start();
// remove all session variables
session_unset();
// destroy the session
session_destroy();
  
include('header.php');
include('navbar.php');

?>

                        

<br><br><br>
    <h1>Logout</h1>
<p>
    You are successfully loggedout!
</p>
</body>
</html>