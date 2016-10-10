<?php
    include $_SERVER['DOCUMENT_ROOT'].'/git2log'.'/login/session.php';
    \aquaweb\session\verifyLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Aqua - Git2Log</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Load bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Load Jquery slim -->
    <script src="http://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc=" crossorigin="anonymous"></script>
    <!-- Load bootstrap js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

    <!-- Main body -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-9 col-md-offset-1" style="padding-top: 50px;">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span><strong>Git2Log</strong>, welcome <?php echo $_SESSION['username']; ?>!</span>
                        <span class="pull-right"><a href="/login/?destroy" style="color: #fff"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></a></span>
                    </div>
                    <div class="panel-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>