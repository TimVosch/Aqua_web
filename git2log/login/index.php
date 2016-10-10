<?php
    error_reporting(-1);
    include $_SERVER['DOCUMENT_ROOT'].'/git2log'.'/login/session.php';
    include $_SERVER['DOCUMENT_ROOT'].'/git2log'.'/database/models/account.php';
    
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
    <!-- Load bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Load Jquery slim -->
    <script src="http://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc=" crossorigin="anonymous"></script>
    <!-- Load bootstrap js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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