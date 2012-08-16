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
	}

	function __t($k) {
		return array(
			'index' => __FILE__.__LINE__.$this->url.$this->self.'底细真相事实1111',
			'dixi' => __FILE__.__LINE__.$this->url.$this->self.'底细真相事实2222',
			"$k" => __FILE__.__LINE__.$this->url.$this->self.'底细真相事实3333',
		);
	}
	
	function browser_id() {
	  if(strstr($_SERVER['HTTP_USER_AGENT'], 'Firefox')){ $id="firefox"; }
	  elseif(strstr($_SERVER['HTTP_USER_AGENT'], 'Safari') && !strstr($_SERVER['HTTP_USER_AGENT'], 'Chrome')){ $id="safari"; }
	  elseif(strstr($_SERVER['HTTP_USER_AGENT'], 'Chrome')){ $id="chrome"; }
	  elseif(strstr($_SERVER['HTTP_USER_AGENT'], 'Opera')){ $id="opera"; }
	  elseif(strstr($_SERVER['HTTP_USER_AGENT'], 'MSIE 6')){ $id="ie6"; }
	  elseif(strstr($_SERVER['HTTP_USER_AGENT'], 'MSIE 7')){ $id="ie7"; }
	  elseif(strstr($_SERVER['HTTP_USER_AGENT'], 'MSIE 8')){ $id="ie8"; }
	  elseif(strstr($_SERVER['HTTP_USER_AGENT'], 'MSIE 9')){ $id="ie9"; }
	  return $id;
	}
	
	function get_definition() {
		$sql = "select content from contents where linkname = '负面新闻' and mname='食品' ";
		$res = $this->mdb2->queryOne($sql);
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
	//Same:
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

	function get_sitemap() 
	{
		return array( 
			'dixi' => '关于底细',
			'us' => '联系我们',
			'privacy' => '隐私保护',
			'ads' => '广告服务',
			'business' => '商务洽谈',
			'recruit' => '底细招聘',
			'welfare' => '底细公益',
			'customer' => '客服中心',
			'navigator' => '网站导航',
			'law' => '法律声明',
			'report' => '有害短信息举报',
		);
	}
	
}

?>