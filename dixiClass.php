<?php
defined('SITEROOT') or define('SITEROOT', './');
defined('SMARTY_DIR') or define('SMARTY_DIR', SITEROOT.'include/Smarty-3.0.4/libs/');

require_once(SMARTY_DIR . 'Smarty.class.php');
require_once('MDB2.php');

class DixiClass extends Smarty
{
	var $sid, $url, $self;
	public function __construct($site_id) {
		parent::__construct();
		$this -> sid = $site_id;
		$this -> url = $_SERVER['PHP_SELF'];
		$this -> self = basename($this -> url, '.php');
		$this->caching = false;
		$this->auto_literal = true;
		$this->template_dir = SITEROOT.'themes/default/templates/';
		$this->compile_dir = SITEROOT.'templates_c/';
		$this->config_dir = SITEROOT.'configs/';
		$this->cache_dir = SITEROOT.'cache/';
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
}

?>