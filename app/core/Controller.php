<?php
require_once __DIR__.'/../../common/Utility.php';
class Controller {
    protected function view($view) {
        $viewFile = __DIR__ . "/../view/{$view}.php";
        if (file_exists($viewFile)) {
            require $viewFile;
        } else {
            Utility::setFlashMessage("error_message","View File Not Found : $viewFile");
            Utility::getFlashMessage('error_message');
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
?>
