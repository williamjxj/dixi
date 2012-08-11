<?php
class DixiClass extends BaseClass {
	var $sid, $url, $self, $ignore_ary, $default_mid;
	public function __construct($site_id) {
		parent::__construct();
		$this -> sid = $site_id;
		$this -> url = $_SERVER['PHP_SELF'];
		$this -> self = basename($this -> url, '.php');
		$this -> ignore_ary = array(BANNER, INTRO, LOGO);
		//banner, introduction are ignored.
		$this -> default_mid = $this -> get_default_mid();
	}

	/**
	 * in table, weight=255 means it is the default 'Home Page', or 'Default Module' when launch. site['id']=1
	 */
	function get_default_mid() {
		$sql = "SELECT m.mid FROM modules m 
 INNER JOIN pages_modules pm ON (pm.mid=m.mid) 
 INNER JOIN pages p ON(p.pid=pm.pid) 
 WHERE p.weight=255 AND m.weight=255 AND m.site_id=" . $this -> sid;
		$res = $this -> mdb2 -> queryOne($sql);
		if (PEAR::isError($res)) {
			die($res -> getMessage() . ' - line ' . __LINE__ . ': ' . $sql);
		}
		return $res;
	}

	function get_modules_list_header() {
		$ary = array();
		$sql = "SELECT m.mid, m.name, m.url, m.url_flag, m.weight, m.left1, m.right3, m.submenu
 FROM modules m INNER JOIN pages_modules pm ON (pm.mid=m.mid) 
 INNER JOIN pages p ON(p.pid=pm.pid)
 WHERE p.weight=255 AND m.active='Y' AND m.site_id=" . $this -> sid . " 
 AND (m.weight not between 100 and 199)
 ORDER BY m.weight ";
		$res = $this -> mdb2 -> query($sql);
		if (PEAR::isError($res)) {
			die($res -> getMessage() . ' - line ' . __LINE__ . ': ' . $sql);
		}
		while ($row = $res -> fetchRow(MDB2_FETCHMODE_ASSOC)) {
			if ($row['weight'] == 255)
				array_unshift($ary, $row);
			else
				array_push($ary, $row);
		}
		return $ary;
	}

	function get_modules_list_footer() {
		$ary = array();
		$sql = "SELECT m.mid, m.name, m.url, m.url_flag, m.weight, m.left1, m.right3, m.submenu
 FROM modules m INNER JOIN pages_modules pm ON (pm.mid=m.mid) 
 INNER JOIN pages p ON(p.pid=pm.pid)
 WHERE p.weight=255 AND m.active='Y' AND m.site_id=" . $this -> sid . " 
 AND (m.weight between 100 and 199)
 ORDER BY m.weight ";
		$res = $this -> mdb2 -> query($sql);
		if (PEAR::isError($res)) {
			die($res -> getMessage() . ' - line ' . __LINE__ . ': ' . $sql);
		}
		while ($row = $res -> fetchRow(MDB2_FETCHMODE_ASSOC)) {
			if ($row['weight'] == 255)
				array_unshift($ary, $row);
			else
				array_push($ary, $row);
		}
		return $ary;
	}

	function get_header_submenu($mid) {
		$ary = array();
		if (!isset($mid))
			$mid = $this -> default_mid;
		$sql = "SELECT cid, linkname, author FROM contents WHERE mid=" . $mid . "
   AND site_id=" . $this -> sid . "
   AND weight NOT IN (" . implode(',', $this -> ignore_ary) . ") ORDER BY cid DESC";
		$res = $this -> mdb2 -> query($sql);
		if (PEAR::isError($res)) {
			die($res -> getMessage() . ' - line ' . __LINE__ . ': ' . $sql);
		}
		while ($row = $res -> fetchRow(MDB2_FETCHMODE_ASSOC))
			$ary[$row['cid']] = $row['linkname'];
		return $ary;
	}

	function get_footer_submenu($mid) {
		$ary = array();
		if (!isset($mid))
			$mid = $this -> default_mid;
		$sql = "SELECT cid, linkname, author FROM contents WHERE mid=" . $mid . "
   AND site_id=" . $this -> sid . "
   AND weight NOT IN (" . implode(',', $this -> ignore_ary) . ") ORDER BY cid ";
		$res = $this -> mdb2 -> query($sql);
		if (PEAR::isError($res)) {
			die($res -> getMessage() . ' - line ' . __LINE__ . ': ' . $sql);
		}
		while ($row = $res -> fetchRow(MDB2_FETCHMODE_ASSOC))
			$ary[$row['cid']] = $row['linkname'];
		return $ary;
	}

	function get_header() {
		$all = array();
		$ary = $this -> get_modules_list_header();
		foreach ($ary as $h) {
			$mid = $h['mid'];
			$all[$mid] = $h;
			if ($h['submenu'] == 'Y')
				$all[$mid]['submenu'] = $this -> get_header_submenu($mid);
		}
		return $all;
	}

	function get_footer() {
		$all = array();
		$ary = $this -> get_modules_list_footer();
		foreach ($ary as $h) {
			$mid = $h['mid'];
			$all[$mid] = $h;
			if ($h['submenu'] == 'Y')
				$all[$mid]['submenu'] = $this -> get_footer_submenu($mid);
		}
		return $all;
	}

	// contents.weight=250, 1 site has only 1 logo.
	function get_logo() {
		$sql = "SELECT content FROM `contents` WHERE site_id=" . $this -> sid . " AND active='Y' AND weight=" . LOGO;
		$res = $this -> mdb2 -> queryOne($sql);
		if (PEAR::isError($res)) {
			die($res -> getMessage() . ' - line ' . __LINE__ . ': ' . $sql);
		}
		return $res;
	}

	// contents.weight=253, 1 module can has a banner(s).
	function get_banner($mid = '') {
		$ary = array();
		if (!$mid)
			$mid = $this -> default_mid;
		$sql = "SELECT cid, linkname, author, content FROM `contents` WHERE mid=" . $mid . "
   AND site_id=" . $this -> sid . "
   AND active='Y' AND weight=" . BANNER;

		$res = $this -> mdb2 -> query($sql);
		if (PEAR::isError($res)) {
			die($res -> getMessage() . ' - line ' . __LINE__ . ': ' . $sql);
		}
		while ($row = $res -> fetchRow(MDB2_FETCHMODE_ASSOC)) {
			$t = $row['content'] . "\n";
			array_push($ary, $t);
		}
		return $ary;
	}

	function get_intro($mid = '') {
		$ary = array();
		$sql = "SELECT cid, linkname, author, content FROM `contents` WHERE mid=" . $mid . " AND active='Y' AND weight=" . INTRO;

		$res = $this -> mdb2 -> query($sql);
		if (PEAR::isError($res)) {
			die($res -> getMessage() . ' - line ' . __LINE__ . ': ' . $sql);
		}
		while ($row = $res -> fetchRow(MDB2_FETCHMODE_ASSOC)) {
			array_push($ary, $row['content']);
		}
		return $ary;
	}

	function get_latest_10($mid = '') {
		$ary = array();
		$url = $this -> url . '?js_latest_content=1&cid=';
		$sql = "SELECT cid, linkname, author, updated, mname
   FROM `contents` WHERE site_id=" . $this -> sid . " ORDER BY updated DESC, cid DESC LIMIT 0, 10 ";
		$res = $this -> mdb2 -> query($sql);
		if (PEAR::isError($res)) {
			die($res -> getMessage() . ' - line ' . __LINE__ . ': ' . $sql);
		}
		array_push($ary, "<h3>最近10条信息</h3>");
		array_push($ary, "<ul>");
		while ($row = $res -> fetchRow(MDB2_FETCHMODE_ASSOC)) {
			$t1 = $row['linkname'] . ' - ' . $row['author'] . ' (' . $row['updated'] . ') 〖 ' . $row['mname'] . ' 〗';
			$t = '<li><a rel="group_new" href="' . $url . $row['cid'] . '">' . $t1 . '</a></li>';
			array_push($ary, $t);
		}
		array_push($ary, "</ul>");
		return $ary;
	}

	function get_latest_content($cid) {
		$sql = "SELECT content FROM contents WHERE active='Y' AND cid = " . $cid;
		$res = $this -> mdb2 -> queryOne($sql);
		if (PEAR::isError($res)) {
			die($res -> getMessage() . ' - line ' . __LINE__ . ', ' . $sql);
		}
		return $res;
	}

	function get_content($cid) {
		$pattern = array("/\<p>\&nbsp;\<\/p>/", "/\<p>\s*\<\/p>/", "/<p>\&nbsp;<\/p>/");
		$sql = "SELECT linkname, author, date(updated) as created, content FROM contents WHERE active='Y' AND cid = " . $cid;
		$res = $this -> mdb2 -> query($sql);
		if (PEAR::isError($res)) {
			die($res -> getMessage() . ' - line ' . __LINE__ . ', ' . $sql);
		}
		while ($row = $res -> fetchRow(MDB2_FETCHMODE_ASSOC)) {
			$t1 = preg_replace($pattern, '', $row['content']);
			$t2 = '<h4>' . $row['linkname'] . ' - 〖 ' . $row['author'] . ' 于 ' . $row['created'] . '〗</h4>' . "\n";
			$t2 .= $t1;
		}
		return $t2;
	}

	//$sql = "SELECT cid, linkname, author, content FROM `contents` WHERE mid=".$mid." AND weight IN (". implode(',', $this->ignore_ary) .") ORDER BY cid";
	function get_default_content_by_mid($mid = '') {
		$pattern = array("/\<p>\&nbsp;\<\/p>/", "/\<p>\s*\<\/p>/", "/<p>\&nbsp;<\/p>/");
		$ary = array();
		if (!$mid)
			$mid = $this -> default_mid;

		$sql = "SELECT cid, linkname, author, date(updated) as created, content FROM `contents` WHERE mid=" . $mid . " AND active='Y' AND weight = " . DEFAULT_CONTENT . " ORDER BY updated DESC, cid DESC";
		$res = $this -> mdb2 -> query($sql);
		if (PEAR::isError($res)) {
			die($res -> getMessage() . ' - line ' . __LINE__ . ': ' . $sql);
		}
		while ($row = $res -> fetchRow(MDB2_FETCHMODE_ASSOC)) {
			$t = '<h4>' . $row['linkname'] . ' - 〖 ' . $row['author'] . ' 于 ' . $row['created'] . ' 〗</h4>' . "\n";
			$t .= preg_replace($pattern, '', $row['content']) . "\n";
			array_push($ary, $t);
		}
		if (empty($ary)) {
			$sql = "SELECT cid, linkname, author, date(updated) as created, content FROM `contents` WHERE active='Y' AND mid=" . $mid . " AND weight<200 ORDER BY updated DESC, cid DESC ";
			$row = $this -> mdb2 -> queryRow($sql);
			$t = '<h4>' . $row[1] . ' - 〖 ' . $row[2] . ' 于 ' . $row[3] . ' 〗</h4>' . "\n";
			$t .= preg_replace($pattern, '', $row[4]);
			array_push($ary, $t);
		}
		return $ary;
	}

	function get_left($mid = NULL) {
		$ary = array();
		if (!isset($mid))
			$mid = $this -> default_mid;
		$sql = "SELECT cid, linkname, author, date(updated) as created FROM contents WHERE mid=" . $mid . " AND active='Y' AND weight NOT IN (" . implode(",", $this -> ignore_ary) . ") ORDER BY updated DESC, cid DESC limit 0,20";
		$res = $this -> mdb2 -> query($sql);
		if (PEAR::isError($res)) {
			die($res -> getMessage() . ' - line ' . __LINE__ . ': ' . $sql);
		}
		while ($row = $res -> fetchRow()) {
			array_push($ary, $row);
		}
		return $ary;
	}

	function get_right($mid = NULL) {
		return array();
		$ary = array();
		if (!isset($mid))
			$mid = $this -> default_mid;
		$sql = "SELECT rid, file, author, concat(path,'/',file) as path 
 FROM resources 
 WHERE mid = " . $mid . "
 ORDER BY author, UPDATED DESC";

		$res = $this -> mdb2 -> query($sql);
		if (PEAR::isError($res)) {
			die($res -> getMessage() . ' -line ' . __LINE_ . ': ' . $sql);
		}
		while ($row = $res -> fetchRow()) {
			array_push($ary, $row);
		}
		return $ary;
	}

	function get_display_columns($mid) {
		$sql = "SELECT left1, right3 FROM modules WHERE mid=" . $mid;
		$res = $this -> mdb2 -> queryRow($sql);
		if (PEAR::isError($res)) {
			die($res -> getMessage() . ' - line ' . __LINE__ . ', ' . $sql);
		}
		return $res;
	}

	// module 'pictures' id=13
	function get_pictures_list() {
		$ary = array();
		$sql = "SELECT concat( path, '/', file ) AS photo, author, notes
        FROM resources
        WHERE mid = 13
        AND active = 'Y'
        AND TYPE LIKE 'image%'
        ORDER BY updated DESC
        LIMIT 0 , 30";

		$res = $this -> mdb2 -> query($sql);
		if (PEAR::isError($res)) {
			die($res -> getMessage() . ' - line ' . __LINE__ . ': ' . $sql);
		}
		while ($row = $res -> fetchRow(MDB2_FETCHMODE_ASSOC)) {
			array_push($ary, $row);
		}
		return $ary;
	}

	function update_logout_info() {
		$query = "update login_info set logout='Y', logout_time=NULL, session=NULL where session='" . session_id() . "'";
		$res = $this -> mdb2 -> exec($query);
		if (PEAR::isError($res)) {
			die($res -> getMessage() . ' - line ' . __LINE__ . ': ' . $sql);
		}
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

}
?>