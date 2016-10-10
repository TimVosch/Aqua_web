<?php
    namespace aquaweb\session;
    session_start();
    
    include $_SERVER['DOCUMENT_ROOT'].'/database/database.php';
    
    function verifyLogin() {
        if (isset($_SESSION['username'])) {
            return true;
        } else {
            header('HTTP/1.1 302 Found');
            header('Location: /login/');
            exit;
        }
    }