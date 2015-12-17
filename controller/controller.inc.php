<?php
/**
 * Created by PhpStorm.
 * User: sarahetter
 */

class Controller {

    public function __construct() {
        spl_autoload_register(function ($class) {
            require_once 'classes/' . $class . '.php';
        });
    }

    public function loopSubtemplates() {
        $controller = new Subtemplate();
        return $controller->loopSubtemplates();
    }
}
