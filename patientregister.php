<?php
 include "connection.php";

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Medicine -- Patien Register</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <!-- nav bar-->
        <header class="navbar">
            <div class="logo">
                <h2><a href="http://localhost/medicine/index.php">Medicine</a></h2>
            </div>
            <div class="navmanu">
                <ul>
                    <li>Find Doctor</li>
                    <li><button> <a href="http://localhost/medicine/patientlogin.php " class="navlink">Login / Signup</a></button></li>
                </ul>
            </div>
        </header>

        <!-- main section-->
        <div class="logsign">
            <a href="http://localhost/medicine/patientlogin.php">Login</a>
            <a href="#" class="linkactive">Register</a>
        </div>
        <section class="drbody">
            
            <div class="drhead">
                <div class="heading">
                    <h1>Patient Signup</h1>
                </div>
                <div class="pr">
                    <h4>Join as Doctor <a href="http://localhost/medicine/doctorregister.php">Register Here</a></h4>
                </div>
            </div>
            <div class="dr">
                <div class="drimg pimg">
                    
                    <img src="img/heart-2730784.png" alt="">
                    <img src="img/medical-4510408_1280.png" alt="">
                </div>
                <div class="drform">
                    
                    <form action="" method="POST" class="drfr">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" id="" placeholder="Enter full name" required>
                        <label for="phone">Phone Number</label>
                        <input type="number" name="phone" id="" placeholder="Enter mobile number"  pattern="^[6-9][0-9][0-9]{0,9}$" maxLength="10" Srequired>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="" placeholder="Enter email" required>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="" placeholder="Enter password" required>
                        <label for="gender">Gender</label>
                        <input type="radio" name="gender" value="male" id="" required>Male
                        <input type="radio" name="gender" value="female" id="" >Female
                        <label for="image">Date Of Birth </label>
                        <input type="date" name="dob" id="" placeholder="Enter date of birth" ><br>
                        <input type="checkbox" name="chec" id="">By signing up, I agree to terms
                        <input type="submit" value="Register" name="submit">
                    </form>
                </div>
            </div>
        </section>
        <?php
        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $phone=$_POST['phone'];
            $email=$_POST['email'];  
            $password=$_POST['password'];
            $gender=$_POST['gender'];
            $dob=$_POST['dob'];
           

            $query= " INSERT INTO  patient (name,phone,email,password,gender,dob)
            values('$name','$phone','$email','$password','$gender','$dob')";
            $result= mysqli_query($connection,$query);
            if($result){
                echo "data inserted";
        }
        else{
             die(mysqli_error($connection));
        }
    }
?>

        
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
    </body>
</html>