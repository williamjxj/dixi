<?php
defined('SITEROOT') or define('SITEROOT', './');
//used in $_SESSION['key'];
defined('SEARCH') or define('SEARCH', 'search');
defined('ROWS_PER_PAGE') or define('ROWS_PER_PAGE', 25);
require_once(SITEROOT."configs/base.inc.php");
//global $config;
//echo "<pre>"; print_r($config); echo "</pre>";

class GeneralClass extends BaseClass
{
	var $sid, $url, $self;
	public function __construct($site_id) {
		global $config;
		parent::__construct();
		$this -> sid = $site_id;
		$this -> url = $_SERVER['PHP_SELF'];
		$this -> self = basename($this -> url, '.php');
	    $this->template_dir = SITEROOT.'themes/default/templates/';
		$this->dbh = $this->mysql_connect_dixi();
		$this->general = $config['general'];
	}

	// 每次用户点击,breadcrumb 都应该重组.
	function set_1_breadcrumb() {
		unset($_SESSION[PACKAGE]['breadcrumb']);
		$_SESSION[PACKAGE]['breadcrumb'][] = array(
			'link' => 'index.php',
			'name' => '首页'
		);
	}
	/*
	function get_breadcrumb() {
		$this->set_1_breadcrumb();
		echo "<pre>"; print_r($_SESSION[PACKAGE]['breadcrumb']); echo "</pre>";
		return $_SESSION[PACKAGE]['breadcrumb'];
	}
	*/
	public function set_breadcrumb($breadcrumb)
	{
		$this->set_1_breadcrumb();
		if(count($breadcrumb)>1) {
			foreach($breadcrumb as $b)
				$_SESSION[PACKAGE]['breadcrumb'][] = $b;
		}
		else {
			array_push($_SESSION[PACKAGE]['breadcrumb'], array_pop($breadcrumb));
		}
		$this->__p($_SESSION[PACKAGE]['breadcrumb']);
	}

	//////////////// Category ////////////////
	function get_menu_info($cate_id) {
		$query = "select name, description, frequency, tag from categories where cid=" . $cate_id;
		$res = mysql_query($query);
		$row = mysql_fetch_assoc($res);
		mysql_free_result($res);

		$b = array();
		// 逻辑：当面包屑为一时，表示只有一层，数组个数为一；当面包屑>1时，表示有多层，数组个数>1
		// 这里，要用array(array(..))来控制count()=1, 否则count()>1.
		$b[] = array('name'=>$row['name'], 'active'=>1);
		$this->set_breadcrumb($b);

		return $row;
	}
	function get_category_list() 
	{
		list($cate_id, $category) = array(0, '');
		$ary = array();
		$query = "select name, cid, description, frequency, tag from categories order by weight";
		$res = mysql_query($query);

		while($row = mysql_fetch_assoc($res)) {
			if(!$cate_id && !$category) {
				$cate_id = $row['cid'];
				$category = $row['name'];
			}
			array_push($ary, $row);
		}
		mysql_free_result($res);

		$b = array();
		$b[] = array('name'=>$category, 'active'=>1);
		$this->set_breadcrumb($b);

		return $ary;
	}
	
	//////////////// Items ////////////////
	function get_item_list($items_category='食品') 
	{
		list($cate_id, $category, $item) = array(0, '', '');
		$ary = array();
		$query = "select name, iid, description, category, cid from items where category='" . $items_category . "' order by weight;";
		$res = mysql_query($query);

		while($row = mysql_fetch_assoc($res)) {
			if(!$cate_id && !$category && !$item) {
				$cate_id = $row['cid'];
				$category = $row['category'];
				$item = $row['name'];
			}
			array_push($ary, $row);
		}
		mysql_free_result($res);

		$b = array();
		$b[] = array('name'=>$category, 'active'=>1);
		//$b[] = array('name'=>$category, 'link'=>$this->general.'?category_menu='.$cate_id);
		//$b[] = array('name'=>$item, 'active'=>1);
		$this->set_breadcrumb($b);
		return $ary;
	}
		
	//////////////// Contents ////////////////
	
	function get_content($cid) {
		$sql = "select content, linkname, cid, category, cate_id, item, iid from contents where cid=".$cid;
		$res = mysql_query($sql);
		$row = mysql_fetch_assoc($res);
		mysql_free_result($res);

		//添加面包屑功能.
		$b = array();
		$b[] = array('name'=>$row['category'], 'link'=>$this->general.'?category_menu='.$row['cate_id']);
		$b[] = array('name'=>$row['item'], 'link'=>$this->general.'?iid='.$row['iid']);
		$b[] = array('name'=>$row['linkname'], 'active'=>1);
		$this->set_breadcrumb($b);

		return $row;
	}

	// 输出内容，并构建面包屑
	function get_content_1($cid) 
	{
		$sql = "select content, linkname, cid, category, cate_id, item, iid from contents where cid=".$cid;
		$res = mysql_query($sql);
		$row = mysql_fetch_assoc($res);
		mysql_free_result($res);

		//添加面包屑功能.
		$b = array();
		$b[] = array('name'=>$row['category'], 'link'=>$this->general.'?category_menu='.$row['cate_id']);
		$b[] = array('name'=>$row['item'], 'link'=>$this->general.'?iid='.$row['iid']);
		$b[] = array('name'=>$row['linkname'], 'active'=>1);
		$this->set_breadcrumb($b);

		return $row['content'];
	}
	
	function get_contents_list($iid) {
		$ary = array();
		$sql = "select linkname, cid, category, cate_id, item, iid from contents where iid=".$iid . " order by weight;";;
		$res = mysql_query($sql);

		list($cate_id, $category, $item) = array(0, '', '');
		$t = '<ul class="nav nav-pills nav-stacked">';
		// $t .= '<li><a href="'.$config['general'].'?cid='.$row['cid'].'">'.$row['linkname']."</a></li>\n"; 
		while($row = mysql_fetch_assoc($res)) {
			if(!$cate_id && !$category && !$item) {
				$cate_id = $row['cate_id'];
				$category = $row['category'];
				$item = $row['item'];
			}
			$t .= '<li><a href="'.$this->general.'?cid='.$row['cid'].'">'.$row['linkname']."</a></li>\n"; 
		}
		$t .= '</ul>';
		mysql_free_result($res);

		//添加面包屑功能.
		$b = array();
		$b[] = array('name'=>$category, 'link'=>$this->general.'?category_menu='.$cate_id);
		$b[] = array('name'=>$item, 'active'=>1);
		$this->set_breadcrumb($b);
		return $t;
	}

	function set_keywords($key) 
	{
		//将关键词写入keywords表。
		if($key!='') {
			$user = isset($_SESSION[PACKAGE]['username']) ? $_SESSION[PACKAGE]['username'] : '';
			$query = "INSERT INTO keywords (keyword,createdby, created) VALUES ".
				"('".$key."', '".$user."', now()) ON DUPLICATE KEY UPDATE updatedby='".$user."', total=total+1";
			mysql_query($query);
		}
		return true;
	}	
	function get_contents_count($key)
	{
		$sql = "select count(*) from contents where content like '%".$key ."%'";
		$result = mysql_query($sql);
		$num = mysql_fetch_row($result);
		mysql_free_result($result);
		return $num[0];
	}

	function select_contents_by_keyword($key)
	{
		$this->set_keywords($key);
		$_SESSION[PACKAGE][SEARCH]['key'] = $_POST['key']?$_POST['key']:'所有记录';
		
		//添加面包屑功能.
		$b = array();
		$b[] = array('name'=>'搜索 - '.$_SESSION[PACKAGE][SEARCH]['key'], 'active'=>1);
		$this->set_breadcrumb($b);

		//计算对于此关键词，总共多少记录。
	    $total = $this->get_contents_count($key);
		$total_pages = ceil($total/ROWS_PER_PAGE);
		$_SESSION[PACKAGE][SEARCH]['total'] = $total;
		$_SESSION[PACKAGE][SEARCH]['total_pages'] = $total_pages;
		
		//第一页：
		$page = 1;
		$_SESSION[PACKAGE][SEARCH]['page'] = $page;

		//当前从第几条记录开始显示。
		$row_no = 0;

		//生成新的查询语句。
		$sql = "select linkname, cid, date(created) as date from contents where content like '%".$key ."%' order by cid desc";
		$_SESSION[PACKAGE][SEARCH]['sql'] = $sql;
		$sql .= " limit  " . $row_no . "," . ROWS_PER_PAGE;
		
		$ary = array();	
		$res = mysql_query($sql);
		while($row = mysql_fetch_assoc($res)) {
			array_push($ary, $row);
		}
		mysql_free_result($res);
		//返回生成的结果。
		return $ary;
	}

	function select_contents_by_page()
	{		
		//计算共有多少页？
		$total_pages = isset($_SESSION[PACKAGE][SEARCH]['total_pages']) ? $_SESSION[PACKAGE][SEARCH]['total_pages'] : 1;
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		if ($page > $total_pages) $page = $total_pages;
		if ($page < 1) $page = 1;
		$_SESSION[PACKAGE][SEARCH]['page'] = $page;

		//当前从第几条记录开始显示。
		$row_no = ((int)$page-1)*ROWS_PER_PAGE;

		//生成新的查询语句。
		if(preg_match("/limit/i", $_SESSION[PACKAGE][SEARCH]['sql']))
			$_SESSION[PACKAGE][SEARCH]['sql'] = preg_replace("/limit.*$/i", '', $_SESSION[PACKAGE][SEARCH]['sql']);

		$sql = $_SESSION[PACKAGE][SEARCH]['sql'];
		$sql .= " limit  " . $row_no . "," . ROWS_PER_PAGE;
		$_SESSION[PACKAGE][SEARCH]['sql'] = $sql;
		
		$ary = array();	
		$res = mysql_query($sql);
		while($row = mysql_fetch_assoc($res)) {
			array_push($ary, $row);
		}
		mysql_free_result($res);

		//返回生成的结果。
		return $ary;
	}

	function draw()
	{
		$current_page = $_SESSION[PACKAGE][SEARCH]['page'] ? $_SESSION[PACKAGE][SEARCH]['page'] : 1;
		$total_pages = $_SESSION[PACKAGE][SEARCH]['total_pages'] ? $_SESSION[PACKAGE][SEARCH]['total_pages'] : 0;
		
		$plinks = array(); $links = array(); $slinks = array(); $queryURL = '';

		if (count($_GET)) {
			foreach ($_GET as $key => $value) {
				if ($key != 'page') $queryURL .= '&'.$key.'='.$value;
			}
		}		
		if (($total_pages) > 1) {
			if ($current_page != 1) {
				$plinks[] = ' <a href="'.$this->url.'?page=1'.$queryURL.'">&laquo;&laquo; 首页 </a> ';
				$plinks[] = ' <a href="'.$this->url.'?page='.($current_page - 1).$queryURL.'">&laquo; 前页</a> ';
			}

			for ($j = ($current_page-5); $j < ($current_page+5); $j++) {
			  if($j<1) continue;
			  if($j>$total_pages) break;
			  if ($current_page == $j) {
				$links[] = ' <a class="selected">'.$j.'</a> ';
			  } else {
				$links[] = ' <a href="'.$this->url.'?page='.$j.$queryURL.'">'.$j.'</a> ';
			  }
			}

			if ($current_page < $total_pages) {
				$slinks[] = ' <a href="'.$this->url.'?page='.($current_page + 1).$queryURL.'"> 下页 &raquo; </a> ';
				$slinks[] = ' <a href="'.$this->url.'?page='.($total_pages).$queryURL.'"> 最后 &raquo;&raquo; </a> ';
			}
	        return implode(' ', $plinks).implode(' ', $links).implode(' ', $slinks);
		}
	}

}
?>