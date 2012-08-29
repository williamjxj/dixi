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
echo "<pre>"; print_r($_REQUEST);print_r($_POST);print_r($_GET);print_r($_COOKIE); echo "</pre>";
*/

try {
  $obj = new GeneralClass($config['site_id']);
} catch (Exception $e) {
  echo $e->getMessage(), "line __LINE__.\n";
}


$tdir = SITEROOT.'templates/general/';
$tshared = SITEROOT.'templates/shared/';

$config['browser'] = $obj->browser_id();
$obj->assign('config', $config);
$obj->assign('common', $common);
$obj->assign('help_template', $tshared.'help.tpl.html');

//每次，在url下添加?d， 比如：localhost/dixi?d, localhost/dixi/?d=1,则打印出中间测试数据。
if(isset($_REQUEST['d']) && $_REQUEST['d'])
	$config['debug'] = true;
else 
	$config['debug'] = false;

if(!empty($_GET)) {
	if(isset($_GET['js_get_content'])) {
		echo $obj->get_content_1($_GET['cid']);
		exit;
	}
	if(isset($_GET['js_get_breadcrumb'])) {
		if(isset($_GET['sitemap'])) {
			$name = $obj->get_sitemap($_GET['sitemap']);
			$obj->set_breadcrumb(array(array('name'=>$name, 'active'=>1)));
		}
		//$obj->assign('breadcrumb', $obj->get_breadcrumb());
		$obj->assign('breadcrumb', $_SESSION[PACKAGE]['breadcrumb']);
		$obj->display($tdir.'contents.tpl.html');
		exit;
	}
	elseif(isset($_GET['js_get_contents_list'])) {
		echo $obj->get_contents_list($_GET['iid']);
		exit;
	}	
	elseif(isset($_GET['sitemap']) || (isset($_GET['js_sitemap'])) ) {
		$info = array();
		$info['title'] = $obj->get_sitemap($_GET['sitemap']);
		$info['content'] = "目前该分类还处在开发阶段，很快就会有内容呈现。谢谢关注。<br>\n";
		if(isset($_GET['js_sitemap'])) {
			$obj->assign('info', $info);
			$obj->display($tdir.'general.tpl.html');
			exit;
		}
		else {
			$name = $obj->get_sitemap($_GET['sitemap']);
			$obj->set_breadcrumb(array(array('name'=>$name, 'active'=>1)));
			$obj->assign('info', $info);
		}
	}	
	elseif(isset($_GET['iid'])) {
		$info = $obj->get_contents_list($_GET['iid']);
		$obj->assign('info', $info);
		$obj->assign('content_template', $tdir.'contents.tpl.html');
	}	
	elseif(isset($_GET['category_menu'])) {
		if($_GET['category_menu'] == 3) {
			$info = $obj->get_item_list();
			$obj->assign('info', $info);
			$obj->assign('item_template', $tdir.'item.tpl.html');
		}
		else {
			$info = array();
			$menu = $obj->get_menu_info($_GET['category_menu']);
			$info['title'] = $menu['name'];
			$t = '分类为：'. $menu['name']."<br>\n";
			$t .= '详细信息为：'. $menu['description']."<br>\n";
			$t .= '标签为：' . $menu['tag']?$menu['tag']:$menu['name']."<br>\n";
			$t .= "目前该分类还处在开发阶段，很快就会有内容呈现。谢谢关注。<br>\n";
			$info['content'] = $t;
			$obj->assign('info', $info);
		}
	}
	elseif(isset($_GET['cate_id'])) {
		$info = $obj->get_category_list();
		$obj->assign('info', $info);
		$obj->assign('category_template', $tdir.'category.tpl.html');
	}
	elseif(isset($_GET['cid'])) {
		$info = array();
		$row = $obj->get_content($_GET['cid']);
		$info['title'] = $row['linkname'];
		$info['content'] = '<div class="display_content">'.$row['content'].'</div>';
		
		$prev = $obj->get_content_previous($_GET['cid']);
		$info['previous'] = array(
			'cid' => $prev['cid'],
			'linkname' => $prev['linkname'],
		);
		$next = $obj->get_content_next($_GET['cid']);
		$info['next'] = array(
			'cid' => $next['cid'],
			'linkname' => $next['linkname'],
		);
		$ary = $obj->get_rand_keywords();
		$info['keywords'] = array_slice($ary, rand(0,3));
		$obj->assign('info', $info);
	}
	elseif(isset($_GET['test'])) {
		header('Content-Type: text/html; charset=utf-8'); 
		echo "<pre>"; print_r($obj->get_item_list()); echo "</pre>";
		/*
		echo "<pre>"; print_r($obj->select_contents_by_keyword($_GET['test'])); echo "</pre>";
		echo "<pre>"; print_r($_SESSION); echo "</pre>";
		*/
		exit;
	}
	elseif(isset($_GET['page'])) {
		$obj->assign('results', $obj->select_contents_by_page());
		$pagination = $obj->draw();	
		$obj->assign("pagination", $pagination);
		// 以下是:去掉search.tpl.html ajax 部分,程序仍然能工作.
		if(isset($_GET['js_page'])) {
			$obj->display($tdir.'search.tpl.html');
			exit;
		}
		else {
			$obj->assign('search_template', $tdir.'search.tpl.html');
		}
	}
	else {
		header('Content-Type: text/html; charset=utf-8'); 
		echo '啊，出错啦，不可能到这里。';
		echo "<br>\n" . '<a class="btn btn-primary" href="index.php">回到首页</a>';
		exit;
	}
}
//[key] => 负面新闻
elseif(isset($_POST['key'])) {
	if (isset($_SESSION[PACKAGE][SEARCH])) unset($_SESSION[PACKAGE][SEARCH]);
	$key = $_POST['key'];
	$obj->assign('results', $obj->select_contents_by_keyword($key));
	$obj->assign('search_template', $tdir.'search.tpl.html');

	$pagination = $obj->draw();	
	$obj->assign("pagination", $pagination);
}
elseif(isset($_POST['fayan'])) {
	echo "<pre>"; print_r($_POST); echo "</pre>";
	exit;
}
else {
	header('Location: login.php');
	exit;
}

$obj->assign('general_template', $tdir.'general.tpl.html');

$obj->assign('header_template', $tdir.'header.tpl.html');
$obj->assign('sitemap', $obj->get_sitemap());
$obj->assign('footer_template', $tdir.'footer.tpl.html');

$obj->display($tdir.'layout.tpl.html');
?>