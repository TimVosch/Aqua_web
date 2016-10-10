<?php
    error_reporting(-1);
    include $_SERVER['DOCUMENT_ROOT'].'/login/session.php';
    include $_SERVER['DOCUMENT_ROOT'].'/database/models/account.php';
    
    use aquaweb\database\models\Account;
    use Illuminate\Database\Capsule\Manager as Capsule;
    
    // TODO: Password verification!
    // If username and userpassword are set POST variables, assume we're loggin in
    if (isset($_POST['username']) && isset($_POST['userpassword'])) {
        $accounts = Account::where('username', '=', $_POST['username'])->count();
        if ($accounts == 0) {
            $loginSuccess = false;
        } else {
            $loginSuccess = true;
            $_SESSION['username'] = $_POST['username'];
            header('HTTP/1.1 302 Found');
            header("Location: /");
            exit();
        }
    }
    
    // If destroy is a GET variable, destroy the session
    if (isset($_GET['destroy'])) {
        $logoutSuccess = false;
        session_destroy();
    }
    
?>
<html>
<head>
    <title>Aqua - Login</title>
    <?php include('../dependencies.php'); ?>
</head>
<body>
    
    <div class="container">
        <div class="row" style="padding-top: 100px;">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <strong>Git2Log</strong> - Login
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="./" class="form-horizontal">
                            <div class="form-group">
                                <label for="username" class="col-sm-4 control-label">Username: </label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="username"/></div>
                            </div>
                            <div class="form-group">
                                <label for="userpassword" class="col-sm-4 control-label">Password: </label>
                                <div class="col-sm-8"><input type="password" class="form-control" name="userpassword"/></div>
                            </div>
                            <div class="form-group">
                                <?php if (isset($loginSuccess)): ?>
                                    <div class="col-sm-7">
                                        <span class="text-danger">Login failed!</span>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($logoutSuccess)): ?>
                                    <div class="col-sm-7">
                                        <span class="text-success">Logout success!</span>
                                    </div>
                                <?php endif; ?>
                                <div class="col-sm-4 col-sm-offset-1">
                                    <input type="submit" class="btn btn-primary btn-line pull-right" value="Login"/>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>