<?php
    namespace aquaweb\session;

    include_once $_SERVER['DOCUMENT_ROOT'].'/git2log/database/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/git2log/database/models/account.php';
    use aquaweb\database\models\Account;

    session_start();
    
    
    // If not loggedin then redirect
    function checkLoginElseRedirect($redirect = '/git2log/session/login') {
        if (!isLoggedIn()) {
            header('Location: '.$redirect);
            exit;
        }
    }
    // If loggedin then redirect
    function checkLoginThenRedirect($redirect = '/git2log/') {
        if (isLoggedIn()) {
            header('Location: '.$redirect);
            exit;
        }
    }

    // Check if session is loggedin
    function isLoggedIn() {
        return isset($_SESSION['account']);
    }

    // Login account
    function loginAccount($username, $password, $redirect = '/git2log/') {
        if (!isset($username, $password)) {
            return (object) array('success'=>false, 'message'=>"Missing username/password");
        }

        try {
        // Query account that use this name and password, or fail
            $account = Account::where([
                    ['username', '=', $username]
                ])->firstOrFail();

            // Check account password
            $valid = password_verify($password, $account->password);
            if (!$valid) {
                return (object) array('success'=>false, 'message'=>"Wrong username/password");
            }

            // If nothing was thrown then assume we've logged in
            $_SESSION['account'] = $account;
            // we're instantly redirecting so returning is not necessary(?)
            //return (object) array('success'=>true, 'message'=>"Success");
            header('Location: '.$redirect);
            exit();

            // Catch error
        }catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return (object) array('success'=>false, 'message'=>"Wrong username/password");
        }
    }

    function logoutAccount() {
        session_destroy();
        unset($_SESSION['account']);
        unset($Account);
        return (object) array('success'=>true, 'message'=>'Logged out');
    }


    // Set some public variables
    if (isLoggedIn()){
        $Account = $_SESSION['account'];
    }
