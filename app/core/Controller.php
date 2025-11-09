<?php
// app/core/Controller.php
require_once __DIR__.'/../../common/Utility.php';
class Controller {
    // load view (example: $this->view('auth/login', ['error'=> 'Invalid']))
    protected function view($view) {
        // convert view path dot/slash notation to file path:
        $viewFile = __DIR__ . "/../view/{$view}.php"; // e.g. 'auth/login' -> app/views/auth/login.php
        if (file_exists($viewFile)) {
            // extract($data); // make $data keys available as variables in view
            require $viewFile;
        } else {
            Utility::setFlashMessage("error_message","View File Not Found : $viewFile");
            Utility::getFlashMessage('error_message');
            // echo "View not found: $viewFile";
        }
    }
    public function validate($data) {
        if(empty($data)) {
            Utility::setFlashMessage("error_message","All feilds are required!");
            Utility::getFlashMessage('error_message');
            exit;
        }

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
