<?php /* Smarty version Smarty-3.0.4, created on 2012-08-16 00:41:43
         compiled from "./themes/default/templates/footer.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:25530502ca437c24fa5-93063383%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c84c3f13dfc2d626e64078e9f3d64f17a2280b3' => 
    array (
      0 => './themes/default/templates/footer.tpl.html',
      1 => 1345102901,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25530502ca437c24fa5-93063383',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="box" style="margin:20px; text-align:center;padding:10px;">
    <div class="btn-group"> <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('sitemap')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
?>
      <button class="btn"><?php echo (isset($_smarty_tpl->tpl_vars['m']->value) ? $_smarty_tpl->tpl_vars['m']->value : null);?>
</button>
      <?php }} ?> </div>
  <p style="margin-top:20px">&copy;2012&nbsp;&nbsp;  底细,真相,事实传播媒体 &nbsp;&nbsp;<abbr title="底细,真相,事实传播媒体">(http://www.dixitruth.com)</abbr><br />
  联系电话:(866)123-4567 邮件: <abbr title="admin@dixitruth.com">admin@dixitruth.com</abbr> </div></p>
</div>
