<!DOCTYPE html>
<html>
<body>
 
<?php

    session_start();
    session_destroy();
    echo "Logout Successfully"
?> 
 <form method="post" action="index.php"><br><br>
 <input type="submit" value="Log in Again"> 
</body>
</html>