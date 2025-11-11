<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once 'core/Config.php';
include_once 'common/Utility.php';

$controller = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'index';

$config = include_once 'config.php';
foreach ($config as $key => $value) {
    Config::set($key, $value);
}

$controller_name = ucfirst($controller) . "Controller";
$controller_file = Config::get('BASE_PATH') . "/app/controllers/$controller_name.php";

if (file_exists($controller_file)) {
    require_once $controller_file;

    $controllerObj = new $controller_name();
    $action_name = $action . 'Action';

    if (method_exists($controllerObj, $action_name)) {
        $controllerObj->$action_name();
    } else {
        Utility::setFlashMessage("error_message","Action not found!");
        Utility::getFlashMessage('error_message');
    }
} else {
    Utility::setFlashMessage("error_message","Controller not found!");
    Utility::getFlashMessage('error_message');
}
?>





