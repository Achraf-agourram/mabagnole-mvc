<?php
spl_autoload_register(function ($class) {

    if (file_exists($path = __DIR__ . '/../app/model/entity/' . $class . '.php')) require_once $path;

    else if (file_exists($path = __DIR__ . '/../app/model/repository/' . $class . '.php')) require_once $path;

    else if (file_exists($path = __DIR__ . '/../app/model/service/' . $class . '.php')) require_once $path;

    else if (file_exists($path = __DIR__ . '/../app/controller/' . $class . '.php')) require_once $path;

    else if (file_exists($path = __DIR__ . '/../app/core/' . $class . '.php')) require_once $path;
    
});

session_start();
?>