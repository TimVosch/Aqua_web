<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/git2log/session/session.php';
    \aquaweb\session\checkLoginElseRedirect();
    \aquaweb\session\checkLoginThenRedirect();