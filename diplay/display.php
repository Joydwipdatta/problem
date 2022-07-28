<?php
 include  "conn.php";
 if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $image=$_FILES['file'];
    // echo $username;
    // echo "<br>";
    // echo $password;
     //echo "<br>";
    // print_r($image);
     //echo "<br>";
     


    $imagefilename=$image['name'];
    print_r($imagefilename);
     echo "<br>";
     $imagefileerror=$image['error'];
    print_r($imagefileerror);
    echo "<br>";
    $imagefiletemp=$image['tmp_name'];
    print_r($imagefiletemp);
    echo "<br>";
    $filename_separate=explode('.',$imagefilename);
    print_r($filename_separate);
    echo"<br>";

//$file_extension=strtolower($filename_separate[1]);
//print_r($file_extension);
$file_extension=strtolower(end($filename_separate));
print_r($file_extension);

$extension=array('jpeg','jpg','png');
if(in_array($file_extension,$extension)){

    $upload_image='images/'.$imagefilename;
    move_uploaded_file($imagefiletemp,$upload_image);
    $query ="INSERT INTO `image`(username,password,image) values ('$username','$password','$upload_image')";
    $result= mysqli_query($connection,$query);
    if($result){
        echo "data inserted successfully";
    }else{
        die(mysqli_error($connection));
    }
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>  
    <title>Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" >
<style>
    img{
        width: 100px;
    }
</style>


</head>
<body>
    
    <h1 class="text-center my-3">display data</h1>
   <div class="container mt-5 d-flex justify-content-center">
    <table class="table table-bordered w-50">
  <thead class="table-dark">
    <tr>
      <th scope="col">Sl no.</th>
      <th scope="col">username</th>
      <th scope='col'>password</th>
      <th scope='col'>image</th>
      
    </tr>
    </thread >
    <tbody>
        <?php
    $query="SELECT * FROM `image`";
    $result= mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($result)){
      $id=$row['id'];
      $username=$row['username'];
      $password=$row['password'];
      $image=$row['image'];
      echo '<tr>
      <th>'.$id.'</th>
      <td>'.$username.'</td>
      <td>'.$password.'</td>
      <td><img src='.$image.'/></td>
    </tr>';
    }    
        ?>
        
</tbody>  

</table>
</div>
</body>
</html>