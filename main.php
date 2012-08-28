<?php
//header('Content-Type: text/javascript; charset=UTF-8');
//require_once(SITEROOT.'configs/common.inc.php');

define('PER_TOTAL', 5);
require_once(SITEROOT.'configs/mini-app.inc.php');
mysql_connect_dixi();

function get_tabs() {
	$ary = array();
    $query = "select name, curl, frequency from categories order by frequency, weight";
    $res = mysql_query($query);
    while($row = mysql_fetch_assoc($res)) {
		if(!isset($ary[$row['frequency']]) || !is_array($ary[$row['frequency']])) {
			$ary[$row['frequency']] = array();
		}
		array_push ($ary[$row['frequency']], $row);
	}
	return $ary;
}

function get_menu() {
	$ary = array();
    $query = "select cid, curl, name from categories where active='Y' order by weight";
    $res = mysql_query($query);
    while($row = mysql_fetch_assoc($res)) {
		array_push ($ary, $row);
	}
	return $ary;
}

function get_carousel1() 
{
	$total=0; $ary1=array(); $ary2=array(); $html='';
	
	//$query = "select concat(path,file) as carousel1_file from resources where file like '%300x180%'";
    $query = "select concat(path,file) as carousel1_file from resources where file like '%300x294%' order by rand()";
    $res = mysql_query($query);
	$total = mysql_num_rows($res);
    while($row = mysql_fetch_assoc($res)) {
		$t = '<img src="'. $row['carousel1_file'] . '" />';
		array_push ($ary1, $t);
	}

	$sql = "select linkname, cid from contents where linkname != '负面新闻' and mname='食品' order by rand() limit 0,13";
	$res = mysql_query($sql);
	while ($row = mysql_fetch_assoc($res)) {
		array_push($ary2, $row);
	}

	for($i=0; $i<$total; $i++) {
		$html .= 
		'<div class="item">' . '<a href="./general.php?cid=' . $ary2[$i]['cid'] . '">' . $ary1[$i] . '</a>' .
		'  <div class="carousel-caption">' . 
		'    <h4>' . $ary2[$i]['linkname'] . '</h4>' .
		'   </div>' .
		"</div>\n";
	}
	return $html;
}

function get_carousel2() {
	//1. 图片
	$ary = array();
    $query = "select concat(path,file) as carousel2_file from resources where file like '%220x130%' order by rand()";
    $res = mysql_query($query);
    while($row = mysql_fetch_assoc($res)) {
		$t = '<img src="'. $row['carousel2_file'] . '" />';
		array_push ($ary, $t);
	}
	
	//2. 内容
	$ary2 = array();
	$sql = "select linkname, cid from contents where linkname != '负面新闻' and mname='食品' order by rand() limit 0,13";
	$res = mysql_query($sql);
	while ($row = mysql_fetch_assoc($res)) {
		$t = array('h5'=>$row['linkname'], 'a'=>'./general.php?cid='.$row['cid']);
		array_push($ary2, $t);
	}
	
	//3. 关联上面两部分：
	$count = 1;
	$nails_rest = array();
	$c = '';
	$loop = 1; $x = 0;
	$n = '<ul class="thumbnails">';

	foreach($ary as $t) {
		$c  = '<li class="span3"><div class="thumbnail">'."\n";
		$c .= '<a href="#">';
		$c .= $t;
		$c .= '</a>';
		$c .= '<div class="caption"><h5><a href="'.$ary2[$x]['a'].'">'.$ary2[$x]['h5'].'</a></h5>';
		$c .= '<p>'.$ary2[$x++]['h5'].'</p>';
		$c .= "</div></div></li>\n";
		$n .= $c;
		$c = '';
		$count++;
		if ($count == PER_TOTAL) {
			$n .= "</ul>\n";
			$nails_rest[] = $n;
			$n = '<ul class="thumbnails">';
			$count = 1;
			$loop ++;
		}
	}
	if($count != PER_TOTAL) {
		$n .= "</ul>\n";
		$nails_rest[] = $n;
	}
	return $nails_rest;
}

// Not use anymore.
function get_ary_thumbnails() 
{
	$ary = array();
    $query = "select concat(path,file) as carousel2_file from resources where file like '%220x130%' limit 0,4";
    $res = mysql_query($query);
    while($row = mysql_fetch_assoc($res)) {
		array_push ($ary, $row['carousel2_file']);
	}

	$thumbnails = array(
		array(
			'img' => $ary[0],
			'alt' => 'http://www.chinafnews.com/2012/0717/9968.shtml',
			'h5' => '三元酸奶保质期内变质导致腹泻 冷链管理遭质疑',
			'p' => '消费者投诉称，其购买的三元酸奶食用后，出现了严重的腹泻症状，为此对三元酸奶质量产生了质疑。',
			'a' => 'http://www.chinafnews.com/2012/0717/9968.shtml',
		),
		array(
			'img' => $ary[1],
			'alt' => 'http://www.chinafnews.com/2012/0705/9916.shtml',
			'h5' => '娃哈哈八宝粥里现茶叶遭投诉',
			'p' => '消费者投诉称，浙江娃哈哈八宝粥内有一片泡开了的茶叶。',
			'a' => 'http://www.chinafnews.com/2012/0705/9916.shtml',
		),
		array(
			'img' => $ary[2],
			'alt' => 'http://www.chinafnews.com/2012/0807/10026.shtml',
			'h5' => '汇源被指“商标欺诈” 或成第二个“王老吉”',
			'p' => '汇源果汁如今也打起了商标官司，被指“涉嫌商标授权欺诈”。',
			'a' => 'http://www.chinafnews.com/2012/0807/10026.shtml',
		),
		array(
			'img' => $ary[3],
			'alt' => 'http://www.chinafnews.com/2012/0702/9896.shtml',
			'h5' => '硒牛乳业无资质产奶销售两年 5孩子喝后呕吐',
			'p' => '出厂不到半个月的核桃奶居然有股腥臭味，孩子喝后感觉恶心呕吐被送医就诊。',
			'a' => 'http://www.chinafnews.com/2012/0702/9896.shtml',
		),
	);
	
	$nails_first = '<ul class="thumbnails">';
	$c = '';
	foreach($thumbnails as $t) {
		$c  = '<li class="span3">';
		$c .= '<div class="thumbnail">'."\n";
		$c .= '<a href="'.$t['a'].'"><img src="' . $t['img'] . '" alt="' . $t['alt'] . '"></a>';
		$c .= '<div class="caption"><h5><a href="'.$t['a'].'">' . $t['h5'] . '</a></h5>';
		$c .= '<p>' . $t['p'] . '</p>';
		$c .= "</div></div></li>\n";
		$nails_first .= $c;
		$c = '';
	}
	$nails_first .= "</ul>\n";
	return $nails_first;
}

?>
