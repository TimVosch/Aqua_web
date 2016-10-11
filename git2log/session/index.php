<?php
    include $_SERVER['DOCUMENT_ROOT'].'/git2log/session/session.php';

    // If logging out
    if (isset($_GET['logout'])) {
        $logoutSuccess = \aquaweb\session\logoutAccount();
    }
    // Redirect if loggedin
    \aquaweb\session\checkLoginThenRedirect();

    // Check if trying to login
    if (isset($_POST['username']) && isset($_POST['userpassword'])) {
        $loginSuccess = \aquaweb\session\loginAccount($_POST['username'], $_POST['userpassword']);
    }
    
?>
<html>
<head>
    <title>Aqua - Login</title>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/git2log/dependencies.php'; ?>
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
                                    <div class="col-sm-7">
                                    &nbsp;
                                        <?php if (isset($loginSuccess) && !$loginSuccess): ?>
                                            <span class="text-danger">Login failed!</span>
                                        <?php endif; ?>
                                        <?php if (isset($logoutSuccess) && $logoutSuccess): ?>
                                            <span class="text-success">Logout success!</span>
                                        <?php endif; ?>
                                    </div>
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