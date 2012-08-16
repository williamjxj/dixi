<?php
//header('Content-Type: text/javascript; charset=UTF-8');
//require_once(SITEROOT.'configs/common.inc.php');

define('PER_TOTAL', 5);
require_once(SITEROOT.'configs/mini-app.inc.php');
mysql_connect_dixi();

function get_tabs() {
	$ary = array();
    $query = "select name, frequency from categories order by frequency, weight";
    $res = mysql_query($query);
    while($row = mysql_fetch_assoc($res)) {
		if(!isset($ary[$row['frequency']]) || !is_array($ary[$row['frequency']])) {
			$ary[$row['frequency']] = array();
		}
		array_push ($ary[$row['frequency']], $row['name']);
	}
	return $ary;
}

function get_menu() {
	$ary = array();
    $query = "select name from categories order by weight";
    $res = mysql_query($query);
    while($row = mysql_fetch_assoc($res)) {
		array_push ($ary, $row['name']);
	}
	return $ary;
}

function get_carousel1() {
	$ary = array();
    $query = "select concat(path,file) as carousel1_file from resources where file like '%300x180%'";
    $res = mysql_query($query);
    while($row = mysql_fetch_assoc($res)) {
		array_push ($ary, $row['carousel1_file']);
	}
	return $ary;
}

function get_carousel2() {
	$ary = array();
    $query = "select concat(path,file) as carousel2_file from resources where file like '%220x130%'";
    $res = mysql_query($query);
    while($row = mysql_fetch_assoc($res)) {
		$t = '<img src="'. $row['carousel2_file'] . '" />';
		array_push ($ary, $t);
	}
	
	$count = 1;
	$nails_rest = array();
	$c = '';
	$n = '<ul class="thumbnails">';

	$loop = 1;
	foreach($ary as $t) {
		$c  = '<li class="span3"><div class="thumbnail">'."\n";
		$c .= '<a href="#">';
		$c .= $t;
		$c .= '</a>';
		$c .= '<div class="caption"><h5><a href="#">食品卫生主题循环显示'.$count++.'</a></h5>';
		$c .= '<p>--['.$loop.']'.($count*20).'</p>';
		$c .= "</div></div></li>\n";
		$n .= $c;
		$c = '';
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
			'alt' => $ary[0],
			'h5' => '1. 中国移民主流不是富豪',
			'p' => '根据《经济学人》和胡润研究院近日发布的报告称，中国大陆目前家产丰厚的富人大都准备和打算移民海外，中国大陆似乎已经留不住他们。',
			'a' => $ary[0],
		),
		array(
			'img' => $ary[1],
			'alt' => $ary[1],
			'h5' => '2. 中产移民主要是为求安稳',
			'p' => '根据《经济学人》和胡润研究院近日发布的报告称，中国大陆目前家产丰厚的富人大都准备和打算移民海外，中国大陆似乎已经留不住他们。',
			'a' => $ary[1],
		),
		array(
			'img' => $ary[2],
			'alt' => $ary[2],
			'h5' => '3. 中国移民主流不是富豪 中产移民主要是为求安稳',
			'p' => '根据《经济学人》和胡润研究院近日发布的报告称，中国大陆目前家产丰厚的富人大都准备和打算移民海外，中国大陆似乎已经留不住他们。',
			'a' => $ary[2],
		),
		array(
			'img' => $ary[3],
			'alt' => $ary[3],
			'h5' => '4. 中产移民主要是为求安稳',
			'p' => '根据《经济学人》和胡润研究院近日发布的报告称，中国大陆目前家产丰厚的富人大都准备和打算移民海外，中国大陆似乎已经留不住他们。',
			'a' => $ary[3],
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
