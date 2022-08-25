<?php
 include "connection.php";

if(isset($_POST['submit'])){
    $dname=$_POST['name'];
    $dphone=$_POST['phone'];
    $demail=$_POST['email'];
    $duid=$_POST['uid'];
    $dpassword=$_POST['password'];
    //parameters//
    $uppercase = preg_match('@[A-Z]@', $dpassword);
    $lowercase = preg_match('@[a-z]@', $dpassword);
    $number    = preg_match('@[0-9]@', $dpassword);
    $specialChars = preg_match('@[^\w]@', $dpassword);

    $dspeciality=$_POST['speciality'];
    $daddress=$_POST['address'];
    //image//
    $size=2097152;
    $allowedExts = array("jpeg","jpg","png");
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);
    $uploadimage=$_FILES["file"]["name"];
     move_uploaded_file($_FILES["file"]["tmp_name"],"imagess/" . $_FILES["file"]["name"]);
    if(!$allowedExts){ 
        echo"please enter corect format";
    }
        if (!$allowedExts>=$size){
    echo "please  enter correct  size";
        }
     //password valiation//
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($dpassword) < 8) {
        echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    }
    else{
    $query=$query="SELECT * FROM  doctor    where duid='$duid'";
    $result=mysqli_query($connection,$query);
    $count=mysqli_num_rows($result);
    if($count>0) {
       echo "please enter new user id";
    } else { 
        $query="INSERT INTO `doctor`(dname,dphone,demail,duid,dpassword,dspeciality,daddress,dimage)  VALUES ('$dname','$dphone','$demail','$duid','$dpassword','$dspeciality','$daddress','$uploadimage')";
        $result= mysqli_query($connection,$query);
    if($result){
        header('location:doctorregister.php');        
    }
    else{
        echo  "data  inesertion failed";
    } 
}
}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Medicine -- Doctor Register</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <!-- nav bar-->
        <header class="navbar">
            <div class="logo">
                <h2><a href="index.php">Medicine</a></h2>
            </div>
            <div class="navmanu">
                <ul>
                    <a href="#"><li><ion-icon name="search-outline" class="iconp"></ion-icon>Find Doctor</li></a>
                    <li><button> <a href="patientlogin.php" class="navlink">Login / Signup</a></button></li>
                </ul>
            </div>
        </header>

        <!-- main section-->
        <div class="logsign">
            <a href="doctorlogin.php">Login</a>
            <a href="#" class="linkactive">Register</a>
        </div>
        <section class="drbody">
            
            <div class="drhead">
                <div class="heading">
                    <h1>Doctor Signup</h1>
                </div>
                <div class="pr">
                    <h4>Join as Patient <a href="patientregister.php">Register Here</a></h4>
                </div>
            </div>
            <div class="dr">
                <div class="drimg">
                    
                    <img src="img/heart-2730784.png" alt="">
                </div>
                <div class="drform">
                    
                    <form action="doctorregister.php" method="POST" class="drfr" enctype="multipart/form-data">
                        <label for="name">Full Name<span class="requerd">*</span></label>
                        <input type="text" name="name" id="" placeholder="Enter full name" required>
                        <div class="formgridview">
                           
                            <div>
                                <label for="phone">Phone Number<span class="requerd">*</span></label>
                                <input type="tel" name="phone" id="" placeholder="Enter mobile number" pattern="^[6-9][0-9][0-9]{0,9}$" maxLength="10" required>
                            </div>
                            <div>
                                <label for="email">Email<span class="requerd">*</span></label>
                                <input type="email" name="email" id="" placeholder="Enter email" required>
                            </div>
                            <div>
                                <label for="userid">User ID<span class="requerd">*</span></label>
                                <input type="text" name="uid" id="" placeholder="Enter User ID"  minlength="8"    maxlength="15" required>
                            </div>
                            <div>
                                <label for="password">Password<span class="requerd">*</span></label>
                                <input type="password" name="password" id="myInput" placeholder="Enter password" required>
                                <input type="checkbox" onclick="myFunction()" class="passhow"><span class="showpassword">Show Password</span>
                            </div>
                            <div>
                                <label for="speciality">Speciality<span class="requerd">*</span></label>
                                <select id="speciality" name="speciality">
                                    
                                    <option value="Dentist">Dentist</option>
                                    <option value="Gynecologist/obstetrician">Gynecologist/obstetrician</option>
                                    <option value="General physician">General physician</option>
                                    <option value="Dermatology">Dermatology</option>
                                    <option value="Ear-Nose-Throat">Ear-Nose-Throat(ENT)</option>
                                    <option value="Homoeopath">Homoeopath</option>
                                    <option value="Ayurveda">Ayurveda</option>
                                    
                                </select>
                            </div>
                            <div>
                                <label for="address">Address<span class="requerd">*</span></label>
                                <input type="text" name="address" id="" placeholder="Enter full address" required>
                            </div>
                            <div>
                                <label for="image">Upload Image<span class="requerd">*</span></label>
                            <input  type="file" name="file" id="" ><br>
                            </div>
                        </div>  
                        <input type="checkbox" name="chec" id="" required>By signing up, I agree to terms
                        <input type="submit"  name="submit" value="submit">
                    </form>
                </div>
            </div>
        </section>


        
        <!-- footer -->

        <footer class="footer">
            <div class="footcontent">
                <div class="footcon">
                    
                    <ul>
                        <li class="foothead">Medicine</li>
                        <li>About</li>
                        <li>Blog</li>
                        <li>Careers</li>
                        <li>Press</li>
                        <li>Contact Us</li>
                    </ul>
                </div>
                <div class="footcon">
                    
                    <ul>
                        <li class="foothead">For patients</li>
                        <li>Search for doctors</li>
                        <li>Search for Clinics</li>
                        <li>Health app</li>
                        <li>About medicines</li>
                        <li>Read health article</li>
                    </ul>
                </div>
                <div class="footcon">
                    
                    <ul>
                        <li class="foothead">For doctors</li>
                        <li>Profile</li>
                        <li>For Clinics</li>
                        <li>Medicine pro</li>
                        
                    </ul>
                </div>
                <div class="footcon">
                    
                    <ul>
                        <li class="foothead">For hospitals</li>
                        <li>Insta by Medicine</li>
                        <li>Profile</li>
                        <li>Medicine Reach</li>
                        <li>Medicine Drive</li>
                        <li>Wellness Plans</li>
                    </ul>
                </div>
                <div class="footcon">
                    
                    <ul>
                        <li class="foothead">More</li>
                        <li>Help</li>
                        <li>Developers</li>
                        <li>Privacy Policy</li>
                        <li>Terms & Conditions</li>
                        <li>Healthcare Directory</li>
                    </ul>
                </div>
                <div class="footcon">
                    
                    <ul>
                        <li class="foothead">Social</li>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Linkeden</li>
                        <li>Youtube</li>
                        <li>Github</li>
                    </ul>
                </div>
            </div>
            <div class="footbottom">
                <h1>Medicine</h1>
                <p>Copyright © 2017, Medicine. All rights reserved.</p>
            </div>
        </footer>
	    <script>
            function myFunction() {
              var x = document.getElementById("myInput");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
        </script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>                                                    
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>