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
}
?>