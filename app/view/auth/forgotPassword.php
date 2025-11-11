<?php
include_once 'core/Connection.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Waste Management System - Forgot Password</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: linear-gradient(135deg, #00b09b, #96c93d);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: #fff;
            padding: 40px 50px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }
         a{
            color: #56ab2f;
            text-decoration: none;
            font-weight: 600;  
        }
        h1 {
            color: #333;
            margin-bottom: 25px;
            font-size: 26px;
        }

        label {
            display: block;
            color: #555;
            font-weight: 500;
            text-align: left;
            margin-bottom: 8px;
        }

        input[type="email"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            outline: none;
            font-size: 16px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        input[type="email"]:focus {
            border-color: #00b09b;
            box-shadow: 0 0 5px rgba(0, 176, 155, 0.5);
        }

        input[type="submit"] {
            background: #00b09b;
            color: white;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background: #019d89;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Forgot Password</h1>
        <form action="index.php?controller=auth&action=forgotPost" method="post">
            <input type="hidden" name="id" value="<?= $user_data['id']; ?>">
            <label for="email">Enter your registered email:</label>
            <input type="email" name="email" id="email" placeholder="you@gmail.com" >
            <input type="submit" value="Send Mail" name="SendEmail"><br><br>
            <p>Back to login? <a href="index.php?controller=auth&action=login">Login here</a></p>
        </form>
    </div>
</body>
</html>
