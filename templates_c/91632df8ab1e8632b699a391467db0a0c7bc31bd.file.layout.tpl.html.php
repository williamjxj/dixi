<?php /* Smarty version Smarty-3.0.4, created on 2012-08-15 03:36:39
         compiled from "./themes/default/templates/layout.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:936783714502afd279c4b72-55928047%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91632df8ab1e8632b699a391467db0a0c7bc31bd' => 
    array (
      0 => './themes/default/templates/layout.tpl.html',
      1 => 1344994456,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '936783714502afd279c4b72-55928047',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html lang="<?php echo (isset($_smarty_tpl->getVariable('common')->value['header']['lang']) ? $_smarty_tpl->getVariable('common')->value['header']['lang'] : null);?>
">
<head>
<meta charset="<?php echo (isset($_smarty_tpl->getVariable('common')->value['header']['charset']) ? $_smarty_tpl->getVariable('common')->value['header']['charset'] : null);?>
">
<title><?php ob_start();?><?php echo (isset($_smarty_tpl->getVariable('common')->value['header']['title']) ? $_smarty_tpl->getVariable('common')->value['header']['title'] : null);?>
<?php $_tmp1=ob_get_clean();?><?php echo (($tmp = @(isset($_smarty_tpl->getVariable('config')->value['header']['title']) ? $_smarty_tpl->getVariable('config')->value['header']['title'] : null))===null||$tmp==='' ? $_tmp1 : $tmp);?>
</title>
<meta name="description" content="<?php ob_start();?><?php echo (isset($_smarty_tpl->getVariable('common')->value['header']['desc']) ? $_smarty_tpl->getVariable('common')->value['header']['desc'] : null);?>
<?php $_tmp2=ob_get_clean();?><?php echo (($tmp = @(isset($_smarty_tpl->getVariable('config')->value['header']['desc']) ? $_smarty_tpl->getVariable('config')->value['header']['desc'] : null))===null||$tmp==='' ? $_tmp2 : $tmp);?>
">
<meta name="keywords" content="<?php ob_start();?><?php echo (isset($_smarty_tpl->getVariable('common')->value['header']['keywords']) ? $_smarty_tpl->getVariable('common')->value['header']['keywords'] : null);?>
<?php $_tmp3=ob_get_clean();?><?php echo (($tmp = @(isset($_smarty_tpl->getVariable('config')->value['header']['keywords']) ? $_smarty_tpl->getVariable('config')->value['header']['keywords'] : null))===null||$tmp==='' ? $_tmp3 : $tmp);?>
">
<meta name="robots" content="<?php ob_start();?><?php echo (isset($_smarty_tpl->getVariable('common')->value['header']['robots']) ? $_smarty_tpl->getVariable('common')->value['header']['robots'] : null);?>
<?php $_tmp4=ob_get_clean();?><?php echo (($tmp = @(isset($_smarty_tpl->getVariable('config')->value['header']['robots']) ? $_smarty_tpl->getVariable('config')->value['header']['robots'] : null))===null||$tmp==='' ? $_tmp4 : $tmp);?>
">
<link rel="stylesheet" type="text/css" href="<?php echo (isset($_smarty_tpl->getVariable('common')->value['css']['bootstrap']) ? $_smarty_tpl->getVariable('common')->value['css']['bootstrap'] : null);?>
" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo (isset($_smarty_tpl->getVariable('common')->value['css']['qq']) ? $_smarty_tpl->getVariable('common')->value['css']['qq'] : null);?>
" media="screen" />
<!--link rel="stylesheet" type="text/css" href="<?php echo (isset($_smarty_tpl->getVariable('config')->value['path']) ? $_smarty_tpl->getVariable('config')->value['path'] : null);?>
css/dixi2.css" media="screen" /-->
<script type="text/javascript" src="<?php echo (isset($_smarty_tpl->getVariable('common')->value['js']['jquery']) ? $_smarty_tpl->getVariable('common')->value['js']['jquery'] : null);?>
"></script>
<script type="text/javascript" src="<?php echo (isset($_smarty_tpl->getVariable('common')->value['js']['bts']) ? $_smarty_tpl->getVariable('common')->value['js']['bts'] : null);?>
"></script>
<script type="text/javascript" src="<?php echo (isset($_smarty_tpl->getVariable('common')->value['js']['gb_big5']) ? $_smarty_tpl->getVariable('common')->value['js']['gb_big5'] : null);?>
"></script>
<script type="text/javascript" src="<?php echo (isset($_smarty_tpl->getVariable('common')->value['js']['ga']) ? $_smarty_tpl->getVariable('common')->value['js']['ga'] : null);?>
"></script>
<!------------------------>
<meta content="index, follow" name="robots">
<meta content="index, follow" name="googlebot">
<link rel="shortcut icon" href="favicon.ico">
<!------------------------>
<link rel="stylesheet" type="text/css" href="<?php echo (isset($_smarty_tpl->getVariable('config')->value['include']) ? $_smarty_tpl->getVariable('config')->value['include'] : null);?>
rotator/rotators.css">
<script type="text/javascript" src="<?php echo (isset($_smarty_tpl->getVariable('config')->value['include']) ? $_smarty_tpl->getVariable('config')->value['include'] : null);?>
rotator/rotators.js"></script>
<!------------------------>
<link href="<?php echo (isset($_smarty_tpl->getVariable('config')->value['include']) ? $_smarty_tpl->getVariable('config')->value['include'] : null);?>
news_ticker/styles/ticker-style.css" rel="stylesheet" type="text/css" />
<script src="<?php echo (isset($_smarty_tpl->getVariable('config')->value['include']) ? $_smarty_tpl->getVariable('config')->value['include'] : null);?>
news_ticker/includes/jquery.ticker.min.js" type="text/javascript"></script>
<!------------------------>
<script type="text/javascript">
$(function(){
});
$(window).load(function() {
  //$('.flexslider').flexslider();
  //$.ajaxSetup({ async: true });
  //$.getScript('./js/ga.js');
});
</script>
</head>
<body id="<?php echo (isset($_smarty_tpl->getVariable('config')->value['browser']) ? $_smarty_tpl->getVariable('config')->value['browser'] : null);?>
">
<div class="container">
  <div id="header"> <?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('header_template')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?> </div>
  <div id="menu"> <?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('menu_template')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?> </div>
  <div id="rss"> <?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('rss_template')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?> </div>
  <div id="main"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('main_template')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
  <!--div class="row">
    <div class="span2"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('left_template')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
    <div class="span8"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('main_template')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
    <div class="span2"><?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('right_template')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?></div>
  </div-->
  <div id="footer"> <?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('footer_template')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?> </div>
</div>
</body>
</html>
