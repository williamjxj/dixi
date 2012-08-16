<?php /* Smarty version Smarty-3.0.4, created on 2012-08-16 03:43:26
         compiled from "./themes/default/templates/main.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:9321502ccece7c0158-58339283%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fd2beea8d1ec96ca41966b5a6ac282a674efcba' => 
    array (
      0 => './themes/default/templates/main.tpl.html',
      1 => 1345113803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9321502ccece7c0158-58339283',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php ob_start();?><?php echo $_smarty_tpl->getVariable('SCRIPT_NAME')->value;?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['url'] = new Smarty_variable($_tmp1, null, null);?>
<script type="text/javascript">
$(function() {
	for (var i=1; i<=6; i++) {
		$('ul.nav>li>a', '#Tab'+i).removeClass('active');
		//console.log($(('li', '#Tab'+i)).first().text());
		$('li', '#Tab'+i).first().addClass('active');
		var id = '#TabContent'+i;
		$('div'+id).find('div:first').addClass('active in');
		$('#Tab'+i).click(function(e) {
			e.preventDefault();
			$(this).tab('show');
		});
	}
	$('#myTab a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	$('#js-news').ticker();
	
	$('div.tab-pane:first a', '#TabContent1.tab-content').live('click', function(e) {
		e.preventDefault();
		alert($(this).attr('href'));
		window.location.href = '<?php echo $_smarty_tpl->getVariable('url')->value;?>
?cid='+$(this).attr('href');
		return false;
	});
});
$(window).load(function() {
	$.getJSON('<?php echo $_smarty_tpl->getVariable('url')->value;?>
?js_get_tab_list=1', function(data) {
		//console.log(data);
		//console.log($('#TabContent1.tab-content').find('div').first().html()+','+data.length);
		t = '';
		for(i=0; i<data.length; i++) {
			t+='<a href="'+data[i][0]+'">'+data[i][1]+'</a><br>';
		}
		$('#TabContent1.tab-content').find('div').first().html(t);
	});
	return false;
});

</script>
<div style="margin:20px;">
<?php  $_smarty_tpl->tpl_vars['tabs'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['no'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('aoa_tabs')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['tabs']->key => $_smarty_tpl->tpl_vars['tabs']->value){
 $_smarty_tpl->tpl_vars['no']->value = $_smarty_tpl->tpl_vars['tabs']->key;
?>
<div class="row">
  <div class="span12">
    <ul class="nav nav-tabs" id="Tab<?php echo (isset($_smarty_tpl->tpl_vars['no']->value) ? $_smarty_tpl->tpl_vars['no']->value : null);?>
">
      <?php  $_smarty_tpl->tpl_vars['tab'] = new Smarty_Variable;
 $_from = (isset($_smarty_tpl->tpl_vars['tabs']->value) ? $_smarty_tpl->tpl_vars['tabs']->value : null); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['tab']->key => $_smarty_tpl->tpl_vars['tab']->value){
?>
      <li><a data-toggle="tab" href="#<?php echo (isset($_smarty_tpl->tpl_vars['tab']->value) ? $_smarty_tpl->tpl_vars['tab']->value : null);?>
"><strong><?php echo (isset($_smarty_tpl->tpl_vars['tab']->value) ? $_smarty_tpl->tpl_vars['tab']->value : null);?>
</strong></a></li>
      <?php }} ?>
    </ul>
    <div class="tab-content" id="TabContent<?php echo (isset($_smarty_tpl->tpl_vars['no']->value) ? $_smarty_tpl->tpl_vars['no']->value : null);?>
"> <?php  $_smarty_tpl->tpl_vars['tab'] = new Smarty_Variable;
 $_from = (isset($_smarty_tpl->tpl_vars['tabs']->value) ? $_smarty_tpl->tpl_vars['tabs']->value : null); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['tab']->key => $_smarty_tpl->tpl_vars['tab']->value){
?>
      <div id="<?php echo (isset($_smarty_tpl->tpl_vars['tab']->value) ? $_smarty_tpl->tpl_vars['tab']->value : null);?>
" class="tab-pane fade">
        <p><?php echo (isset($_smarty_tpl->tpl_vars['tab']->value) ? $_smarty_tpl->tpl_vars['tab']->value : null);?>
</p>
      </div>
      <?php }} ?> </div>
  </div>
</div>
<?php }} ?>
</div>
<!------------------>
<style type="text/css">
#myCarousel2.thumbnails {
	margin-left:0px !important;
}
#myCarousel2.thumbnails > li > p {
	margin-bottom:0 !important;
	height: 200px;
	overflow:hidden;
}
#myCarousel2.thumbnails > li {
	margin-bottom: 8px !important;
	margin-left:4px !important;
}
#myCarousel2.carousel-control.left {
	left: -15px !important;
}
#myCarousel2.carousel-control.right {
	right: 25px !important;
}
</style>
<!--div class="row">
  <div class="span12">
    <div id="myCarousel2" class="carousel slide">
      <div class="carousel-inner"> <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('carousel2')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
        <div class="item"><img src="<?php echo (isset($_smarty_tpl->tpl_vars['c']->value) ? $_smarty_tpl->tpl_vars['c']->value : null);?>
" /></div>
        <?php }} ?> </div>
      <a class="carousel-control left" href="#myCarousel2" data-slide="prev">&lsaquo;</a> <a class="carousel-control right" href="#myCarousel2" data-slide="next">&rsaquo;</a> </div>
  </div>
</div-->
<div class="row">
  <div class="span12">
    <div id="myCarousel2" class="carousel slide">
      <div class="carousel-inner">
        <div class="active item"> <?php echo $_smarty_tpl->getVariable('nails_first')->value;?>
 </div>
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('carousel2')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
?>
        <div class="item"><?php echo (isset($_smarty_tpl->tpl_vars['v']->value) ? $_smarty_tpl->tpl_vars['v']->value : null);?>
</div>
        <?php }} ?> </div>
      <a class="carousel-control left" href="#myCarousel2" data-slide="prev">&lsaquo;</a> <a class="carousel-control right" href="#myCarousel2" data-slide="next">&rsaquo;</a> </div>
  </div>
</div>
<script type="text/javascript">
$(function() {
	$('#myCarousel2.carousel').carousel({
	  interval: false
	});
	$('#myCarousel2 div.item').first().addClass('active');
});
</script>
<!------------------>
<div class="row">
  <div class="span8">
    <div id="scrollbar1">
      <div class="scrollbar">
        <div class="track">
          <div class="thumb">
            <div class="end"></div>
          </div>
        </div>
      </div>
      <div class="viewport">
        <div class="overview">
          <h3>百度百科：负面新闻</h3>
          <div style="line-height: 140%; margin: 0px; width: 28px; float: left; color: #c74b15; font-size: 28px; font-weight: bolder; border: #000000 0px solid; padding: 0px;">定义：</div>
          <p><?php echo $_smarty_tpl->getVariable('definition')->value;?>
 </p>
        </div>
      </div>
    </div>
  </div>
  <div class="span4"><img src="http://placehold.it/300x200" /> </div>
</div>
<script type="text/javascript">
$(function() {
	$('#scrollbar1').tinyscrollbar();
});
</script>
