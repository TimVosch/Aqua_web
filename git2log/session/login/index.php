<?php
    include $_SERVER['DOCUMENT_ROOT'].'/git2log/session/session.php';

    // If logging out
    if (isset($_GET['logout'])) {
        $loginValue = \aquaweb\session\logoutAccount();
    }
    // Redirect if loggedin
    \aquaweb\session\checkLoginThenRedirect();

    // Check if trying to login
    if (isset($_POST['username'], $_POST['userpassword'])) {
        $loginValue = \aquaweb\session\loginAccount($_POST['username'], $_POST['userpassword']);
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
                        <form method="POST" action="#" class="form-horizontal">
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
                                        <a href="/git2log/session/register" class="btn"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Register</a>
                                    </div>
                                <div class="col-sm-4 col-sm-offset-1">
                                    <input type="submit" class="btn btn-primary btn-line pull-right" value="Login"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="text-center">
                                        <?php if (isset($loginValue) ): ?>
                                            <span class="text-<?php echo $loginValue->success? 'success':'danger'; ?>"><?php echo $loginValue->message; ?>!</span>
                                        <?php endif; ?>
                                    </div>
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