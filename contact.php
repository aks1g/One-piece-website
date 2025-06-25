<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONE PIECE WORLD </title>
    <link rel="stylesheet" href="./css files/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">    
</head>
<body>
    <nav class="navbar bg-dark">
        <div class="container">
            <h1 class="logo">OP</h1>
            <ul class="links">
                <li class="nav-items"><a href="./home.html">HOME</a></li>
                <li class="nav-items"><a href="./about.html">OP CHAR.</a></li>
                <li class="nav-items"><a href="./aboutus.html">ABOUT US</a></li>
                <li class="nav-items"><a href="./contact.php">CONTACT US</a></li>
        </ul>
    </div>
</nav>
    <section class="contact-form">
        <div class="container">
            <div class="form-wrapper">
                <div class="company-add">
                    <div class="details">
                        <i class="fas fa-map-marker-alt fa-3x text-red"></i>
                        <h2 class="md-heading text-grey"> LOCATION</h2>
                        <p>581/23, mission chowk,sonepat-haryana,131001</p>
                    </div>
                    <div class="details">
                        <i class="far fa-envelope fa-3x text-red"></i>
                        <h2 class="md-heading text-grey"> E-MAIL</h2>
                        <p>gogoanime11w@gmail.com</p>
                    </div>
                    <div class="details">
                        <i class="fas fa-phone fa-3x text-red"></i>
                        <h2 class="md-heading text-grey"> CALL</h2>
                        <p>+91-8278041469</p>
                    </div>
                        <img src="./img/MV5BM2YwYTkwNjItNGQzNy00MWE1LWE1M2ItOTMzOGI1OWQyYjA0XkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_FMjpg_UX1000_.jpg" alt="one piece company" class="company-img1">
                </div>
                <form action="sendmail.php" class="form" method="POST">
                    <h1 class="lg-heading form-heading"> contact us</h1>
                    <p class="text-grey">Have any questions, suggestions, or just want to share your love for One Piece? We're here to listen! Reach out to us through the form below, and we'll get back to you as soon as possible.</p>
                    <div class="info">
                        <label for="username">USERNAME</label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="info">
                        <label for="email">E-Mail</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="info">
                        <label for="Phone">Phone</label>
                        <input type="text" name="phone" required>
                    </div>
                    <div class="info">
                        <label for="message">MESSAGE</label>
                        <textarea name="msg" id="message"></textarea>
                    </div>                    
                    <button class="form-btn" name="send" value="Send">
                        submit
                    </button>
                </form>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="social-media-icons">
            <a href="https://www.facebook.com/profile.php?id=100087189217187&mibextid=ZbWKwL"><i class="fab fa-facebook fa-3x text-fb"></i></a>
            <a href="https://www.instagram.com/_akshit_2_?igsh=MWdjMWpna283MTlnNA==" ><i class="fab fa-instagram fa-3x text-ig"></i></a>
            <a href="https://www.snapchat.com/add/akshit_61?share_id=SOrZKPblxIQ&locale=en-GB"><i class="fab fa-snapchat fa-3x text-snap"></i></a>
        </div>
        <p> One Piece World &copy; 2024, All Rights Reserved</p>
    </footer>
</body>
</html>

<?php


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['send']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $$msg = $_POST['msg'];
}

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'akshitgo66@gmail.com';                     //SMTP username
    $mail->Password   = 'eokq hzmi bkun qhyk';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('akshitgo66@gmail.com', 'Contact form');
    $mail->addAddress('tilakgoel485@gmail.com', 'my mail');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = "Sender name - $name <br> Sender Email - $email <br> Sender Phone Number - $phone <br> Sender Message - $msg";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>