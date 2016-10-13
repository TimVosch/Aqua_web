<?php
    include $_SERVER['DOCUMENT_ROOT'].'/git2log/session/session.php';
    \aquaweb\session\checkLoginElseRedirect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Aqua - Git2Log</title>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/git2log/dependencies.php'; ?>
</head>
<body>

    <!-- Main body -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-9 col-md-offset-1" style="padding-top: 50px;">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span><strong>Git2Log</strong>, search logs</span>
                        <span class="pull-right"><a href="/git2log" style="color: #fff"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a></span>
                    </div>
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
