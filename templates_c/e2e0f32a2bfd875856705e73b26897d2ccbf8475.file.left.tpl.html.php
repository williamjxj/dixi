<?php /* Smarty version Smarty-3.0.4, created on 2012-08-13 11:43:50
         compiled from "./themes/default/templates/left.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:702550294ae6e93a52-91987199%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2e0f32a2bfd875856705e73b26897d2ccbf8475' => 
    array (
      0 => './themes/default/templates/left.tpl.html',
      1 => 1344883390,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '702550294ae6e93a52-91987199',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
通常广告或不是很重要的内容
<?php if (($_smarty_tpl->getVariable('left')->value !== null)&&is_array($_smarty_tpl->getVariable('left')->value)&&count($_smarty_tpl->getVariable('left')->value)>0){?>
<?php if ((isset($_smarty_tpl->getVariable('left')->value['nav']) ? $_smarty_tpl->getVariable('left')->value['nav'] : null)){?>
<div class="span2">
  <ul>
    <?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable;
 $_from = (isset($_smarty_tpl->getVariable('left')->value['nav']) ? $_smarty_tpl->getVariable('left')->value['nav'] : null); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value){
?>
    <li><?php echo (isset($_smarty_tpl->tpl_vars['l']->value) ? $_smarty_tpl->tpl_vars['l']->value : null);?>
</li>
    <?php }} ?>
  </ul>
</div>
<?php }?> 
<?php }else{ ?>
<div class="span2"> <?php echo $_smarty_tpl->getVariable('left')->value;?>
 </div>
<?php }?>
<script language="javascript" type="text/javascript">
$(function() {
});
</script>
