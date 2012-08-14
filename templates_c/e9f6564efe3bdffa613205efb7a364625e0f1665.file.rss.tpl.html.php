<?php /* Smarty version Smarty-3.0.4, created on 2012-08-13 16:31:47
         compiled from "./themes/default/templates/rss.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:434850298e6304b9d7-25946237%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9f6564efe3bdffa613205efb7a364625e0f1665' => 
    array (
      0 => './themes/default/templates/rss.tpl.html',
      1 => 1344900704,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '434850298e6304b9d7-25946237',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="rss"> 

<span class="span3">
  <h3>中国大陆</h3>

  <div class="btn-group"> <a class="btn btn-primary btn-small" id="cn" href="#"><i class="icon-user icon-white"></i> 新浪</a> <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li><a id="cn_sina" href="新浪"><i class="icon-ban-circle"></i>新浪</a></li>
      <li><a id="cn_qq" href="腾讯"><i class="icon-ban-circle"></i>腾讯</a></li>
      <li><a id="cn_sohu" href="搜狐"><i class="icon-pencil"></i>搜狐</a></li>
      <li><a id="cn_163" href="网易"><i class="icon-trash"></i>网易</a></li>
    </ul>
  </div>



  <div id="rss_cn" class="news-feed newslist"> 中国大陆 </div>
  </span> <span class="span3">
  <h3>香港</h3>
  <div id="rss_hk"  class="news-feed newslist"> 香港 </div>
  </span> <span class="span3">
  <h3>台湾</h3>
  <div id="rss_tw"  class="news-feed newslist"> 台湾 </div>
  </span> <span class="span3">
  <h3>新加坡</h3>
  <div id="rss_sg"  class="news-feed newslist"> 新加坡 </div>
  </span>
  <!--span class="span2">
  <div id="rss_na"  class="news-feed newslist"> 北美 </div>
  </span-->
</div>
<script type="text/javascript">
$(function() {
	$('#rss_cn').rotator();
	$('#rss_hk').rotator();
	$('#rss_tw').rotator();
	$('#rss_sg').rotator();
//	$('#rss_na').rotator();
	$('#cn_sina, #cn_163, #cn_sohu, #cn_qq').click(function(e) {
		e.preventDefault();
		$('#rss_cn').rotator($(this).attr('id'));
		$('#cn').html('<i class="icon-user icon-white"></i>'+$(this).text());
	});
});
</script>
