<?php 
require_once __DIR__.'/Config.php';
if (!isset($_SESSION)) {
    session_start();
}

Class Connection {
    private $conn;

    public function __construct() {
            $this->conn = new mysqli(
                Config::get('DB_HOST'),
                Config::get('DB_USER'), 
                Config::get('DB_PASSWORD'), 
                Config::get('DB_NAME'));
    if($this->conn->connect_error) {
        die("Error : ".$this->conn->connect_error);
    }

    }

    public function getConnection(){
        return $this->conn;
    }
}