<?php
if(isset($_GET['q']) && !empty($_GET['q'])) {
	defined('SITEROOT') or define('SITEROOT', '../');
	header('Content-Type: text/html; charset=utf-8'); 
	// Twitter Bootstrap - Typeahead Plugin with MySQL.
	// William Jiang on Aug 09, 2012.

	require_once(SITEROOT.'/configs/mini-app.inc.php');
	$mdb2 = pear_connect_dixi();
	
	$ary = array();
	$q = $_GET['q'];
	$query = "select keyword from keywords where keyword like '%" . $q . "%' order by kid";

	$res = $mdb2->query($query);	
	if (PEAR::isError($res)) die($res->getMessage());
	while($row = $res->fetchRow()) {
		//echo $row[0];
		$ary[] = iconv('UTF-8', 'UTF-8//TRANSLIT', $row[0]);
	}
	//echo "<pre>"; print_r($ary); echo "</pre>";
	echo json_encode($ary);
}
/*else {
	echo "输入的字符没有被识别。";
}*/
exit;

//////////////////////////////////

function get_items($q) {
	$query = "select keyword from keywords where LOWER(keyword) like '%" . $q . "%'";
	$res = $mdb2->queryAll($query, '', MDB2_FETCHMODE_ASSOC);  //while($row=$res->fetchRow()) $ary[$row[0]]=$row[1];
	if (PEAR::isError($res)) die($res->getMessage());
	echo json_encode($res);
}
?>