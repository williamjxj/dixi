<?php
defined('SITEROOT') or define('SITEROOT', './');
require_once(SITEROOT."configs/base.inc.php");

class GeneralClass extends BaseClass
{
	var $sid, $url, $self;
	public function __construct($site_id) {
		parent::__construct();
		$this -> sid = $site_id;
		$this -> url = $_SERVER['PHP_SELF'];
		$this -> self = basename($this -> url, '.php');
	    $this->template_dir = SITEROOT.'themes/default/templates/';
		$this->dbh = $this->mysql_connect_dixi();
	}

	function get_menu_info($cid) {
		$ary = array();
		$query = "select name, description, frequency, tag from categories where cid=" . $cid;
		$res = mysql_query($query);
		$row = mysql_fetch_assoc($res);
		return $row;
	}

	function get_content($cid) {
		$ary = array();
		$sql = "select content, linkname, notes from contents where cid=".$cid;
		$res = mysql_query($sql);
		$row = mysql_fetch_assoc($res);
		return $row;
	}
}
?>