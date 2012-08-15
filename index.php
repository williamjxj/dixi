<?php
session_start();
error_reporting(E_ALL);
define("SITEROOT", "./");

require_once(SITEROOT.'configs/common.inc.php');
//require_once(SITEROOT.'configs/mini-app.inc.php');
global $common;

require_once(SITEROOT."configs/config.inc.php");
require_once(SITEROOT."main.php");

global $config;

//require_once(SITEROOT."configs/base.inc.php");
require_once(SITEROOT.'dixiClass.php');

try {
  $obj = new DixiClass($config['site_id']);
} catch (Exception $e) {
  echo $e->getMessage(), "line __LINE__.\n";
}

$config['url'] = $obj->url;
$config['self'] = $obj->__t($obj->self);
$config['browser'] = $obj->browser_id();

// login or not?
if(isset($_SESSION['dixi']['username'])) {
	$config['username'] = $_SESSION['dixi']['username'];
}

$obj->assign('common', $common);
$obj->assign('config', $config);

$header = array();
$obj->assign('header', $header);

$left = array();
$obj->assign('left', $left);

$main = array();
$obj->assign('main', $main);

$right = array();
$obj->assign('right', $right);

$footer = array();
$obj->assign('footer', $footer);

$tdir = $config['templates'];
//echo "<pre>"; print_r($common); echo "</pre>";
//echo "<pre>"; print_r($_SESSION); echo "</pre>";
//echo "<pre>"; print_r($config); echo "</pre>";


$obj->assign('nails_first', get_ary_thumbnails());
$obj->assign('nails_rest', get_img_thumbnails());

$obj->assign('config', $config);
$obj->assign('common', $common);
$obj->assign('header_template', $tdir.'header.tpl.html');
$obj->assign('menu_template', $tdir.'menu.tpl.html');
$obj->assign('rss_template', $tdir.'rss.tpl.html');
$obj->assign('left_template', $tdir.'left.tpl.html');
$obj->assign('main_template', $tdir.'main.tpl.html');
$obj->assign('right_template', $tdir.'right.tpl.html');
$obj->assign('footer_template', $tdir.'footer.tpl.html');
$obj->assign('copyright_template', $tdir.'copyright.tpl.html');

$obj->display($tdir.'layout.tpl.html');
?>
