<?php
/*
 * 前端和管理界面共享全局变量.
 * Before 调用, <strong>SITEROOT</strong> must be setup.
 * CMS: SITEROOT=/admin/
 * 前端: SITEROOT=/dixi/
 */
$common = array(
	'header' => array(
		'lang' => 'zh_CN',
		'charset' => 'UTF-8',
		'title' => '负面新闻网.关于中国的负面新闻,比如明星,食品,体育,医疗,教育,人物,机构,娱乐,财经,政府等.底细,真相,还原真相,反映实际情况.',
		'desc' => '负面新闻网.关于中国的负面新闻,比如明星,食品,体育,医疗,教育,人物,机构,娱乐,财经,政府等.底细,真相,还原真相,反映实际情况.',
		'keywords' => '负面新闻,底细,真相,还原真相,反映实际情况',
		'robots' => 'index,',
	),
	'logo' => array(
		'logo_290x96' => SITEROOT.'images/logo_290x96.png',
		'logo_130x60' => SITEROOT.'images/logo_130x60.png',
		'logo_20x12' => SITEROOT.'images/logo_20x12.png',
	),
	'footer' => array(
		'copyright' => '负面新闻网。底细，真相，事实传播媒体。',
		'menu' => '负面新闻网。底细，真相，事实传播媒体。',
	),
	'css' => array(
		'bootstrap' => SITEROOT.'include/bootstrap/css/bootstrap.css',
		'dixi' => SITEROOT.'css/dixi.css',
		'extra' => SITEROOT.'css/extra.css',
		'jquery-ui' => SITEROOT.'include/jqueryui/js/jquery-ui-1.8.22.custom.min.js',
	),
	'js' => array(
		'jquery' => SITEROOT.'js/jquery-1.7.2.min.js',
		'bootstrap' => SITEROOT.'include/bootstrap/js/bootstrap.min.js',
		'bts' => SITEROOT.'include/bootstrap/js/bootstrap_search.js',
		'gb_big5' => SITEROOT.'js/init.js', 
		'ga' => SITEROOT.'js/ga.js',
		'cookie' => SITEROOT.'js/cookie.js',
		'fancybox'  => SITEROOT.'include/jquery.fancybox',
	),
);

function set_lang() {
	if(isset($_COOKIE[PACKAGE]['language'])) {
		$_SESSION[PACKAGE]['language'] = $_COOKIE[PACKAGE]['language'];
	}
	else {
		$_SESSION[PACKAGE]['language'] = '中文';
	}
}
?>
