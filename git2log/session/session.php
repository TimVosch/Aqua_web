<?php
    namespace aquaweb\session;

    include_once $_SERVER['DOCUMENT_ROOT'].'/git2log/database/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/git2log/database/models/account.php';
    use aquaweb\database\models\Account;

    session_start();
    
    
    // If not loggedin then redirect
    function checkLoginElseRedirect($redirect = '/git2log/session/') {
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
    // $username and $password will be filtered
    function loginAccount($username, $password, $redirect = '/git2log/') {
        if (isset($username) && isset($password)) {
            // Query account that use this name and password, or fail
            try {
                $account = Account::where([
                        ['username', '=', $username]
                    ])->firstOrFail();

                // Check account password
                $valid = password_verify($password, $account->password);
                if (!$valid) {
                    return false;
                }

                // If nothing was thrown then assume we've logged in
                $_SESSION['account'] = $account;
                $loginSuccess = true;
                header('Location: '.$redirect);
                exit();

                // Catch error
            }catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return false;
            }
        }
        return false;
    }

    function logoutAccount() {
        session_destroy();
        return true;
    }


    // Set some public variables
    if (isLoggedIn()){
        $Account = $_SESSION['account'];
    }
