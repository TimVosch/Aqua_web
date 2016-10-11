<?php
    include $_SERVER['DOCUMENT_ROOT'].'/git2log/session/session.php';

    // Redirect if loggedin
    \aquaweb\session\checkLoginThenRedirect();

    // Check if trying to login
    if (isset($_POST['firstname'], $_POST['username'], $_POST['userpassword'], $_POST['user_registration_code'])) {
        $registrationSuccess = \aquaweb\session\createAccount($_POST['firstname'], $_POST['username'], $_POST['userpassword'], $_POST['user_registration_code']);
        if ($registrationSuccess->success) {
            header('Location: /git2log/session/login?message='.$registrationSuccess->message);
            exit;
        }
    }
    
?>
<html>
<head>
    <title>Aqua - Registration</title>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/git2log/dependencies.php'; ?>
</head>
<body>
    
    <div class="container">
        <div class="row" style="padding-top: 100px;">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <strong>Git2Log</strong> - Registration
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="#" class="form-horizontal">
                            <div class="form-group">
                                <label for="username" class="col-sm-4 control-label">First name: </label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="firstname"/></div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-sm-4 control-label">Username: </label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="username" placeholder="Min 6 characters"/></div>
                            </div>
                            <div class="form-group">
                                <label for="userpassword" class="col-sm-4 control-label">Password: </label>
                                <div class="col-sm-8"><input type="password" class="form-control" name="userpassword" placeholder="Min 6 characters"/></div>
                            </div>
                            <div class="form-group">
                                <label for="userpassword" class="col-sm-4 control-label">Code: </label>
                                <div class="col-sm-8"><input type="text" maxlength="5" class="form-control" name="user_registration_code" placeholder="A1B2C"/></div>
                            </div>
                            <div class="form-group">
                                    <div class="col-sm-7">
                                        <a href="/git2log/session/login" class="btn"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Login</a>
                                    </div>
                                <div class="col-sm-4 col-sm-offset-1">
                                    <input type="submit" class="btn btn-primary btn-line pull-right" value="Register"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="text-center">
                                        <?php if (isset($registrationSuccess) && !$registrationSuccess->success): ?>
                                            <span class="text-<?php echo $registrationSuccess->success? 'success':'danger'; ?>"><?php echo $registrationSuccess->message; ?></span>
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