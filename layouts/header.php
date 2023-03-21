<div id="fb-root"></div>
<script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>

<header>
        <div id="top_header">
            <div class="container">
                <p>Online Portal for <?php echo $websiteName; ?></p>
                <div class="top_nav">
                    <?php
                        if(isset($_SESSION['admin_logged_in'])){
                            echo '
                                <a href="serverside/logout.inc.php">Logout Admin</a>
                            ';
                        }
                        else{
                            echo '
                                <a href="admin.php">Admin Login</a>
                            ';
                        }
                    ?>
                </div>
            </div>
        </div>
        <div id="mid_header">
            <div class="container">
                <div class="inner">
                    <div class="logo">
                        <a href="./index.php">
                            <img src="./images/<?php echo $websiteLogo; ?>" alt="Taguig Integrated School">
                        </a>
                    </div>
                    <div class="title">
                        <h1><?php echo $websiteName; if (isset($_SESSION['admin_logged_in'])){ echo "<sup class='admin_mode'>ADMIN</sup>"; } ?> </h1>
                        <p><?php echo $websiteAddress; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div id="bottom_header">
            <div class="container">
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="account.php">My Account</a></li>
                        <li><a href="about_us.php">About Us</a></li>
                        <li><a href="faculty.php">Faculty &amp; Staff</a></li>
                        <li><a href="facilities.php">Facilities</a></li>
                        <li><a href="online_registration.php">Online Registration</a></li>

                        <?php
                            if(isset($_SESSION['admin_logged_in'])){
                                echo '<li><a href="admin_dashboard.php">Admin Dashboard</a></li>';
                            }
                        ?>

                    </ul>
                </nav>
            </div>
        </div>
    </header>