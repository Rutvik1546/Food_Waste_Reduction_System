<?php
include_once 'core/Connection.php';
if(isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Waste Management System - Registration Page</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #5db075, #3b8d99);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        form {
            background-color: #fff;
            padding: 40px 50px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 420px;
        }

        label {
            display: block;
            font-weight: 600;
            color: #333;
            margin-bottom: 6px;
        }

        input[type="text"], input[type="email"],input[type="password"], select {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
            transition: all 0.3s ease;
            font-size: 15px;
        }

        input:focus, select:focus {
            border-color: #5db075;
            outline: none;
            box-shadow: 0 0 4px rgba(4, 177, 53, 0.4); 
        }

        input[type="submit"] {
             width: 100%;
            background: #025d1cff;
            border: none;
            padding: 12px;
            border-radius: 6px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.3s ease; 
        }

        input[type="submit"]:hover {
            background: #4ca866;
        }

        a {
            color: #0f6126ff;
            text-decoration: none;
            font-weight: 600;
        }

        a:hover {
            text-decoration: underline;
        }

        button {
             width: 100%;
            background: #025d1cff;
            border: none;
            padding: 12px;
            border-radius: 6px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.3s ease; 
        }

        button > a {
            color: white;
            text-decoration: none;
            font-weight: 600;
        }
        button:hover {
            background: #4ca866;
        }
        p {
            text-align: center;
            margin-top: 15px;
            color: #333; 
        }   



        @media (max-width: 480px) {
            form {
                padding: 30px 25px;
            }
        }
        .containe{
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.8s ease-in-out;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        } 
    </style>
</head>

<body>
    <div class="containe">
    <form action="index.php?controller=auth&action=registerPost" method="post">
        <h1>Register Yourself</h1>
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="Your Name" id="name">

        <label for="email">Email</label>
        <input type="email" name="email" placeholder="you@gmail.com" id="email">

        <label for="role">Role</label>
        <select name="role" id="role">
            <option>Choose Role</option>
            <option value="donor">Donor</option>
            <option value="receiver">Receiver</option>
        </select>

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" id="password">

        <label for="cpassword">Confirm Password</label>
        <input type="password" name="cpassword" placeholder="Cofirm Password" id="cpassword">

        <input type="submit" value="Register" name="Register"><br/><br/>
        <!-- < ?php if(isset($_SESSION['role'])) { if($role === "admin") { ?> <a href="index.php?controller=dashboard&action=admin"><button>Back To Dashboard</button></a> < ?php } }?> -->
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'){ ?>
            <button type="button" onclick="location.href='index.php?controller=dashboard&action=admin'">
                Back To Dashboard
            </button>
        <?php } ?>

        <p>Already have an account? <a href="index.php?controller=auth&action=login">Login here</a></p>
    </form>
    </div>
</body>
</html>
