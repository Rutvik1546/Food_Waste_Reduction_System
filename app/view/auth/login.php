<?php
include_once 'core/Connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Waste Management System - Login Page</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: linear-gradient(135deg, #5db075, #3b8d99);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center; 
        }

        form {
            background: #ffffff;
            padding: 40px 50px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px; 
        }

        h1 {
             text-align: center;
            color: #333;
            margin-bottom: 30px; 
        }

        label {
            display: block;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        } 

        input[type="email"],input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1.5px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        } 

        input[type="email"]:focus, input[type="password"]:focus {
            border-color: #56ab2f;
            outline: none; 
            box-shadow: 0 0 4px rgba(4, 177, 53, 0.4); 
        } 

         input[type="submit"] {
            width: 100%;
            background-color: #56ab2f;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.4s ease; 
        } 

        input[type="submit"]:hover {
            background-color: #3b7a1f;
        }

        p {
             text-align: center;
            margin-top: 15px;
            color: #333; 
        } 

        a {
             color: #56ab2f;
            text-decoration: none;
            font-weight: 600; 
        } 

        a:hover {
            text-decoration: underline;
        }

        
    </style>
</head>
<body>
    <div class="containe">

    <form action="index.php?controller=auth&action=loginPost" method="post">
        <h1>Login </h1>
        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="you@gmail.com" id="email">

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Password">

        <input type="submit" value="Login" name="Login">

        <p>Forgot your password? <a href="index.php?controller=auth&action=forgot">Click here</a></p>
        <p>Don't have an account? <a href="index.php?controller=auth&action=register">Register here</a></p>
    </form>
</div>
</body>
</html>
