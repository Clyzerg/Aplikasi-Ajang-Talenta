<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $judul; ?></title>
    <style>
        /* Reset default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Background image and general body style */
        body {
            font-family: 'Arial', sans-serif;
            background: url('https://www.w3schools.com/w3images/forestbridge.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            animation: backgroundMove 30s infinite linear;
        }

        /* Animasi bergerak latar belakang */
        @keyframes backgroundMove {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: 100% 100%;
            }
        }

        /* Login container styling */
        .login-container {
            background: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 10px;
            width: 350px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            animation: fadeIn 1s ease-out;
        }

        /* Fade-in animation */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        /* Header styling */
        h2 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #b3d9ff; /* Blue light color */
            font-weight: 600;
            animation: slideUp 1s ease-out;
        }

        /* Slide-up effect for header */
        @keyframes slideUp {
            0% {
                transform: translateY(20px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Input fields styling */
        .login-container input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #b3d9ff;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .login-container input:focus {
            outline: none;
            border: 1px solid #66ccff; /* Blue focus effect */
            box-shadow: 0 0 10px rgba(102, 204, 255, 0.5);
        }

        /* Submit button styling */
        .login-container button {
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            background-color: #66ccff; /* Light blue */
            color: white;
            border: none;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .login-container button:hover {
            background-color: #4da6ff; /* Slightly darker blue */
            transform: translateY(-2px);
        }

        /* Error message styling */
        .login-container .error-message {
            background-color: #f44336;
            color: white;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 5px;
            font-size: 14px;
        }

        /* Footer styling */
        .login-container .form-footer {
            margin-top: 20px;
            font-size: 14px;
            color: #b3d9ff;
        }

        .login-container .form-footer a {
            color: #66ccff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .login-container .form-footer a:hover {
            color: #4da6ff;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>

        <?php 
        // Tampilkan error jika ada
        if ($this->session->flashdata('login_error')) {
            echo '<div class="error-message">' . $this->session->flashdata('login_error') . '</div>';
        }
        ?>

        <form action="<?php echo site_url('auth/auth_process'); ?>" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>

        <div class="form-footer">
            <p>Belum punya akun? <a href="#">Daftar di sini</a></p>
        </div>
    </div>
</body>

</html>
