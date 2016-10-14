<?php
    include $_SERVER['DOCUMENT_ROOT'].'/git2log/session/session.php';
    \aquaweb\session\checkLoginElseRedirect();

    // predefine variables
    $gname = isset($_GET['gname'])? $_GET['gname']:null;
    $repo_name = isset($_GET['repo_name'])? $_GET['repo_name']:null;
    $week_nr = isset($_GET['weeknr'])? $_GET['weeknr']:null;
    $_repo = [];
    $_repo_active_weeks = 0;
    $_repo_created_sunday = null;
    $_user_repos = [];

    function get_json($url) {
        $request = Requests::get($url, array(), array('auth' => array('timvosch', '------')));
        if ($request->status_code < 400) {
            return JSON_DECODE($request->body);
        } else {
            return null;
        }
    }

    if (isset($gname)) {
        $_user_repos = get_json('https://api.github.com/users/'.urldecode($gname).'/subscriptions');
    }
    if (isset($repo_name)) {
        $_repo = get_json('https://api.github.com/repos/'.urldecode($repo_name));

        // Calculate weeks since creation
        $_repo_created_sunday = strtotime('this week last sunday', new DateTime($_repo->created_at));
        $_repo_active_weeks = floor(($_repo_created_sunday)->diff(new DateTime())->days/7);
    }
    // if (isset($week_nr)) {
    //     $since = $_repo_created_sunday
    // }

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
                        <span><strong>Git2Log</strong>, create new log</span>
                        <span class="pull-right"><a href="/git2log" style="color: #fff"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a></span>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-md-offset-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><span class="glyphicon glyphicon-download"></span> Retrieve</div>
                                    <div class="panel-body">
                                        <form action="#" class="form-horizontal">
                                            <div class="form-group">
                                                <label class="col-sm-12 col-md-4 control-label">Github-name</label>
                                                <div class="col-sm-12 col-md-8">
                                                    <div class="input-group">

                                                        <!-- Text input for github username -->
                                                        <input type="text" class="form-control" name="<?php echo !isset($gname)? 'gname':''; ?>" value="<?php echo $gname; ?>" <?php echo (isset($gname))? 'disabled':''; ?>>

                                                        <!-- Hidden input -->
                                                        <?php if (isset($gname)): ?>
                                                            <input type="hidden" name="gname" value="<?php echo $gname; ?>">
                                                        <?php endif; ?>

                                                        <!-- Submit / Clear button -->
                                                        <span class="input-group-btn">
                                                                <input type="submit" value="find" class="btn btn-success" <?php echo isset($gname)? 'disabled':''; ?>>
                                                        </span>
                                                    </div>
                                                </div>   
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12 col-md-4 control-label">Repository</label>
                                                <div class="col-sm-12 col-md-8">
                                                    <div class="input-group">

                                                        <!-- Select options for user subscribed repo names -->
                                                        <select class="form-control" name="<?php echo !isset($repo_name)? 'repo_name':''; ?>" <?php if (sizeof($_user_repos) == 0 || isset($repo_name)) echo 'disabled'; ?> selected="<?php echo $repo_name; ?>">
                                                            <?php for ($i=0; $i < sizeof($_user_repos); $i++): ?>
                                                            <option value="<?php echo $_user_repos[$i]->full_name; ?>"/><?php echo $_user_repos[$i]->full_name; ?></option>
                                                            <?php endfor; ?>
                                                        </select>
                                                        
                                                        <?php if (isset($repo_name)): ?>
                                                            <!-- Hidden value for repo_name -->
                                                            <input type="hidden" name="repo_name" value="<?php echo $repo_name; ?>">
                                                        <?php endif; ?>

                                                        <!-- Submit or Clear button -->
                                                        <span class="input-group-btn">
                                                            <input type="submit" value="set" class="btn btn-success" <?php if (sizeof($_user_repos) == 0 || isset($repo_name)) echo 'disabled'; ?>>
                                                        </span>
                                                    </div>
                                                </div>   
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12 col-md-4 control-label">Week</label>
                                                <div class="col-sm-12 col-md-8">
                                                    <div class="input-group">
                                                        <!-- Select group for weeknr -->
                                                        <select class="form-control" name="weeknr" <?php if (sizeof($_repo) == 0) echo 'disabled'; ?>>
                                                            <?php for ($i=1; $i < $_repo_active_weeks; $i++): ?>
                                                            <option value="<?php echo $i; ?>"/><?php echo 'Week '.$i; ?></option>
                                                            <?php endfor; ?>
                                                        </select>

                                                        <!-- Submit or Clear button -->
                                                        <span class="input-group-btn">
                                                            <?php if (!isset($week_nr)): ?>
                                                                <input type="submit" value="get" class="btn btn-success" <?php if (isset($week_nr)) echo 'disabled'; ?>>
                                                            <?php endif; ?>
                                                        </span>
                                                    </div>
                                                </div>   
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

    </script>
</body>
</html>
