<?php
// Include the database connection
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        // Get the username and password from the form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Query to check if the username and password exist
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            // Login successful, start a session
            session_start();
            $_SESSION['username'] = $username;

            // Redirect to the dashboard or home page
            header("Location: home.php");
            exit();
        } else {
            // Invalid login
            echo "<script>alert('Invalid username or password');</script>";
        }
    } elseif (isset($_POST['create'])) {
        // Get the username and password from the form
        $new_username = $_POST['new_username'];
        $new_password = $_POST['new_password'];

        // Query to insert the new user into the users table
        $query = "INSERT INTO users (username, password) VALUES ('$new_username', '$new_password')";
        if (mysqli_query($conn, $query)) {
            // Redirect to the login page after successful registration
            header("Location: login.php");
            exit();
        } else {
            // Failed to insert user
            echo "<script>alert('Error creating account. Please try again.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffffff;
            color: #333333;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Navbar Styling */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            background-color: rgba(0, 0, 255, 0.2);
            backdrop-filter: blur(10px);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .navbar .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #0044cc;
            text-transform: uppercase;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 1.5rem;
        }

        .nav-links a {
            text-decoration: none;
            color: #333333;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #0044cc;
        }

        /* Login Form Styling */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: rgba(0, 0, 255, 0.05); /* Light Blue */
            backdrop-filter: blur(10px);
        }

        .login-form {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 3rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-form h2 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: #0044cc;
        }

        .input-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }

        .input-group label {
            display: block;
            font-size: 1rem;
            color: #333333;
            margin-bottom: 0.5rem;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .login-btn {
            width: 100%;
            padding: 10px;
            background-color: #0044cc;
            color: white;
            font-size: 1.1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-btn:hover {
            background-color: #0033aa;
        }

        /* Modal Styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 1001;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: #000;
        }

        /* Footer Styling */
        .footer {
            text-align: center;
            padding: 1rem;
            background-color: rgba(0, 0, 255, 0.3);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .footer p {
            font-size: 0.9rem;
            color: rgba(0, 0, 0, 0.6);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .login-form {
                padding: 2rem;
            }
            .login-form h2 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
<header>
    <div class="container">
        <div class="logo">Birdenstock</div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Login Form Section -->
<div class="login-container">
    <div class="login-form">
        <h2>Login</h2>
        <form method="POST" action="login.php">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" name="login" class="login-btn">Login</button>
        </form>

        <hr>

        <!-- Button to Open the Modal -->
        <button onclick="openModal()" class="login-btn">Create an Account</button>
    </div>
</div>

<!-- Modal for Create Account -->
<div id="createAccountModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Create an Account</h2>
        <form method="POST" action="login.php">
            <div class="input-group">
                <label for="new_username">Username</label>
                <input type="text" name="new_username" required>
            </div>

            <div class="input-group">
                <label for="new_password">Password</label>
                <input type="password" name="new_password" required>
            </div>

            <button type="submit" name="create" class="login-btn">Create Account</button>
        </form>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <p>&copy; 2025 My Company. All Rights Reserved.</p>
</footer>

<script>
    // Function to open the modal
    function openModal() {
        document.getElementById('createAccountModal').style.display = 'block';
    }

    // Function to close the modal
    function closeModal() {
        document.getElementById('createAccountModal').style.display = 'none';
    }

    // Close the modal if the user clicks outside of it
    window.onclick = function(event) {
        var modal = document.getElementById('createAccountModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
</script>
</body>
</html>