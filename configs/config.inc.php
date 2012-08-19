<?php
defined('PACKAGE') or define('PACKAGE', 'dixi');
defined('SITEROOT') or define('SITEROOT', '/');
defined('DEBUG') or define('DEBUG', false);

$config = array(
  'debug' => DEBUG,
  'site' => PACKAGE,
  'site_id' => 1,
  'url' => 'http://dixitruth.com/',
  'img' => SITEROOT.'images/',
  'include' => SITEROOT.'include/',
  'path' => SITEROOT.'themes/default/',
  'templates' => SITEROOT.'themes/default/templates/',
  'smarty' => SITEROOT.'configs/smarty.ini',
  'header' => array(
	'title' => '底细,真相,还原真相,反映实际情况',
	'desc' => '底细,真相,还原真相,反映实际情况',
	'keywords' => '底细,真相,还原真相,反映实际情况',
  ),
  'general' => SITEROOT.'general.php',
);

?>
