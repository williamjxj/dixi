<?php
session_start();
error_reporting(E_ALL);

define("SITEROOT", "./");
require_once(SITEROOT."configs/config.inc.php");
require_once(SITEROOT."configs/base.inc.php");
require_once(SITEROOT.'dixi.php');
global $config;

try {
  $obj = new DixiClass($config['site_id']);
} catch (Exception $e) {
  echo $e->getMessage(), "line __LINE__.\n";
}

$config['url'] = $obj->url;
$config['self'] = $obj->self;
$config['path'] = SITEROOT . 'themes/default/';
$config['browser'] = $obj->browser_id();

$obj->assign('config', $config);

$header = array();
$header['logo'] = $obj->get_logo();
$header['menu'] = $obj->get_header();
$obj->assign('header', $header);

$obj->assign('footer', $obj->get_footer());

$main = array();
$main['banner'] = $obj->get_banner();
$main['intro'] = $obj->get_latest_10();
$main['contents'] = $obj->get_default_content_by_mid();
$obj->assign('main', $main);

list($left1, $right3) = $obj->get_display_columns($obj->default_mid);

$left = array();
if (strcmp($left1, 'Y')==0) $left['nav'] = $obj->get_left();
$obj->assign('left', $left);

$right = array();
if ($right3 == 'Y') $right['nav'] = $obj->get_right();
$obj->assign('right', $right);

$obj->assign('header_template', $tdir.'header.tpl.html');
$obj->assign('menu_template', $tdir.'menu.tpl.html');
$obj->assign('left_template', $tdir.'left.tpl.html');
$obj->assign('main_template', $tdir.'main.tpl.html');
$obj->assign('right_template', $tdir.'right.tpl.html');
$obj->assign('footer_template', $tdir.'footer.tpl.html');
$obj->assign('copyright_template', $tdir.'copyright.tpl.html');

$obj->display($tdir.'layout.tpl.html');
?>
