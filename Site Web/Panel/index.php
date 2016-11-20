<?php

    $smvc = '.';

    define('ROOT', realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR);

    if (!is_dir($smvc) and is_dir(ROOT.$smvc)) {
        $smvc = ROOT.$smvc;
    }

    define('SMVC', realpath($smvc).DIRECTORY_SEPARATOR);

    unset($smvc);

    if (file_exists(SMVC.'vendor/autoload.php')) {
        require SMVC.'vendor/autoload.php';
    } else {
        echo "<h1>Please install via composer.json</h1>";
        echo "<p>Install Composer instructions: <a href='https://getcomposer.org/doc/00-intro.md#globally'>https://getcomposer.org/doc/00-intro.md#globally</a></p>";
        echo "<p>Once composer is installed navigate to the working directory in your terminal/command promt and enter 'composer install'</p>";
        exit;
    }

    if (!is_readable(SMVC.'app/Core/Config.php')) {
        die('No Config.php found, configure and rename Config.example.php to Config.php in app/Core.');
    }

    define('ENVIRONMENT', 'development');

    if (defined('ENVIRONMENT')) {
        switch (ENVIRONMENT) {
            case 'development':
                error_reporting(E_ALL);
                break;
            case 'production':
                error_reporting(0);
                break;
            default:
                exit('The application environment is not set correctly.');
        }

    }

    new Core\Config();

    require SMVC.'app/Core/routes.php';

?>
