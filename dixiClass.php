<?php
defined('SITEROOT') or define('SITEROOT', './');
require_once(SITEROOT."configs/base.inc.php");

define('TAB_LIST', 10);

class DixiClass extends BaseClass
{
	var $sid, $url, $self;
	public function __construct($site_id) {
		parent::__construct();
		$this -> sid = $site_id;
		$this -> url = $_SERVER['PHP_SELF'];
		$this -> self = basename($this -> url, '.php');
	    $this->mdb2 = $this->pear_connect_admin();
	}
	
	// keywords 表.
	function get_keywords() {
		$sql = "select keyword from keywords order by updated desc, created desc limit 0,5";
		$res = $this->mdb2->queryAll($sql);
		if (PEAR::isError($res)) {
			die($res->getMessage(). ' - line ' . __LINE__ . ': ' . $sql);
		}
		return $res;
	}
	
	// items 表.
	function get_items($category='食品') {
		$ary = array();
		$query = "select name, iid, description from items where category='" . $category . "' order by weight;";
		$res = $this->mdb2->queryAll($query, '', MDB2_FETCHMODE_ASSOC);
		if (PEAR::isError($res)) {
			die($res->getMessage(). ' - line ' . __LINE__ . ': ' . $sql);
		}
		return $res;
	}
	
	function get_latest() {
		return $this->get_tab_list(true, 0);
	}
	function get_hot() {
		return $this->get_tab_list(true, 10);
	}
	function get_loop1() {
		return $this->get_tab_list(false, 0, 13);
	}
	function get_loop2() {
		return $this->get_tab_list(false, 13, 13);
	}

	// contents 表.
	function get_definition() {
		$sql = "select content from contents where linkname = '负面新闻' and mname='食品' ";
		$res = $this->mdb2->queryOne($sql);
		if (PEAR::isError($res)) {
			die($res->getMessage(). ' - line ' . __LINE__ . ': ' . $sql);
		}
		return $res;
	}
	
	//select cid, linkname from contents where linkname != '负面新闻' and mname='食品' order by cid desc limit 0, 10
	//select cid, linkname from contents where linkname != '负面新闻' and mname='食品' order by cid desc limit 10, 10	
	function get_tab_list($desc=false, $start=0, $limit=TAB_LIST) {
		if($desc) $order = ' order by cid desc ';
		else $order = ' order by cid ';
		$limit = 'limit ' . $start . ', ' . $limit;
		$sql = "select cid, linkname from contents where linkname != '负面新闻' and mname='食品' ". $order . $limit;
		//echo "<br>\n".$sql."<br>\n";
        $res = $this->mdb2->queryAll($sql);
        if (PEAR::isError($res)) die($res->getMessage());
        return $res;
 	}
	//Same and no use
	function get_contents() {
		$ary = array();
		$sql = "select cid, linkname from contents where linkname != '负面新闻' and mname='食品' order by cid desc";
		$res = $this->mdb2->query($sql);
		if (PEAR::isError($res)) {
			die($res->getMessage(). ' - line ' . __LINE__ . ': ' . $sql);
		}
		while ($row = $res->fetchRow(MDB2_FETCHMODE_ASSOC)) {
			array_push($ary, array($row['cid'], $row['linkname']));
		}
		return $ary;
	}

}
?>