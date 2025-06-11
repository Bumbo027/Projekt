<?php
require_once 'inc/config.php';

$auth->logout();
header('Location: login.php');
exit;
