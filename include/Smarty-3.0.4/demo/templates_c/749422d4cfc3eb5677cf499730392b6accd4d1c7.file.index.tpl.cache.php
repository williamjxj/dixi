<?php /* Smarty version Smarty-3.0.4, created on 2011-06-07 11:59:29
         compiled from ".\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213854dee7511038af7-18994255%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1289701738,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213854dee7511038af7-18994255',
  'function' => 
  array (
  ),
  'has_nocache_code' => true,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_capitalize')) include 'C:\projects\demo\include\Smarty-3.0.4\libs\plugins\modifier.capitalize.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\projects\demo\include\Smarty-3.0.4\libs\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_html_select_date')) include 'C:\projects\demo\include\Smarty-3.0.4\libs\plugins\function.html_select_date.php';
if (!is_callable('smarty_function_html_select_time')) include 'C:\projects\demo\include\Smarty-3.0.4\libs\plugins\function.html_select_time.php';
if (!is_callable('smarty_function_html_options')) include 'C:\projects\demo\include\Smarty-3.0.4\libs\plugins\function.html_options.php';
?><?php echo '/*%%SmartyNocache:213854dee7511038af7-18994255%%*/<?php if (!is_callable(\'smarty_modifier_capitalize\')) include \'C:\projects\demo\include\Smarty-3.0.4\libs\plugins\modifier.capitalize.php\';
if (!is_callable(\'smarty_modifier_date_format\')) include \'C:\projects\demo\include\Smarty-3.0.4\libs\plugins\modifier.date_format.php\';
?>/*/%%SmartyNocache:213854dee7511038af7-18994255%%*/';?>
<?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null);
$_template->assign('title','foo'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<PRE>
<?php if ($_smarty_tpl->getConfigVariable('bold')){?><b><?php }?>
Title: <?php echo smarty_modifier_capitalize($_smarty_tpl->getConfigVariable('title'));?>

<?php if ($_smarty_tpl->getConfigVariable('bold')){?></b><?php }?>

The current date and time is <?php echo smarty_modifier_date_format(time(),"%Y-%m-%d %H:%M:%S");?>


The value of global assigned variable $SCRIPT_NAME is <?php echo $_smarty_tpl->getVariable('SCRIPT_NAME')->value;?>


Example of accessing server environment variable SERVER_NAME: <?php echo (isset($_SERVER['SERVER_NAME'])? $_SERVER['SERVER_NAME'] : null);?>


The value of {$Name} is <b><?php echo '/*%%SmartyNocache:213854dee7511038af7-18994255%%*/<?php echo $_smarty_tpl->getVariable(\'Name\')->value;?>
/*/%%SmartyNocache:213854dee7511038af7-18994255%%*/';?></b>

variable modifier example of {$Name|upper}

<b><?php echo '/*%%SmartyNocache:213854dee7511038af7-18994255%%*/<?php echo ((mb_detect_encoding($_smarty_tpl->getVariable(\'Name\')->value, \'UTF-8, ISO-8859-1\') === \'UTF-8\') ? mb_strtoupper($_smarty_tpl->getVariable(\'Name\')->value,SMARTY_RESOURCE_CHAR_SET) : strtoupper($_smarty_tpl->getVariable(\'Name\')->value));?>
/*/%%SmartyNocache:213854dee7511038af7-18994255%%*/';?></b>


An example of a section loop:

<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['name'] = 'outer';
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('FirstName')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['total']);
?>
<?php if ((1 & $_smarty_tpl->getVariable('smarty')->value['section']['outer']['index'] / 2)){?>
	<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['outer']['rownum'];?>
 . <?php echo (isset($_smarty_tpl->getVariable('FirstName')->value[$_smarty_tpl->getVariable('smarty')->value['section']['outer']['index']]) ? $_smarty_tpl->getVariable('FirstName')->value[$_smarty_tpl->getVariable('smarty')->value['section']['outer']['index']] : null);?>
 <?php echo (isset($_smarty_tpl->getVariable('LastName')->value[$_smarty_tpl->getVariable('smarty')->value['section']['outer']['index']]) ? $_smarty_tpl->getVariable('LastName')->value[$_smarty_tpl->getVariable('smarty')->value['section']['outer']['index']] : null);?>

<?php }else{ ?>
	<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['outer']['rownum'];?>
 * <?php echo (isset($_smarty_tpl->getVariable('FirstName')->value[$_smarty_tpl->getVariable('smarty')->value['section']['outer']['index']]) ? $_smarty_tpl->getVariable('FirstName')->value[$_smarty_tpl->getVariable('smarty')->value['section']['outer']['index']] : null);?>
 <?php echo (isset($_smarty_tpl->getVariable('LastName')->value[$_smarty_tpl->getVariable('smarty')->value['section']['outer']['index']]) ? $_smarty_tpl->getVariable('LastName')->value[$_smarty_tpl->getVariable('smarty')->value['section']['outer']['index']] : null);?>

<?php }?>
<?php endfor; else: ?>
	none
<?php endif; ?>

An example of section looped key values:

<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['name'] = 'sec1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('contacts')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['total']);
?>
	phone: <?php echo (isset($_smarty_tpl->getVariable('contacts')->value[$_smarty_tpl->getVariable('smarty')->value['section']['sec1']['index']]['phone']) ? $_smarty_tpl->getVariable('contacts')->value[$_smarty_tpl->getVariable('smarty')->value['section']['sec1']['index']]['phone'] : null);?>
<br>
	fax: <?php echo (isset($_smarty_tpl->getVariable('contacts')->value[$_smarty_tpl->getVariable('smarty')->value['section']['sec1']['index']]['fax']) ? $_smarty_tpl->getVariable('contacts')->value[$_smarty_tpl->getVariable('smarty')->value['section']['sec1']['index']]['fax'] : null);?>
<br>
	cell: <?php echo (isset($_smarty_tpl->getVariable('contacts')->value[$_smarty_tpl->getVariable('smarty')->value['section']['sec1']['index']]['cell']) ? $_smarty_tpl->getVariable('contacts')->value[$_smarty_tpl->getVariable('smarty')->value['section']['sec1']['index']]['cell'] : null);?>
<br>
<?php endfor; endif; ?>
<p>

testing strip tags
<table border=0><tr><td><A HREF="<?php echo $_smarty_tpl->getVariable('SCRIPT_NAME')->value;?>
"><font color="red">This is a  test     </font></A></td></tr></table>

</PRE>

This is an example of the html_select_date function:

<form>
<?php echo smarty_function_html_select_date(array('start_year'=>1998,'end_year'=>2010),$_smarty_tpl);?>

</form>

This is an example of the html_select_time function:

<form>
<?php echo smarty_function_html_select_time(array('use_24_hours'=>false),$_smarty_tpl);?>

</form>

This is an example of the html_options function:

<form>
<select name=states>
<?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->getVariable('option_values')->value,'selected'=>$_smarty_tpl->getVariable('option_selected')->value,'output'=>$_smarty_tpl->getVariable('option_output')->value),$_smarty_tpl);?>

</select>
</form>

<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
