<?php
session_start();
error_reporting(E_ALL);
define("SITEROOT", "./");

require_once(SITEROOT.'configs/common.inc.php');
global $common;
require_once(SITEROOT."configs/config.inc.php");
global $config;

if(!isset($_GET)) {
	die("啊,出错啦,空调用。" . __FILE__. __LINE__);
}

require_once(SITEROOT.'generalClass.php');

try {
  $obj = new GeneralClass($config['site_id']);
} catch (Exception $e) {
  echo $e->getMessage(), "line __LINE__.\n";
}

$config['browser'] = $obj->browser_id();
$obj->assign('config', $config);
$obj->assign('common', $common);

$tdir = SITEROOT.'themes/default/general/';
$tshared = SITEROOT.'themes/default/shared/';

/*
 * i=3&n=food，$menu['frequency']
 */
$info = array();
if(isset($_GET['i']) && isset($_GET['n'])) {
	if($_GET['n'] == 'food') {
	}
	else {
		$menu = $obj->get_menu_info($_GET['i']);
		$info['title'] = $menu['name'];
		$t = '分类为：'. $menu['name']."<br>\n";
		$t .= '详细信息为：'. $menu['description']."<br>\n";
		$t .= '标签为：' . $menu['tag']?$menu['tag']:$menu['name']."<br>\n";
		$t .= "目前该分类还处在开发阶段，很快就会有内容呈现。谢谢关注。<br>\n";
		$info['content'] = $t;
	}
}
elseif(isset($_GET['i'])) {
}
elseif(isset($_GET['n'])) {
}
elseif(isset($_GET['cid'])) {
	//general.php?cid=47
	$row = $obj->get_content($_GET['cid']);
	$info['title'] = $row['linkname'];
	$info['content'] = '<div class="display_content">'.$row['content'].'</div>';
}
elseif(isset($_GET['sitemap'])) {
	$info['title'] = $obj->get_sitemap($_GET['sitemap']);
	$info['content'] = "目前该分类还处在开发阶段，很快就会有内容呈现。谢谢关注。<br>\n";
}
elseif(isset($_GET['test'])) {
	header('Content-Type: text/html; charset=utf-8'); 
	echo "<pre>"; print_r($_GET); echo "</pre>";
	exit;
}
else {
	echo "<pre>"; print_r($_GET); echo "</pre>";
}


$obj->assign('info', $info);
$obj->assign('help_template', $tshared.'help.tpl.html');
$obj->assign('header_template', $tdir.'header.tpl.html');
$obj->assign('general_template', $tdir.'general.tpl.html');

$obj->assign('sitemap', $obj->get_sitemap());
$obj->assign('footer_template', $tdir.'footer.tpl.html');

$obj->display($tdir.'layout.tpl.html');

?>
