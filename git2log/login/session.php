<?php
    namespace aquaweb\session;
    session_start();
    
    include $_SERVER['DOCUMENT_ROOT'].'/git2log/database/database.php';
    
    // Checks whether session is logged in, if not then redirect
    function verifyLogin() {
        if (isset($_SESSION['username'])) {
            return true;
        } else {
            header('Location: /git2log/login/');
            exit;
        }
    }