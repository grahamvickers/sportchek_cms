<?php
define('ABSPATH', __DIR__);
define('ADMIN_PATH', ABSPATH.'/admin');
define('ADMIN_SCIPT_PATH', ADMIN_PATH.'/scripts');

ini_set('display_errors', 1);
session_start();
require_once ABSPATH.'/config/database.php';

require_once ADMIN_SCRIPT_PATH.'/read.php';
require_once ADMIN_SCRIPT_PATH.'/login.php';
require_once ADMIN_SCRIPT_PATH.'/functions.php';
require_once ADMIN_SCIPT_PATH.'/user.php';
require_once ADMIN_SCIPT_PATH.'/movie.php';

require_once 'phpmailer/SMTP.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/Exception.php';


