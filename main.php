<?php
//header('Content-Type: text/javascript; charset=UTF-8');
define('PER_TOTAL', 5);

function get_ary_thumbnails() {
	$thumbnails = array(
		array(
			'img' => 'http://placehold.it/180x100',
			'alt' => 'http://twitter.github.com/bootstrap/components.html#thumbnails',
			'h5' => '1. 中国移民主流不是富豪',
			'p' => '根据《经济学人》和胡润研究院近日发布的报告称，中国大陆目前家产丰厚的富人大都准备和打算移民海外，中国大陆似乎已经留不住他们。',
			'a' => 'http://placehold.it/180x100',
		),
		array(
			'img' => 'http://placehold.it/180x100',
			'alt' => 'http://twitter.github.com/bootstrap/components.html#thumbnails',
			'h5' => '2. 中产移民主要是为求安稳',
			'p' => '根据《经济学人》和胡润研究院近日发布的报告称，中国大陆目前家产丰厚的富人大都准备和打算移民海外，中国大陆似乎已经留不住他们。',
			'a' => 'http://placehold.it/180x100',
		),
		array(
			'img' => 'http://placehold.it/180x100',
			'alt' => 'http://twitter.github.com/bootstrap/components.html#thumbnails',
			'h5' => '3. 中国移民主流不是富豪 中产移民主要是为求安稳',
			'p' => '根据《经济学人》和胡润研究院近日发布的报告称，中国大陆目前家产丰厚的富人大都准备和打算移民海外，中国大陆似乎已经留不住他们。',
			'a' => 'http://placehold.it/180x100',
		),
		array(
			'img' => 'http://placehold.it/180x100',
			'alt' => 'http://twitter.github.com/bootstrap/components.html#thumbnails',
			'h5' => '4. 中产移民主要是为求安稳',
			'p' => '根据《经济学人》和胡润研究院近日发布的报告称，中国大陆目前家产丰厚的富人大都准备和打算移民海外，中国大陆似乎已经留不住他们。',
			'a' => 'http://placehold.it/180x100',
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

function get_img_thumbnails() {
	$test = array(
		'<img src="http://static.flickr.com/66/199481236_dc98b5abb3_s.jpg" width="75" height="75" alt="" />',
		'<img src="http://static.flickr.com/75/199481072_b4a0d09597_s.jpg" width="75" height="75" alt="" />',
		'<img src="http://static.flickr.com/57/199481087_33ae73a8de_s.jpg" width="75" height="75" alt="" />',
		'<img src="http://static.flickr.com/77/199481108_4359e6b971_s.jpg" width="75" height="75" alt="" />',
		'<img src="http://static.flickr.com/58/199481143_3c148d9dd3_s.jpg" width="75" height="75" alt="" />',
		'<img src="http://static.flickr.com/72/199481203_ad4cdcf109_s.jpg" width="75" height="75" alt="" />',
		'<img src="http://static.flickr.com/58/199481218_264ce20da0_s.jpg" width="75" height="75" alt="" />',
		'<img src="http://static.flickr.com/69/199481255_fdfe885f87_s.jpg" width="75" height="75" alt="" />',
		'<img src="http://static.flickr.com/60/199480111_87d4cb3e38_s.jpg" width="75" height="75" alt="" />',
		'<img src="http://static.flickr.com/70/229228324_08223b70fa_s.jpg" width="75" height="75" alt="" />',
		'<img src="http://static.flickr.com/66/199481236_dc98b5abb3_s.jpg" width="75" height="75" alt="" />',
		'<img src="http://static.flickr.com/75/199481072_b4a0d09597_s.jpg" width="75" height="75" alt="" />',
		'<img src="http://static.flickr.com/57/199481087_33ae73a8de_s.jpg" width="75" height="75" alt="" />',
		'<img src="http://static.flickr.com/77/199481108_4359e6b971_s.jpg" width="75" height="75" alt="" />',
		'<img src="http://static.flickr.com/58/199481143_3c148d9dd3_s.jpg" width="75" height="75" alt="" />',
		'<img src="http://static.flickr.com/72/199481203_ad4cdcf109_s.jpg" width="75" height="75" alt="" />',
		'<img src="http://static.flickr.com/58/199481218_264ce20da0_s.jpg" width="75" height="75" alt="" />',
		'<img src="http://static.flickr.com/69/199481255_fdfe885f87_s.jpg" width="75" height="75" alt="" />',
		'<img src="http://static.flickr.com/60/199480111_87d4cb3e38_s.jpg" width="75" height="75" alt="" />',
	);
	
	$count = 1;
	$nails_rest = array();
	$c = '';
	$n = '<ul class="thumbnails">';

	$loop = 1;
	foreach($test as $t) {
		$c  = '<li class="span3"><div class="thumbnail">'."\n";
		$c .= '<a href="#">';
		$c .= $t;
		$c .= '</a>';
		$c .= '<div class="caption"><h5><a href="#">循环显示'.$count++.'</a></h5>';
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
?>
