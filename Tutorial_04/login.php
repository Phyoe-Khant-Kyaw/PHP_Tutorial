<!DOCTYPE html>
<html>
<body>
 
<?php
session_start();
$userid = $_POST['userid'];
$pw = $_POST['password'];
 
if($userid == 'admin' and $pw == '123')
{    
    
    $_SESSION['startid']=session_id();
    echo "Logged in successfully";
}
?>
 
 <form method="post" action="logout.php"><br><br>
 <input type="submit" value="Logout">
</body>
</html>