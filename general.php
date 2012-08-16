<?php
session_start();
error_reporting(E_ALL);
define("SITEROOT", "./");

require_once(SITEROOT.'configs/common.inc.php');
global $common;
require_once(SITEROOT."configs/config.inc.php");
global $common;

if(!isset($_GET)) {
	die("°¡,³ö´íÀ²,¿Õµ÷ÓÃ¡£" . __FILE__. __LINE__);
}

require_once(SITEROOT.'generalClass.php');

try {
  $obj = new GeneralClass($config['site_id']);
} catch (Exception $e) {
  echo $e->getMessage(), "line __LINE__.\n";
}

if(isset($_GET['i']) && isset($_GET['n'])) {
}
elseif(isset($_GET['i'])) {
}
elseif(isset($_GET['n'])) {
}
elseif(isset($_GET['sitemap'])) {
}
elseif(isset($_GET['test'])) {
	header('Content-Type: text/html; charset=utf-8'); 
	echo "<pre>"; print_r($_GET); echo "</pre>";
	exit;
}
else {
	echo "<pre>"; print_r($_GET); echo "</pre>";
}

$obj->assign('config', $config);
$obj->assign('common', $common);
$tdir = SITEROOT.'themes/default/general/';

$obj->assign('sitemap', $obj->get_sitemap());

$obj->assign('header_template', $tdir.'header.tpl.html');
$obj->assign('general_template', $tdir.'general.tpl.html');
$obj->assign('footer_template', $tdir.'footer.tpl.html');
$obj->assign('footer_template', $tdir.'footer.tpl.html');

$obj->display($tdir.'layout.tpl.html');

?>
