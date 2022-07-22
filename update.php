<?php
include 'connection.php';
 $id=$_GET['updateid'];
 $query="SELECT * FROM `crud` where id=$id";
 $result= mysqli_query($connection,$query);
 $row= mysqli_fetch_assoc($result);
 $name= $row['name'];
 $email= $row['email'];
 $mobile= $row['mobile'];
 $data= $row['checkboxdata'];
 $gender=$row['gender'];
 $password= $row['password'];


if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $email= $_POST['email'];
    $mobile= $_POST['mobile'];
    $password= $_POST['password'];
    $data= $_POST['data'];
    $alldata= implode(",",$data);
    $gender= $_POST['gender'];
    

    $query= "UPDATE `crud` set id=$id,name='$name',email='$email',mobile='$mobile',
    checkboxdata='$alldata', gender='$gender',password='$password' where id=$id";
    $result=mysqli_query($connection,$query);
     if($result){
        header('location:index.php');
        echo "updated successfully";
     }
     else{
        die(mysql_error($connection));
    }     
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" >
  </head>
  <body>
 <div class="container my-5">
 <form method="POST">
  <div class="mb-3">
    <label  class="form-label">Name</label>
    <input type="text" class="form-control"  
    placeholder="Enter your name"  name="name" value=<?php echo $name?> required > 
  </div>
  <div class="mb-3">
    <label  class="form-label">Email</label>
    <input type="email" class="form-control"  placeholder="Enter your email"  name="email"  value=<?php echo $email?> required > 
  </div>
  <div class="mb-3">
    <label  class="form-label">Mobile</label>
    <input type="tel" class="form-control"  placeholder="Enter your mobile no."  name="mobile" value=<?php echo $mobile?>   pattern="^[6-9][0-9][0-9]{0,9}$" maxLength="10" required> 
  </div>
  <div class="mb-3">
    <label  class="form-label">password</label>
    <input type="password" class="form-control"  placeholder="Enter your password"  name="password" value=<?php echo $password?>  required > 
  </div>
  <div required>
  <input class="form-check-input mt-0" type="checkbox" name="data[]" value="Javascript" >Javascript
  <input class="form-check-input mt-0" type="checkbox" name="data[]" value="html" >html  
  <input class="form-check-input mt-0" type="checkbox" name="data[]"  value="python">python
  <input class="form-check-input mt-0" type="checkbox" name="data[]"  value="php">php
  </div>
  <div class="my-4" >
  Gender:
  <input type="radio" name="gender" value="male">male
  <input type="radio" name="gender" value="female">female
  <input type="radio" name="gender" value="other">others
 </div>
  <button type="submit" class="btn btn-primary" name="submit">update</button>
</form>
</div>
</body>
</html>