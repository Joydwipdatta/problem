<?php
include "connection.php";
session_start();
include "psession.php";

?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Medicine | patient | Appointment Booking</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;500&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="style3.css">
        <link rel="stylesheet" href="queries.css">
        <style>
            body{
                background-color: #F5F7FA;
            }
        </style>
    </head>
    <body>
        <!-- nav bar-->
        <header class="navbar">
            <div class="logo">
                <a href="patient.php"><h2>Medicine</h2></a>
            </div>
            <div class="navmanu">
                <ul>
                    <a href="doctorlist.php"><li><ion-icon name="search-outline" class="iconp"></ion-icon>Find Doctor</li></a>
                    <a href="pprofile.php"><li><ion-icon name="person-circle-outline" class="iconp"></ion-icon>Profile</li></a>
                    <a href="logout.php"><li><ion-icon name="log-out-outline" class="iconp"></ion-icon>Logout</li></a>
                </ul>
            </div>
        </header>
        <section class="slots">

            <div class="drsection"> 
             <div class="drinformation">
                <div class="drinfimg">
                    <div class="drimg">
              <?Php      
                        $duid=$_GET['duid'];
                         $query="SELECT * FROM `doctor` WHERE duid='$duid'";
                         $data=mysqli_query($connection,$query);
                         $result=mysqli_fetch_assoc($data);
              ?>
                        <img src="img/doc2.jpg" alt="">
                    </div>
                    <div class="drinf">
                        <h2><?php  echo $result['dname']?></h2>
                        <h4><?php  echo $result['dspeciality']?></h4>
                        <p><?php  echo $result['dphone']?></p>
                        <p><?php  echo $result['daddress']?></p>
                                       
                    </div>
                </div>
                <div class="drinf-box">
                    <div>
                        <h2><ion-icon name="people-outline" class="patientsloticon"></ion-icon>666</h2>
                        <h6>Appointments</h6>
                        
                    </div>
                    <div>
                        <h2><ion-icon name="newspaper-outline" class="patientsloticon"></ion-icon>518</h2>
                        <h6>Prescriptions</h6>
                        
                    </div>
                    <div>
                        <h2><ion-icon name="heart-outline" class="patientsloticon"></ion-icon>402</h2>
                        <h6>Treatments</h6>
                        
                    </div>
                </div>
             </div>            
            </div> 
 
  <?php
  if(isset($_POST['submit'])){
    $dname=$_POST['dname'];
    $duid=$_POST['duid'];
    $pname=$_POST['pname'];
    $puid=$_POST['puid'];
    $day=$_POST['day'];
    $slot=$_POST['slot'];
    $bookingdate=$_POST['bookingdate'];
    $symptom=$_POST['symptom'];
    
     
     $query="INSERT INTO appointment (duid,dname,puid,pname,slot,bookingdate,symptom)  VALUES('$duid','$dname','$puid',$pname,'$slot','$bookingdate','$symptom')";
     $result=mysqli_query($connection,$query);
     if($result){
        echo "data inserted";
     }else {
        echo "try again";
     }

  }

?>


        <div class="slotbody">
            <form action="" method="POST">
         
                <input type="text" name="dname" value="<?php echo $result['dname']?>" readonly> 
                <input type="text" name="duid"  value="<?php echo $result['duid']?>" readonly> 

                <?php
                $duid=$_GET['duid'];
                $query="SELECT * FROM `slots` WHERE duid='$duid'";    
                $result=mysqli_query($connection,$query);
                
                ?>
                <div class="daytimeslot">
                    <div>
                        <label for="day" class="dayname">Choose Day<span class="requerd">*</span></label>
                        <select id="day" name="day">
                            <option value="Monday">Monday </option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select> 
                    </div>
                    
                    <div>    
                        <label for="slot" class="slotno">Choose Slot<span class="requerd">*</span></label>
                        <select id="slot" name="slot">
                            <option value="">10:00</option>
                            <option value="">11:00</option>
                            <option value="">12:00</option>
                            <option value="">13:00</option>
                            <option value="">15:00</option>
                            <option value="">16:00</option>
                            <option value="">17:00</option>
                            <option value="">18:30</option>
                            <option value="">19:30</option>
                        </select>
                    </div>
                  <?php include "psession.php";?>  
                </div>      
                <input type="text" name="pname" value="<?php  echo $result['pname']?>" readonly> 
                <input type="text" name="puid" value="<?php  echo $result['puid']?>" readonly> 


                
               <!--- <input type="hidden" name="phone" id="" value="" readonly>
                
                
                <input type="hidden" name="dob" id="" value="" placeholder="Enter date of birth" readonly>

                
                <input type="hidden" name="gender" id="" value="" readonly>
                <input type="hidden" name="lastappointment" id="" value="2022-02-14" placeholder="Enter Last Appointment" required>---->
                <div class="daytimeslot">
                    <div>
                        <label for="bookeddate">Booking Date<span class="requerd">*</span></label>
                        <input type="date" name="bookingdate" id="" required> <br>
                    </div>
                    <div>  
                        <label for="upload picture">Upload picture<span class="requerd">*</span></label><br>
                        <input type="file" name="image" id="" value=""><br>
                    </div>

                </div>
                
                <label for="symptoms">Symptoms<span class="requerd">*</span></label>
                <input type="text"  name="symptom" placeholder="Enter symptoms  like: Asthma, Hypertension" required> 

                <input type="submit" name="submit" value="Book a Slot">
            </form>

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


        <!-- javascript -->
       
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>                                                    
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    

    </body>
</html>