<?php /* Smarty version Smarty-3.0.4, created on 2012-08-13 10:45:08
         compiled from "./themes/default/templates/header.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:2821350293d246623f6-59744618%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8da7a7fa48d3f13039e42132b3900dc480a54c9d' => 
    array (
      0 => './themes/default/templates/header.tpl.html',
      1 => 1344630281,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2821350293d246623f6-59744618',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include './include/Smarty-3.0.4/libs/plugins\modifier.date_format.php';
?><div class="row">
  <div class="span4">
    <div id="logo"> <a href="<?php echo (isset($_smarty_tpl->getVariable('common')->value['header']['url']) ? $_smarty_tpl->getVariable('common')->value['header']['url'] : null);?>
" title="<?php echo (isset($_smarty_tpl->getVariable('common')->value['header']['title']) ? $_smarty_tpl->getVariable('common')->value['header']['title'] : null);?>
"> <?php echo (isset($_smarty_tpl->getVariable('common')->value['header']['logo']) ? $_smarty_tpl->getVariable('common')->value['header']['logo'] : null);?>
 </a> </div>
  </div>
  <div class="span8">
    <ul>
      <li><img alt="Member login" src="<?php echo (isset($_smarty_tpl->getVariable('config')->value['path']) ? $_smarty_tpl->getVariable('config')->value['path'] : null);?>
images/lock.png">&nbsp;<a id="login_signup" href="login.php">用户注册</a></li>
      <li><a href="<?php echo (isset($_smarty_tpl->getVariable('config')->value['path']) ? $_smarty_tpl->getVariable('config')->value['path'] : null);?>
/templates/help.tpl.html" id="help" title="帮助信息">帮助信息</a></li>
      <li>当前时间： <?php echo smarty_modifier_date_format(time(),'%Y-%m-%d %H:%M');?>
</li>
      <li><span id="st" style="cursor: pointer;" onmouseover="$(this).css('color', 'red');" onmouseout="$(this).css('color', 'white');">切至繁体版</span></li>
    </ul>
  </div>
</div>
<div class="row">
  <div id="menu" class="span12"> <?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('menu_template')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?> </div>
</div>
<script language="javascript" type="text/javascript">
$(function() {
});
</script>