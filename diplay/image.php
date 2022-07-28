<?php
include "conn.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>  
    <title>Image</title>
    
</head>
<body>
    <h1 >Registration form</h1>
    <form action="display.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="username" placeholder="username" ><br>
  <input type="password" name="password" placeholder="password"><br>
    <input type="file" name="file"  ><br>
    <button  type="submit"  name="submit" value="submit"> submit</button> 
    </form>
      
            
                
</body>
</html>