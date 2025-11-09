<?php
include_once 'core/Connection.php';

// if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['SendEmail'])) {

//     $db = new Connection();
//     $conn = $db->getConnection();

//    $email = $_POST['email'];

//     $reset_link = "http://localhost/FOOD_WASTE_REDUCTION_SYSTEM/index.php?controller=auth&action=reset";
//    $email_sql = $conn->prepare("SELECT * from users where email=?");
//    $email_sql->bind_param("s",$email);
//    $email_sql->execute();
//    $email_result = $email_sql->get_result();
//    $user_data = $email_result->fetch_assoc();

//    if($email_result->num_rows > 0) {
//         $email_subject = "Password Reset Request - Local Food Waste Reduction System";
//         $email_message = "Dear, {$user_data['name']} We received a request to reset your password for your account on the Local Food Waste Reduction System.

// If you made this request, please click the link below to reset your password:
// $reset_link&id={$user_data['id']}

// This link will be valid for the next 15 minutes. 
// If you did not request a password reset, please ignore this email — your password will remain unchanged.

// Thank you for being a part of our mission to reduce food waste and help the community.

// Warm regards,  
// The Local Food Waste Reduction System Team";
//     $email_headers = "From: rutvikmistry8642@gmail.com";

//     if(mail($email,$email_subject,$email_message,$email_headers)) {
//         $_SESSION['message'] = "Email Sent successfully!";
//         header("Location:index.php?controller=auth&action=forgot");
//         exit;
//     } else {
//         $_SESSION['message'] = "Failed to send email!";
//         header("Location:index.php?controller=auth&action=forgot");
//         exit;
//     }

//    } else {
//         $_SESSION['message'] = "Email not found! Please enter correct email!";
//         header("Location:index.php?controller=auth&action=forgot");
//         exit;
//    }

// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Waste Management System - Forgot Password</title>

    <style>
        /* Reset and base styles */
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
            /* transform: translateY(-2px); */
        }

        /* @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        } */

        /* Responsive */
        /* @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
            }
            h1 {
                font-size: 22px;
            }
        } */
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


<!-- ------------------------------------------------ -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Waste Management System - Forgot Password</title>
</head>
<body>
    < ?php
        // if(isset($_SESSION['message'])) {
        //     echo "<script> alert('{$_SESSION['message']}');</script>";
        //     unset($_SESSION['message']);
        // }
    ?>
    <h1>Forgot Password</h1>
    <form method="post">
        <input type="hidden" name="id" value="< ?= $user_data['id']; ?>">
        <label for="email">Enter your registered email:</label>
        <input type="email" name="email" id="email" require><br/><br/>
        <input type="submit" value="Send Mail" name="SendEmail">
    </form>
</body>
</html> -->
