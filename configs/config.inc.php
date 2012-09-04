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
  'path' => SITEROOT.'templates/',
  'default' => SITEROOT.'templates/default/',
  'detail' => SITEROOT.'templates/general/',
  'shared' => SITEROOT.'templates/shared/',
  'smarty' => SITEROOT.'configs/smarty.ini',
  'header' => array(
	'title' => '负面新闻网.关于中国的负面新闻,比如明星,食品,体育,医疗,教育,人物,机构,娱乐,财经,政府等.底细,真相,还原真相,反映实际情况.',
	'desc' => '负面新闻网.关于中国的负面新闻,比如明星,食品,体育,医疗,教育,人物,机构,娱乐,财经,政府等.底细,真相,还原真相,反映实际情况.',
	'keywords' => '负面新闻,底细,真相,还原真相,反映实际情况',
  ),
  'general' => SITEROOT.'general.php',
);

?>
