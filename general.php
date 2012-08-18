<?php
session_start();
error_reporting(E_ALL);
define("SITEROOT", "./");

require_once(SITEROOT.'configs/common.inc.php');
global $common;
require_once(SITEROOT."configs/config.inc.php");
global $config;

require_once(SITEROOT.'generalClass.php');

/*
任何情况下,$_GET, $_POST,都有设置,但可能为空.
echo "<pre>"; print_r($_REQUEST); echo "</pre>";
echo "<pre>"; print_r($_POST); echo "</pre>";
echo "<pre>"; print_r($_GET); echo "</pre>";
exit;
*/

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

if(!empty($_GET)) {
	if(isset($_GET['js_get_content'])) {
		echo $obj->get_content_1($_GET['cid']);
		exit;
	}
	elseif(isset($_GET['js_get_contents_list'])) {
		echo $obj->get_contents_list($_GET['iid']);
		exit;
	}	
	elseif(isset($_GET['js_sitemap'])) {
		$info = array();
		$info['title'] = $obj->get_sitemap($_GET['sitemap']);
		$info['content'] = "目前该分类还处在开发阶段，很快就会有内容呈现。谢谢关注。<br>\n";
		$obj->assign('info', $info);
		$obj->display($tdir.'general.tpl.html');
		exit;
	}
	elseif(isset($_GET['js_get_contents_by_item'])) {
		$info = $obj->get_contents_list($_GET['iid']);
		$obj->assign('info', $info);
		$obj->assign('content_template', $tdir.'contents.tpl.html');
	}	
	elseif(isset($_GET['i']) && isset($_GET['n'])) {
		if($_GET['n'] == 'food') {
			$info = $obj->get_items();
			$obj->assign('info', $info);
			$obj->assign('item_template', $tdir.'item.tpl.html');
		}
		else {
			$info = array();
			$menu = $obj->get_menu_info($_GET['i']);
			$info['title'] = $menu['name'];
			$t = '分类为：'. $menu['name']."<br>\n";
			$t .= '详细信息为：'. $menu['description']."<br>\n";
			$t .= '标签为：' . $menu['tag']?$menu['tag']:$menu['name']."<br>\n";
			$t .= "目前该分类还处在开发阶段，很快就会有内容呈现。谢谢关注。<br>\n";
			$info['content'] = $t;
			$obj->assign('info', $info);
		}
	}
	elseif(isset($_GET['cid'])) {
		$info = array();
		//general.php?cid=47
		$row = $obj->get_content($_GET['cid']);
		$info['title'] = $row['linkname'];
		$info['content'] = '<div class="display_content">'.$row['content'].'</div>';
		$obj->assign('info', $info);
	}
	elseif(isset($_GET['sitemap'])) {
		$info = array();
		$info['title'] = $obj->get_sitemap($_GET['sitemap']);
		$info['content'] = "目前该分类还处在开发阶段，很快就会有内容呈现。谢谢关注。<br>\n";
		$obj->assign('info', $info);
	}
	elseif(isset($_GET['test'])) {
		header('Content-Type: text/html; charset=utf-8'); 
		echo "<pre>"; print_r($obj->get_items()); echo "</pre>";
		/*
		echo "<pre>"; print_r($obj->select_contents_by_keyword($_GET['test'])); echo "</pre>";
		echo "<pre>"; print_r($_SESSION); echo "</pre>";
		*/
		exit;
	}
	elseif(isset($_GET['page'])) {
		//echo "<pre>"; print_r($_SESSION); echo "</pre>";
		$obj->assign('results', $obj->select_contents_by_page());
		$obj->assign('search_template', $tdir.'search.tpl.html');
	
		$pagination = $obj->draw();	
		$obj->assign("pagination", $pagination);
	}
	else {
		die('啊，出错啦，不可能到这里。');
	}
}
//[key] => 负面新闻
elseif(isset($_POST['key'])) {
	if (isset($_SESSION[SEARCH])) unset($_SESSION[SEARCH]);
	$key = $_POST['key'];
	$_SESSION[SEARCH]['key'] = $_POST['key']?$_POST['key']:'所有记录';
	$obj->assign('results', $obj->select_contents_by_keyword($key));
	$obj->assign('search_template', $tdir.'search.tpl.html');

	$pagination = $obj->draw();	
	$obj->assign("pagination", $pagination);
}
else {
	header('Location: login.php');
	exit;
}

$obj->assign('help_template', $tshared.'help.tpl.html');
$obj->assign('general_template', $tdir.'general.tpl.html');

$obj->assign('header_template', $tdir.'header.tpl.html');
$obj->assign('sitemap', $obj->get_sitemap());
$obj->assign('footer_template', $tdir.'footer.tpl.html');

$obj->display($tdir.'layout.tpl.html');
?>