<?php
class Utility {
    public static function setFlashMessage($key, $message) {
        $_SESSION['flash'][$key] = $message;
    }

    public static function getFlashMessage($key, $redirectUrl = null) {
        if (isset($_SESSION['flash'][$key])) {
            $message = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]);

            if ($key === "error_message") {
                // Show alert and go back to previous page
                echo "<script> alert('$message'); 
                        window.history.back();
                      </script>";
                exit;
            } elseif ($key === "success_message") {
                // Show alert and redirect to given page
                if ($redirectUrl) {
                    echo "<script>
                            alert('$message');
                            window.location.href = '$redirectUrl';
                          </script>";
                } else {
                    echo "<script>alert('$message');</script>";
                }
                exit;
            }
        }
    }
}
?>
