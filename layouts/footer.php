<footer id="footer"> 
      <div class="bg"></div>  
      <div class="content"> 
        <div class="group"> 
          <div class="col span_1_of_3"> 
            <h2>Links</h2>  
            <div class="vmenu"> 
              <ul> 
                <li>
                  <a href="index.php">Home</a>
                </li>  
                <li>
                  <a href="account.php">My Account</a>
                </li>
                <li>
                  <a href="about_us.php">About Us</a>
                </li>  
                <li>
                  <a href="faculty.php">Faculty</a>
                </li>
                <li>
                  <a href="facilities.php">Facilities</a>
                </li>
                <li>
                  <a href="online_registration.php">Online Registration</a>
                </li>
                <?php
                  if(isset($_SESSION['admin_logged_in'])){
                    echo '<li><a href="admin_dashboard.php">Admin Dashboard</a></li>';
                  }
                ?>
              </ul> 
            </div> 
          </div>  
          <div class="col span_1_of_3"> 
            <h2>About Us</h2>  
            <p>Taguig Integrated School is the oldest public school in the City of Taguig. Its former name was Taguig Central School.</p> 
          </div>  
          <div class="col span_1_of_3"> 
            <h2>Contact</h2>  
            <p><?php echo $websiteName; ?>
              <br /> <?php echo $websiteAddress; ?>
              <br /> <?php echo $websiteContact; ?>
            </p> 
          </div> 
        </div>  
        <div class="clear"></div>  
        <div class="baseline"> 
          <div style="float:left;margin-top:7px"> 
            <p> 
              <!-- Update your organization copyright --> Copyright - 2022 - <?php echo $websiteName; ?> | All Rights Reserved | 
              Online Portal for <?php echo $websiteName; ?> | A Project from FEU Institute of Technology
            </p> 
          </div>  
          
          <div class="clear"></div> 
        </div> 
      </div> 
</footer> 