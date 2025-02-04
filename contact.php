<?php
include 'topnav.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // You can add email sending here (e.g., using PHPMailer)
    echo "<script>alert('Your message has been sent successfully!');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Holy Cross College</title>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .contact-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .contact-info, .contact-form {
            flex: 1;
            min-width: 300px;
        }
        h2 {
            color: #007bff;
            margin-bottom: 20px;
        }
        .contact-info h3 {
            color: #333;
            margin-bottom: 10px;
        }
        .contact-info p {
            color: #666;
            margin-bottom: 15px;
        }
        .contact-info a {
            color: #007bff;
            text-decoration: none;
        }
        .contact-info a:hover {
            text-decoration: underline;
        }
        .contact-info .social-links {
            margin-top: 20px;
        }
        .contact-info .social-links a {
            display: inline-block;
            margin-right: 10px;
            color: #333;
            font-size: 1.2rem;
        }
        .contact-info .social-links a:hover {
            color: #007bff;
        }
        .contact-form label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .contact-form button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            margin-top: 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        .contact-form button:hover {
            background: #0056b3;
        }
        .map-container {
            margin-top: 20px;
        }
        .map-container iframe {
            width: 100%;
            height: 300px;
            border: 0;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="contact-container">
    <!-- Contact Information -->
    <div class="contact-info">
        <h2>Contact Information</h2>
        <h3>Holy Cross College</h3>
        <p><strong>Address:</strong> Sta. Lucia, Sta. Ana, Pampanga, Philippines</p>
        <p><strong>Phone:</strong> +63 45 123 4567</p>
        <p><strong>Email:</strong> <a href="mailto:info@holycross.edu.ph">info@holycross.edu.ph</a></p>
        <p><strong>Business Hours:</strong> Mon - Fri, 8:00 AM - 5:00 PM</p>

        <!-- Social Media Links -->
        <div class="social-links">
            <h3>Follow Us</h3>
            <a href="https://facebook.com/holycrosscollegepampanga" target="_blank" title="Facebook"><i class="fab fa-facebook"></i></a>
            <a href="https://twitter.com/holycrosspampanga" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="https://instagram.com/holycrosspampanga" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="https://youtube.com/holycrosspampanga" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a>
        </div>

        <!-- Map -->
        <div class="map-container">
            <h3>Our Location</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3850.123456789012!2d120.686123!3d15.123456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3396f123456789ab%3A0x1234567890abcdef!2sHoly%20Cross%20College%20Pampanga!5e0!3m2!1sen!2sph!4v1621234567890!5m2!1sen!2sph" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div>

<!-- Font Awesome for Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>
</html>