<?php
    namespace aquaweb\session;
    session_start();
    
    include $_SERVER['DOCUMENT_ROOT'].'/git2log'.'/database/database.php';
    
    function verifyLogin() {
        if (isset($_SESSION['username'])) {
            return true;
        } else {
            header('Location: /login/');
            exit;
        }
    }