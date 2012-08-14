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
		'title' => '底细,真相,还原真相,反映实际情况',
		'desc' => '底细,真相,还原真相,反映实际情况',
		'keywords' => '底细,真相,还原真相,反映实际情况',
		'robots' => '',
		'logo' => 'logo',
	),
	'footer' => array(
		'copyright' => '',
		'menu' => '',
	),
	'css' => array(
		'bootstrap' => SITEROOT.'include/bootstrap/css/bootstrap.css',
		'jquery-ui' => SITEROOT.'include/jqueryui/js/jquery-ui-1.8.22.custom.min.js',
	),
	'js' => array(
		'jquery' => SITEROOT.'js/jquery-1.7.2.min.js',
		'bootstrap' => SITEROOT.'include/bootstrap/js/bootstrap.min.js',
		'gb_big5' => SITEROOT.'js/init.js', 
		'ga' => SITEROOT.'js/ga.js',
		'fancybox'  => SITEROOT.'include/jquery.fancybox',
	),
);


?>
