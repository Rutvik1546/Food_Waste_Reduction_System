<?php

require_once __DIR__ . '/../../core/Connection.php';
require_once __DIR__ . '/../../core/Config.php';
require_once __DIR__ . '/../model/User.php';
require_once __DIR__ . '/../../common/Utility.php';

if(isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
}

class AuthController extends Controller
{

    public function loginAction()
    {
        $this->view('auth/login');
    }

    public function registerAction()
    {
        $this->view('auth/register');
    }

    public function forgotAction()
    {
        $this->view('auth/forgotPassword');
    }

    public function resetAction()
    {
        $this->view('auth/resetPassword');
    }

    public function loginPostAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['Login'])) {
            $email = $this->validate($_POST['email']);
            $password = $this->validate($_POST['password']);

            if ($email === 'admin@gmail.com' && $password === 'Admin@123') {
                header("Location: index.php?controller=dashboard&action=admin");
                exit;
            }

            $userModel = new User();
            $user = $userModel->getUserByEmail($email);


            if ($user->num_rows > 0) {
                $row = $user->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['role'] = $row['role'];

                    switch ($row['role']) {
                        case 'donor':
                            header("Location: index.php?controller=dashboard&action=donor");
                            break;
                        case 'receiver':
                            header("Location: index.php?controller=dashboard&action=receiver");
                            break;
                        case 'admin':
                            header("Location: index.php?controller=dashboard&action=admin");
                            break;
                        default:
                            Utility::setFlashMessage("error_message","Invalid role assigned!");
                            Utility::getFlashMessage("message");
                    }
                    exit;
                } else {
                    Utility::setFlashMessage("error_message","Incorrect Password!");
                    Utility::getFlashMessage("error_message");
                }
            } else {
                Utility::setFlashMessage("error_message","Email is not registered!");
                Utility::getFlashMessage("error_message");
            }
        } else {
            Utility::setFlashMessage("error_message","Bad Requeset!");
            Utility::getFlashMessage("error_message");
        }
    }

    public function registerPostAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['Register'])) {
            $name = $this->validate($_POST['name']);
            $email = $this->validate($_POST['email']);
            $role = $this->validate($_POST['role']);
            $password = $this->validate($_POST['password']);
            $cpassword = $this->validate($_POST['cpassword']);

            if ($role === "Choose Role") {
                Utility::setFlashMessage("error_message","Please select a valid role!");
                Utility::getFlashMessage("error_message");
                exit;
            }
            $userModel = new User();
            $user = $userModel->getUserByEmail($email);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                Utility::setFlashMessage("error_message","Please enter valid email id!");
                Utility::getFlashMessage("error_message");
            } elseif ($user->num_rows > 0) {
                Utility::setFlashMessage("error_message","Email Already exist!");
                Utility::getFlashMessage("error_message");
            } elseif (!preg_match("/^[A-Za-z0-9!@#$%^&*~]{8,}$/", $password)) {
                Utility::setFlashMessage("error_message","Please enter Strong Password! Password must be of atleast 8 digit!");
                Utility::getFlashMessage("error_message");
            } elseif ($password !== $cpassword) {
                Utility::setFlashMessage("error_message","Password and Confirm Password does not match!");
                Utility::getFlashMessage("error_message");
            } elseif ($role === "Choose Role") {
                Utility::setFlashMessage("error_message","Please select a valid role!");
                Utility::getFlashMessage("error_message");
                
            }else {
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $user_register = $userModel->registerUser($name, $email, $role, $hashedPassword);
                
                if ($user_register) {
                    if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                        Utility::setFlashMessage("success_message","Registered Successfully!");
                        Utility::getFlashMessage("success_message",'index.php?controller=auth&action=displayUser');
                    } else {
                        Utility::setFlashMessage("success_message","Registered Successfully!");
                        Utility::getFlashMessage("success_message",'index.php?controller=auth&action=login');
                    }
                    // header("Refresh:0.01;url='index.php?controller=auth&action=login' ");
                } else {
                    Utility::setFlashMessage("error_message","Failed to Register!");
                    Utility::getFlashMessage("error_message");
                }
            }
        }
    }

    public function forgotPostAction()
    {

        if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['SendEmail'])) {

            $db = new Connection();
            $conn = $db->getConnection();

            $email = $_POST['email'];
            if(empty($email)) {
                Utility::setFlashMessage("error_message","Email is required!");
                Utility::getFlashMessage("error_message");
            } else {

            

            $reset_link = Config::get('BASE_URL') . "index.php?controller=auth&action=reset";

            $email_sql = $conn->prepare("SELECT * from users where email=?");
            $email_sql->bind_param("s", $email);
            $email_sql->execute();
            $email_result = $email_sql->get_result();
            $user_data = $email_result->fetch_assoc();

            if ($email_result->num_rows > 0) {
                $email_subject = "Password Reset Request - Local Food Waste Reduction System";
                $email_message = "
                            <html>
                            <head>
                            <title>Password Reset Request</title>
                            </head>
                            <body>
                            <div>
                                <h3>Reset Your Password</h3>
                                <p>Hi <strong>{$user_data['name']}</strong>,</p>
                                <p>We received a request to reset your password for your account on the <strong>Local Food Waste Reduction System</strong>.</p>
                                <a href='$reset_link&id={$user_data['id']}'>Reset Password</a>
                                <p>If you didn’t request this, just ignore this email.</p>
                                <p>– Food Waste Reduction Team</p>
                            </div>
                            </body>
                            </html>
                            ";

                $email_headers = "From: rutvikmistry8642@gmail.com";
                require_once __DIR__ . '/../core/Mailer.php';

                if (Mailer::send($email, $email_subject, $email_message)) {
                    Utility::setFlashMessage("success_message","Email Sent successfully!");
                    Utility::getFlashMessage("success_message",'index.php?controller=auth&action=login');
                } else {
                    Utility::setFlashMessage("error_message","Failed to send email!");
                    Utility::getFlashMessage("error_message");
                }
            } else {
                Utility::setFlashMessage("error_message","Email not found! Please enter correct email!");
                Utility::getFlashMessage("error_message");
            }
        }
    }
}

    public function logoutAction()
    {
        if (session_destroy()) {
            Utility::setFlashMessage("success_message","Logged out successfully!");
            Utility::getFlashMessage("success_message","index.php?controller=home&action=index");
            exit;
        } else {
            Utility::setFlashMessage("error_message","Failed to log out!");
            Utility::getFlashMessage("error_message");
        }
    }

    public function displayUserAction()
    {
        $this->view('users/displayUser');
    }

    public function updateUserAction()
    {
        $this->view('users/updateUser');
    }

    public function deleteUserAction()
    {
        $this->view('users/deleteUser');
    }

    public function updateUserPostAction()
    {
        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['Update'])) {
            // $id = $_POST['id'];
            $name = $this->validate($_POST['name']);
            $email = $this->validate($_POST['email']);
            $role = $this->validate($_POST['role']);

            $userModel = new User();
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                Utility::setFlashMessage("error_message","Please enter valid email!");
                Utility::getFlashMessage("error_message");
            } elseif ($role === "Choose Role") {
                Utility::setFlashMessage("error_message","Please select a valid role!");
                Utility::getFlashMessage("error_message");
                
                } else {

                $user = $userModel->updateUser($name, $email, $role, $id);
                if ($user) {
                    Utility::setFlashMessage("success_message","Data updated Successfully!");
                    Utility::getFlashMessage("success_message","index.php?controller=auth&action=displayUser");
                    exit;
                } else {
                    Utility::setFlashMessage("error_message","Failed to update data!");
                    Utility::getFlashMessage("error_message");
                }
            }
        }
    }
}

