<?php
session_start();
$conn = new mysqli("localhost", "root", "", "findblood");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700&display=swap" rel="stylesheet">

    <title>findbloodfast</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php if(isset($_GET['logout']) && $_GET['logout'] == 'success'): ?>
    <div id="notification" class="notification">
        You have been successfully logged out!
    </div>
    <?php endif; ?>
    
    <header>
        <div class="logo">FindBlood</div>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About us</a></li>
                <li><a href="#contact">Contact us</a></li>
                <li><a href="#find" class="find-blood-btn">Find Blood</a></li>
                <?php if(isset($_SESSION['admin_id'])): ?>
                    <li><a href="admin/dashboard.php" class="admin-btn">Admin Dashboard</a></li>
                    <li><a href="admin/logout.php" class="admin-btn">Logout</a></li>
                <?php elseif(isset($_SESSION['hospital_id'])): ?>
                    <li><a href="hospital/dashboard.php" class="admin-btn">Hospital Dashboard</a></li>
                    <li><a href="hospital/logout.php" class="admin-btn">Logout</a></li>
                <?php else: ?>
                    <li><a href="admin/login.php" class="admin-btn">Admin</a></li>
                    <li><a href="hospital/login.php" class="admin-btn">Hospital Staff Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <div class="slider-container">
    <div class="slider">
    <section id="home"> <!-- home-->
    <h1>Find Blood Fast</h1>
    <p>We can help you find a hospital with the blood type you need!</p>

    </section>
    <section id="about"><!-- about us-->
        <h1>Hello</h1>
    </section>
    <section id="contact"><!-- contact-->
        <h1>1234567890 ok</h1>
    </section>
    <section id="find"><!-- findblood fast -->
    <div class="slideshow-container">
        <input type="radio" name="radio-btn" id="img1" checked>
        <input type="radio" name="radio-btn" id="img2">
        <input type="radio" name="radio-btn" id="img3">
        <input type="radio" name="radio-btn" id="img4">
    
        <div class="slides">
            <div class="slide">
                <div class="slide-content">
                    <div class="description">
                        
                        <h3><b>Tondo Medical Center</b></h3>
                        <p style="color: #aaa;">Metropolitan Ave, Tondo, Manila, 1008 Metro Manila</p>
                        <p>The Tondo Medical Center is a leading hospital providing comprehensive medical services. 
                            It offers specialized care in various fields and caters to the healthcare needs of the community.</p>
                            <div class="description">
                                <div class="contact">
                                    <h4>CONTACT</h4>
                                    <p>Contact Number(s): 8865-9000 /  8253-6103</p>
                                </div>
                            </div>
                            
                    </div>
                    <img src="IMAGES/TONDO MEDICAL CENTER.jpg" alt="Tondo Medical Center">
                </div>
            </div>
    
            <div class="slide">
                <div class="slide-content">
                    <div class="description">
                        <h3><b>San Lazaro Hospital</b></h3>
                        <p style="color: #aaa;">Quiricada St, Santa Cruz, Manila, 1003 Metro Manila</p>
                        <p>The San Lazaro Hospital is a tertiary health facility in Manila, Philippines. It is a referral 
                            facility for communicable diseases and one of the retained special tertiary hospitals of the 
                            Department of Health, funded by the national government.</p>
                            <div class="description">
                                <div class="contact">
                                    <h4>CONTACT</h4>
                                    <p>Contact Number(s): 5309-9523 / 5309-9527</p>
                                </div>
                            </div>
                    </div>
                    <img src="IMAGES/SAN LAZARO HOSPITAL.jpg" alt="San Lazaro Hospital">
                </div>
            </div>
    
            <div class="slide">
                <div class="slide-content">
                    <div class="description">
                        <h3><b>Justice Jose Abad Santos Hospital</b></h3>
                        <p style="color: #aaa;">599 A. Mabini St, Binondo, Manila, 1006 Metro Manila</p>
                        <p>Justice Jose Abad Santos Hospital provides emergency medical services and outpatient care. 
                            It serves as an essential healthcare facility for residents of Binondo and neighboring areas.</p>
                            <div class="description">
                                <div class="contact">
                                    <h4>CONTACT</h4>
                                    <p>Contact Number(s): 8353-6995</p>
                                </div>
                            </div>
                    </div>
                    <img src="IMAGES/JUSTICE JOSE ABAD SANTOS GENERAL HOSPITAL.jpg" alt="Justice Jose Abad Santos Hospital">
                </div>
            </div>
    
            <div class="slide">
                <div class="slide-content">
                    <div class="description">
                        <h3><b>Jose Reyes Hospital</b></h3>
                        <p style="color: #aaa;">Rizal Ave, Santa Cruz, Manila, 1003 Metro Manila</p>
                        <p>Jose Reyes Hospital offers specialized treatments and advanced medical facilities. 
                            It is one of the leading hospitals in Metro Manila, providing exceptional healthcare services.</p>
                            <div class="description">
                                <div class="contact">
                                    <h4>CONTACT</h4>
                                    <p>Contact Number(s): 8711-9491</p>
                                </div>
                            </div>
                    </div>
                    <img src="IMAGES/JOSE REYES HOSPITAL.jpg" alt="Jose Reyes Hospital">
                </div>
            </div>
        </div>

        <div class="nav-manual">
            <label for="img1" class="manual-btn"></label>
            <label for="img2" class="manual-btn"></label>
            <label for="img3" class="manual-btn"></label>
            <label for="img4" class="manual-btn"></label>
        </div>
    </div>
    </section>
    </div>
    </div>
    <script src="script.js"></script>
    
    
    <!-- <a href="https://findbloodfast.com" target="_blank">Visit example</a> -->
    
    <script>
        // Auto-hide notification after 3 seconds
        const notification = document.getElementById('notification');
        if (notification) {
            setTimeout(() => {
                notification.style.display = 'none';
            }, 3000);
        }
    </script>
</body>

</html>