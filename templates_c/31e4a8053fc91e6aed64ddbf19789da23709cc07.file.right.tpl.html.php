<?php /* Smarty version Smarty-3.0.4, created on 2012-08-15 03:36:39
         compiled from "./themes/default/templates/right.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:1991960545502afd27c5b149-71509670%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31e4a8053fc91e6aed64ddbf19789da23709cc07' => 
    array (
      0 => './themes/default/templates/right.tpl.html',
      1 => 1344923354,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1991960545502afd27c5b149-71509670',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
 通常广告或不是很重要的内容

<?php if (($_smarty_tpl->getVariable('right')->value !== null)&&is_array($_smarty_tpl->getVariable('right')->value)&&count($_smarty_tpl->getVariable('right')->value)>0){?>
 <?php if ((isset($_smarty_tpl->getVariable('right')->value['aside']) ? $_smarty_tpl->getVariable('right')->value['aside'] : null)){?>
<div class="span2">
  <ul>
    <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable;
 $_from = (isset($_smarty_tpl->getVariable('right')->value['aside']) ? $_smarty_tpl->getVariable('right')->value['aside'] : null); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
?>
    <li><?php echo (isset($_smarty_tpl->tpl_vars['r']->value) ? $_smarty_tpl->tpl_vars['r']->value : null);?>
</li>
    <?php }} ?>
  </ul>
</div>
<?php }?>
<?php }else{ ?>
<div class="span2"> <?php echo $_smarty_tpl->getVariable('right')->value;?>
 </div>
<?php }?>
<script type="text/javascript">
$(function() {
});
</script>
