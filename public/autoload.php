<?php
spl_autoload_register(function ($class) {
    $path = __DIR__ . '/model/' . $class . '.php';

    if (file_exists($path)) {
        require_once $path;
    }
});

session_start();

function checkAccess(){
    if(isset($_SESSION['loggedAccount'])){
        $u = User::findById($_SESSION['loggedAccount']);
        if($u->role === 'admin') return $u;
    }
    return false;
}
?>