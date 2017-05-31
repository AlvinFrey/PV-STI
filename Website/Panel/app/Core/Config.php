<?php

namespace Core;

use Helpers\Session;

class Config{

    public function __construct(){
       
        ob_start();

        define('DIR', 'http://dev-pv.fr/Panel/');

        define('DEFAULT_CONTROLLER', 'Pages');
        define('DEFAULT_METHOD', 'index');

        define('TEMPLATE', 'materialize');

        define('LANGUAGE_CODE', 'fr');

        define('DB_TYPE', 'mysql');
        define('DB_HOST', 'localhost');
        define('DB_NAME', 'DBNAME');
        define('DB_USER', 'root');
        define('DB_PASS', '');

        define('PREFIX', 'smvc_');

        define('SESSION_PREFIX', 'smvc_');

        define('SITETITLE', 'PV@STI');

        set_exception_handler('Core\Logger::ExceptionHandler');
        set_error_handler('Core\Logger::ErrorHandler');

        date_default_timezone_set('Europe/London');

        Session::init();

    }
}
