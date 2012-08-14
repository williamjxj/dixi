<?php /* Smarty version Smarty-3.0.4, created on 2012-08-14 12:12:03
         compiled from "./themes/default/templates/header.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:13762502aa3039354b1-62204541%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8da7a7fa48d3f13039e42132b3900dc480a54c9d' => 
    array (
      0 => './themes/default/templates/header.tpl.html',
      1 => 1344971182,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13762502aa3039354b1-62204541',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include './include/Smarty-3.0.4/libs/plugins\modifier.date_format.php';
?><div class="row">
  <div class="span2">
    <div id="logo"> <a href="<?php echo (isset($_smarty_tpl->getVariable('config')->value['url']) ? $_smarty_tpl->getVariable('config')->value['url'] : null);?>
" title="<?php echo (isset($_smarty_tpl->getVariable('common')->value['header']['title']) ? $_smarty_tpl->getVariable('common')->value['header']['title'] : null);?>
"><img src="<?php echo (isset($_smarty_tpl->getVariable('common')->value['logo']['logo_130x60']) ? $_smarty_tpl->getVariable('common')->value['logo']['logo_130x60'] : null);?>
" /> </a> </div>
  </div>
  <div class="span10">
    <div class="btn-toolbar">
    <span>当前时间： <?php echo smarty_modifier_date_format(time(),'%Y-%m-%d %H:%M');?>
， <span id="st" style="cursor: pointer;">切至繁体版</span> </span>
      <div class="btn-group"> <a href="#" class="btn btn-info btn-small"><i class="icon-list-alt icon-white"></i>&nbsp;显示字体</a> <a href="#" data-toggle="dropdown" class="btn  btn-info btn-small dropdown-toggle"><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#" id="switcher-default">缺省</a></li>
          <li><a href="#" id="switcher-large">放大</a></li>
          <li><a href="#" id="switcher-small">缩小</a></li>
          <li class="divider"></li>
          <li><a href="#container" id="prlnk"><i class="icon-print"></i>打印</a></li>
        </ul>
      </div>
      <div class="btn-group"> <a href="#" class="btn btn-info btn-small"><i class="icon-user icon-white"></i>用户</a> <a href="#" data-toggle="dropdown" class="btn btn-info btn-small dropdown-toggle"><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#"><i class="icon-pencil"></i>用户信息</a></li>
          <li><a href="#"><i class="icon-trash"></i>修改</a></li>
          <li><a href="login.php"><i class="icon-trash"></i>注册/注销</a></li>
        </ul>
      </div>
      <div class="btn-group"> <a href="#" class="btn btn-info btn-small"><i class="icon-user icon-white"></i>帮助中心</a> <a href="#" data-toggle="dropdown" class="btn btn-info btn-small dropdown-toggle"><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo (isset($_smarty_tpl->getVariable('config')->value['path']) ? $_smarty_tpl->getVariable('config')->value['path'] : null);?>
/templates/help.tpl.html" id="help" title="帮助信息">帮助中心</a></li>
          <li><a href="">联络我们</a></li>
        </ul>
      </div>
      <a href="/weibo/" class="btn btn-info btn-small" style="vertical-align:top;"><img src="<?php echo (isset($_smarty_tpl->getVariable('config')->value['img']) ? $_smarty_tpl->getVariable('config')->value['img'] : null);?>
sina.ico" width="16px" height="16px" border="0" />新浪微博</a> <a href="/iweibo/" class="btn btn-info btn-small" style="vertical-align:top;"><img src="<?php echo (isset($_smarty_tpl->getVariable('config')->value['img']) ? $_smarty_tpl->getVariable('config')->value['img'] : null);?>
qq.ico" width="16px" height="16px" border="0" />腾讯微博</a> </div>
  </div>
</div>
<script language="javascript" type="text/javascript">
$(function() {

var $speech = $('#container');
var defaultSize = $speech.css('fontSize') || $('body').css('fontSize');
$('#switcher a').live("click", function () {
    var num = parseFloat($speech.css('fontSize'), 10) || parseFloat($('body').css('fontSize'));
	console.log(num+',' +this.id);
    switch (this.id) {
    case 'switcher-large':
        num *= 1.4;
        break;
    case 'switcher-small':
        num /= 1.4;
        break;
    default:
        num = parseFloat(defaultSize, 10);
    }
    $('#container').stop().animate({
        fontSize: num + 'px'
    }, 'slow');
});

$('#prlnk').click(function () {
    $('#data').load($(this).attr('href'));
    window.print();
    return false;
}).show();

});
</script>
