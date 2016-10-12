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
                        <span><strong>Git2Log</strong>, welcome <?php echo $Account->first_name; ?>!</span>
                        <span class="pull-right"><a href="/git2log/session/login/?logout" style="color: #fff"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></a></span>
                    </div>
                    <div class="panel-body">
                        
                        <div class="row">
                            <div class="col-sm-12 col-md-7">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><span>Statistics</span><span class="pull-right glyphicon glyphicon-stats"></span></div>
                                    <div class="panel-body"></div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-5">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><span>Options</span><span class="pull-right glyphicon glyphicon-wrench"></span></div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="/git2log/log/create" class="btn btn-default btn-block"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Create</a>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="/git2log/log/get" class="btn btn-default btn-block"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>