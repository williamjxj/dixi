<?php
define('SINA', 'http://rss.sina.com.cn/news/marquee/ddt.xml');
define('MAXLEN', 200);

// header ("content-type: text/xml; charset=utf-8");
if(!headers_sent())
   header('Content-Type: application/json; charset=utf-8', true,200);


$rawFeed = file_get_contents(SINA);

$xml = simplexml_load_string($rawFeed);
//$xml = new SimpleXmlElement($rawFeed);

if(count($xml) == 0) return;

$ary = array();
foreach($xml->channel->item as $item) {
	$sa = array();
	$sa['title'] = (string)parse_cdata(trim($item->title));
	$sa['text'] = parse_desc(parse_cdata(trim($item->description)));
	$sa['link'] = (string)trim($item->link);
	$sa['date'] = get_datetime((string)$item->pubDate);
	
	//array_push($ary, $sa);
	array_push($ary, $sa);
}

//echo "<pre>"; print_r($ary); echo "</pre>";
echo json_encode($ary);
exit;


function parse_cdata($str) {
	if(preg_match("/CDATA/", $str)) {
		$str = preg_replace("/^.*CDATA[/", '', $str);
		$str = preg_replace("/]]$/", '', $str);		
	}
	return $str;
}

function parse_desc($summary) {
	if (!isset($summary) || empty($summary) || preg_match("/^\s+$/", $summary))		return '';

//echo "\n[".$summary."]\n";
	// Create summary as a shortened body and remove images, extraneous line breaks, etc.
//	$summary = eregi_replace("<img[^>]*>", "", $summary);
//	$summary = eregi_replace("^(<br[ ]?/>)*", "", $summary);
//	$summary = eregi_replace("(<br[ ]?/>)*$", "", $summary);
	$summary = preg_replace("/^\s+/", "", $summary);
	$summary = preg_replace("/\s+$/", "", $summary);
	
	$summary = trim($summary);
	// Truncate summary line to 100 characters, NOT WORK!
	//if(strlen($summary) > MAXLEN)
	//	$summary = substr($summary, 0, MAXLEN) . '...';

	return '('.$summary.')';
}

function get_datetime($dt) {
	return date("m/d H:i",  strtotime(trim($dt)));
}
?>