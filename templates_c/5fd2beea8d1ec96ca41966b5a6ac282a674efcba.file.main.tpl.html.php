<?php /* Smarty version Smarty-3.0.4, created on 2012-08-13 18:55:56
         compiled from "./themes/default/templates/main.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:41515029b02ce43bf2-61406668%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fd2beea8d1ec96ca41966b5a6ac282a674efcba' => 
    array (
      0 => './themes/default/templates/main.tpl.html',
      1 => 1344909341,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41515029b02ce43bf2-61406668',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('main')->value&&count($_smarty_tpl->getVariable('main')->value)>0){?>
 <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('main')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
?>
   <div class="box"><?php echo (isset($_smarty_tpl->tpl_vars['m']->value) ? $_smarty_tpl->tpl_vars['m']->value : null);?>
</div>
 <?php }} ?>
<?php }else{ ?>
  <div class="box"><?php echo (isset($_smarty_tpl->getVariable('main')->value['contents']) ? $_smarty_tpl->getVariable('main')->value['contents'] : null);?>
</div>
<?php }?>