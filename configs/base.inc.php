<?php
# instead in php.ini, set PEAR PATH here.
global $config;

define('SMARTY_DIR', SITEROOT.'include/Smarty-3.0.4/libs/');
require_once(SMARTY_DIR . 'Smarty.class.php');
require_once('MDB2.php');

defined("DBHOST") or define("DBHOST", "localhost");
defined('DBUSER') or define('DBUSER', 'dixitruth');
defined("DBPASS") or define("DBPASS", "dixi123456");
defined('DBNAME') or define('DBNAME', 'dixi');

class BaseClass extends Smarty
{
  var $url, $self, $mdb2, $template_dir, $compile_dir, $config_dir, $cache_dir, $session;
  
  function __construct() 
  {
    parent::__construct();
    $this->url = $_SERVER["PHP_SELF"];
    $this->self = basename($this->url, '.php'); // will extend in sub-class.
    
    $this->caching = false; //$this->caching = Smarty::CACHING_LIFETIME_CURRENT;
    $this->auto_literal = true;
    $this->template_dir = SITEROOT.'templates/default/';
    $this->compile_dir = SITEROOT.'templates_c/';
    $this->config_dir = SITEROOT.'configs/';
    $this->cache_dir = SITEROOT.'cache/';
  }

  public function pear_connect_admin() 
  {
	$dsn = array (
		'phptype' => 'mysqli',
		'username' => DBUSER,
		'password' => DBPASS,
		'hostspec' => DBHOST,
		'database' => DBNAME
	);
	$options = array(
		'debug'       => 2,
		'persistent'  => true,
		'portability' => MDB2_PORTABILITY_ALL,
	);
	$mdb2 = MDB2::factory($dsn, $options);
	if (PEAR::isError($mdb2)) {
		die($mdb2->getMessage());
	}
	$mdb2->query("SET NAMES 'utf8'");
	return $mdb2;
  }
  
  function mysql_connect_dixi()
  {
	$db = mysql_pconnect(DBHOST, DBUSER, DBPASS) or die(mysql_error());
	mysql_select_db(DBNAME, $db);
	mysql_query("SET NAMES 'utf8'", $db);
	return $db;
  }
  
  function get_session() {
	  return session_id();
  }

  function set_default_config($array) {
	  global $config;
	  foreach($array as $k=>$v) $config[$k] = $v;
  }
  // new for the front-side.
  function set_logfile() {
    $log = SITEROOT.LOG_FILE;
    if (is_file()) {
		$fh = fopen($log, 'a') or die("can't open file: ".__FILE__.__LINE__);
	}
	else {
		$fh = fopen($log, 'w') or die("can't open file: ".__FILE__.__LINE__);    
	}
	fwrite($fh, $str);
	fclose($fh);
  }

  function print_logfile($vars) {
    global $config;
    if (!isset($config['debug']) || (! $config['debug']) ) return;
	if(is_array($vars) || is_object($vars)) { echo "<pre>"; print_r($vars); echo "</pre>"; }
	else echo $vars."<br>\n";
  }

  function get_env() {
    if(isset($_SERVER['SERVER_SOFTWARE'])) {
    if(preg_match('/Win32/i', $_SERVER['SERVER_SOFTWARE'])) return 'Windows';
    return 'Unix';
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

	/////////////////////
	
	function get_sitemap($item='') 
	{
		$ary = array( 
			'dixi' => array('关于底细', 'About Dixi'),
			'us' => array('联系我们','Contact Us'),
			'privacy' => array('隐私保护','Privacy'),
			'ads' => array('广告服务','Advertisement'),
			'business' => array('商务洽谈','Business'),
			'recruit' => array('底细招聘','Recruitment'),
			'welfare' => array('底细公益','Charity'),
			'customer' => array('客服中心','Customer Service Center'),
			'navigator' => array('网站导航','Site Navigation'),
			'law' => array('法律声明','Legal Notices'),
			'report' => array('有害信息举报','Harmful SMS Report'),
		);
		if($item) return $ary[$item];
		else return $ary;
	}

	function __t($k) {
		return array(
			'index' => __FILE__.__LINE__.$this->url.$this->self.'底细真相事实1111',
			'dixi' => __FILE__.__LINE__.$this->url.$this->self.'底细真相事实2222',
			"$k" => __FILE__.__LINE__.$this->url.$this->self.'底细真相事实3333',
		);
	}

	function __p($obj)
	{
		if(isset($config['debug']) && $config['debug']) {
			echo "<pre>"; print_r($obj); echo "</pre>";
		}
	}	  
}
?>
