<?php
defined('PACKAGE') or define('PACKAGE', 'dixi');
defined('SITEROOT') or define('SITEROOT', '/');
defined('DEBUG') or define('DEBUG', true);

// DB
define("DBHOST", "localhost");
define('DBUSER', 'dixitruth');
define("DBPASS", "dixi123456");
define('DBNAME', 'dixi');

require_once(SITEROOT.'../shared/common.inc.php');
global $common;

$config = array(
  'debug' => DEBUG,
  'site' => 'dixi', //default.
  'site_id' => 1,
  'url' => 'http://dixitruth.com/',
  'include' => SITEROOT.'include/',
  'path' => SITEROOT.'themes/default/',
  'templates' => SITEROOT.'themes/default/templates/',
  'smarty' => SITEROOT.'configs/smarty.ini',
  'header' => $common['header'],
);


?>
