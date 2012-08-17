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
		$query = "select name, description, frequency, tag from categories where cid=" . $cid;
		$res = mysql_query($query);
		$row = mysql_fetch_assoc($res);
		return $row;
	}

	function get_content($cid) {
		$sql = "select content, linkname, notes from contents where cid=".$cid;
		$res = mysql_query($sql);
		$row = mysql_fetch_assoc($res);
		return $row;
	}
	function get_content_1($cid) {
		$sql = "select content from contents where cid=".$cid;
		$res = mysql_query($sql);
		$row = mysql_fetch_assoc($res);
		return $row['content'];
	}
	function select_contents_by_keyword($key) {
		$ary = array();
		$sql = "select linkname, cid from contents where content like '%".$key ."%'";
		//echo $sql;
		$res = mysql_query($sql);
		while($row = mysql_fetch_assoc($res)) {
			array_push($ary, $row);
		}

		if($key!='') {
			//INSERT INTO keywords (keyword,createdby, created) VALUES (aaaa,Adminadmin,now()) ON DUPLICATE KEY UPDATE updatedby=Adminadmin, total=total+1
			$user = isset($_SESSION[PACKAGE]['username']) ? $_SESSION[PACKAGE]['username'] : '';
			$query = "INSERT INTO keywords (keyword,createdby, created) VALUES ".
				"('".$key."', '".$user."', now()) ON DUPLICATE KEY UPDATE updatedby='".$user."', total=total+1";
			mysql_query($query);
		}
		
		return $ary;
	}

}
?>