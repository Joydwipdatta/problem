<?php

$connection= new mysqli('localhost','root','','newlogin');
if(!$connection){
     die(mysqli_error($connection));
}

if(isset($_POST['submit'])){
    $uid=$_POST['uid'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
if ($_POST['password'] !== $_POST['cpassword']) {
    die('Password and Confirm password should match!');
 
 }
 $file=$_FILES['file'];
 $filename=$file['name'];

 $fileerror=$file['error'];
 $filetemp=$file['tmp_name']; 
 $filename_separate=explode('.',$filename);


//$file_extension=strtolower($filename_separate[1]);
//print_r($file_extension);
$file_extension=strtolower(end($filename_separate));
$extension=array('pdf','doc','dotx','docs');
if(in_array($file_extension,$extension)){

 $upload_file='upload/'.$filename;
 move_uploaded_file($filetemp,$upload_file);


      $query="INSERT INTO  `newlog` (uid,name,phone,email,password,cpassword,file) VALUES ('$uid','$name','$phone','$email','$password','$cpassword','$upload_file')";
      $result = mysqli_query($connection,$query);

if($result){
     echo "data inserted";
     
}else{
   die(mysqli_error($connection));
   
}
    
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>multiple  login nahi hone dega</title> 


</head>

<body>
<div class="container" >
    <form action="" method="POST" enctype="multipart/form-data">

    
    <input type="text" placeholder="Enter name" name="name" required>
    <br>

    
    <input type="text" placeholder="Enter userid" name="uid"  maxlength="6" required>
    <br>
    
    <input type="tel" placeholder="Enter phone number" name="phone"  pattern="^[6-9][0-9][0-9]{0,9}$" maxLength="10" required>
    <br>
  
    <input type="email" placeholder="Enter email" name="email" required>
    <br>
    
    <input type="password" placeholder="Enter Password" name="password"   required>

    <br>
    <input type="password" placeholder="confirm Password" name="cpassword" required>
    <br>

    <label for="myfile">Select a file:</label>
     <input type="file" id="myfile" name="file"><br>


    <a href="main.php"><button type="submit" name="submit"  value="submit">Login</button><a>
     <br>
     
   
  </div>

</form>
    
</body>
</html>