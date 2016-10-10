<?php
    namespace aquaweb\session;
    session_start();
    
    include $_SERVER['DOCUMENT_ROOT'].'/git2log/database/database.php';
    
    // Make sure session is loggedin before accessing page.
    function verifyLogin() {
        if (isset($_SESSION['username'])) {
            return true;
        } else {
            header('Location: /git2log/login/');
            exit;
        }
    }

    // Check if session is loggedin
    function isLoggedIn() {
        return isset($_SESSION['username']);
    }