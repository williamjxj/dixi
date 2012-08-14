<?php /* Smarty version Smarty-3.0.4, created on 2012-08-14 11:48:41
         compiled from "./themes/default/templates/footer.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:29071502a9d8937ee95-36199299%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c84c3f13dfc2d626e64078e9f3d64f17a2280b3' => 
    array (
      0 => './themes/default/templates/footer.tpl.html',
      1 => 1344970005,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29071502a9d8937ee95-36199299',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php ob_start();?><?php echo $_smarty_tpl->getVariable('SCRIPT_NAME')->value;?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['url'] = new Smarty_variable($_tmp1, null, null);?>
<?php if (($_smarty_tpl->getVariable('footer')->value !== null)&&is_array($_smarty_tpl->getVariable('footer')->value)&&count($_smarty_tpl->getVariable('footer')->value)>0){?>
  <?php  $_smarty_tpl->tpl_vars['h'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('footer')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['h']->key => $_smarty_tpl->tpl_vars['h']->value){
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['h']->key;
?> 
  <?php }} ?>
  <?php }?>
  
<div class="row"> <?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('copyright_template')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?> </div>
<script type="text/javascript">
$(function() {
});
</script>
