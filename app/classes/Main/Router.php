<?php
namespace App\Main;

class Router {
    private $_route = array();
    public function setRoute($dir, $file) {
        $this->_route[trim($dir, "/")] = $file;
    }

    public function route() {
        if (!isset($_SERVER["PATH_INFO"])) {
            include_once "page/index.html";
        } elseif (isset($this->_route[trim($_SERVER["PATH_INFO"], "/")])) {
            include_once $this->_route[trim($_SERVER["PATH_INFO"], "/")];
        }
        else return false;
        return true;
    }
}

?>
