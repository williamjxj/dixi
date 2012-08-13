<?php /* Smarty version Smarty-3.0.4, created on 2012-08-13 11:43:50
         compiled from "./themes/default/templates/menu.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:1359250294ae6bb3616-30660274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0368a66b35f3302db9a72cef756393be1f6e5d3d' => 
    array (
      0 => './themes/default/templates/menu.tpl.html',
      1 => 1344883364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1359250294ae6bb3616-30660274',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include './include/Smarty-3.0.4/libs/plugins\modifier.escape.php';
?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('SCRIPT_NAME')->value;?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['url'] = new Smarty_variable($_tmp1, null, null);?>
<?php if (((isset($_smarty_tpl->getVariable('header')->value['menu']) ? $_smarty_tpl->getVariable('header')->value['menu'] : null) !== null)&&is_array((isset($_smarty_tpl->getVariable('header')->value['menu']) ? $_smarty_tpl->getVariable('header')->value['menu'] : null))&&count((isset($_smarty_tpl->getVariable('header')->value['menu']) ? $_smarty_tpl->getVariable('header')->value['menu'] : null))>0){?>
<ul class="menu">
  <?php  $_smarty_tpl->tpl_vars['h'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = (isset($_smarty_tpl->getVariable('header')->value['menu']) ? $_smarty_tpl->getVariable('header')->value['menu'] : null); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['h']->key => $_smarty_tpl->tpl_vars['h']->value){
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['h']->key;
?>
  <li> <?php if ((isset($_smarty_tpl->tpl_vars['h']->value['url_flag']) ? $_smarty_tpl->tpl_vars['h']->value['url_flag'] : null)=='Y'){?> <a id="<?php echo (isset($_smarty_tpl->tpl_vars['id']->value) ? $_smarty_tpl->tpl_vars['id']->value : null);?>
" href="<?php echo (isset($_smarty_tpl->tpl_vars['h']->value['url']) ? $_smarty_tpl->tpl_vars['h']->value['url'] : null);?>
" class="parent ajax1" title="<?php echo (isset($_smarty_tpl->tpl_vars['h']->value['name']) ? $_smarty_tpl->tpl_vars['h']->value['name'] : null);?>
"><span><?php echo smarty_modifier_escape((isset($_smarty_tpl->tpl_vars['h']->value['name']) ? $_smarty_tpl->tpl_vars['h']->value['name'] : null),'html');?>
</span></a><?php }else{ ?>
    <?php if ((isset($_smarty_tpl->tpl_vars['h']->value['left1']) ? $_smarty_tpl->tpl_vars['h']->value['left1'] : null)=='N'){?>
    <?php $_smarty_tpl->tpl_vars['left'] = new Smarty_variable('&l=N', null, null);?>
    <?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars['left'] = new Smarty_variable('&l=Y', null, null);?>
    <?php }?>
    <?php ob_start();?><?php echo (isset($_smarty_tpl->tpl_vars['h']->value['right3']) ? $_smarty_tpl->tpl_vars['h']->value['right3'] : null);?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2=='N'){?>
    <?php $_smarty_tpl->tpl_vars['right'] = new Smarty_variable('&r=N', null, null);?>
    <?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars['right'] = new Smarty_variable('&r=Y', null, null);?>
    <?php }?> <a id="<?php echo (isset($_smarty_tpl->tpl_vars['id']->value) ? $_smarty_tpl->tpl_vars['id']->value : null);?>
" href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
?js_get_module=1<?php echo $_smarty_tpl->getVariable('left')->value;?>
<?php echo $_smarty_tpl->getVariable('right')->value;?>
&mid=<?php echo (isset($_smarty_tpl->tpl_vars['h']->value['mid']) ? $_smarty_tpl->tpl_vars['h']->value['mid'] : null);?>
" class="parent ajax" title="<?php echo (isset($_smarty_tpl->tpl_vars['h']->value['name']) ? $_smarty_tpl->tpl_vars['h']->value['name'] : null);?>
"><span><?php echo smarty_modifier_escape((isset($_smarty_tpl->tpl_vars['h']->value['name']) ? $_smarty_tpl->tpl_vars['h']->value['name'] : null),'html');?>
</span></a><?php }?>
    <?php if (((isset($_smarty_tpl->tpl_vars['h']->value['submenu']) ? $_smarty_tpl->tpl_vars['h']->value['submenu'] : null) !== null)&&is_array((isset($_smarty_tpl->tpl_vars['h']->value['submenu']) ? $_smarty_tpl->tpl_vars['h']->value['submenu'] : null))&&count((isset($_smarty_tpl->tpl_vars['h']->value['submenu']) ? $_smarty_tpl->tpl_vars['h']->value['submenu'] : null))>0){?>
    <div>
      <ul>
        <?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_from = (isset($_smarty_tpl->tpl_vars['h']->value['submenu']) ? $_smarty_tpl->tpl_vars['h']->value['submenu'] : null); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
 $_smarty_tpl->tpl_vars['m']->value = $_smarty_tpl->tpl_vars['n']->key;
?>
        <li title="<?php echo (isset($_smarty_tpl->tpl_vars['n']->value) ? $_smarty_tpl->tpl_vars['n']->value : null);?>
"><a id="<?php echo (isset($_smarty_tpl->tpl_vars['m']->value) ? $_smarty_tpl->tpl_vars['m']->value : null);?>
" href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
?js_get_module=1<?php echo $_smarty_tpl->getVariable('left')->value;?>
<?php echo $_smarty_tpl->getVariable('right')->value;?>
&mid=<?php echo (isset($_smarty_tpl->tpl_vars['h']->value['mid']) ? $_smarty_tpl->tpl_vars['h']->value['mid'] : null);?>
&amp;cid=<?php echo (isset($_smarty_tpl->tpl_vars['m']->value) ? $_smarty_tpl->tpl_vars['m']->value : null);?>
" title="<?php echo smarty_modifier_escape((isset($_smarty_tpl->tpl_vars['n']->value) ? $_smarty_tpl->tpl_vars['n']->value : null),'html');?>
" class="sajax"><span><?php echo (isset($_smarty_tpl->tpl_vars['n']->value) ? $_smarty_tpl->tpl_vars['n']->value : null);?>
</span></a></li>
        <?php }} ?>
      </ul>
    </div>
    <?php }?> </li>
  <?php }} ?>
</ul>
<script language="javascript" type="text/javascript">
$(function() {
});
</script>
<?php }?>