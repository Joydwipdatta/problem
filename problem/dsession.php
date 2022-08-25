<?php
  
  $_SESSION['duid'];
  $duid=$_SESSION['duid'];

  if($duid== true){
    
        $query="SELECT * FROM `doctor` WHERE duid='$duid'";
        $data=mysqli_query($connection,$query);
        $result=mysqli_fetch_assoc($data);
    }
    else{
        header('location:doctorlogin.php');
    }
?>