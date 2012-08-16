<?php /* Smarty version Smarty-3.0.4, created on 2012-08-16 02:21:08
         compiled from "./themes/default/templates/menu.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:8010502cbb842c1f44-30976939%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0368a66b35f3302db9a72cef756393be1f6e5d3d' => 
    array (
      0 => './themes/default/templates/menu.tpl.html',
      1 => 1345108773,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8010502cbb842c1f44-30976939',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php ob_start();?><?php echo $_smarty_tpl->getVariable('SCRIPT_NAME')->value;?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['url'] = new Smarty_variable($_tmp1, null, null);?>
<div class="row">
  <div class="span12">
    <div class="btn-group"> <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('menu')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
?>
      <button class="btn"><?php echo (isset($_smarty_tpl->tpl_vars['m']->value) ? $_smarty_tpl->tpl_vars['m']->value : null);?>
</button>
      <?php }} ?> </div>
  </div>
</div>
<!-------------------->
<div>
  <ul id="js-news" class="js-hidden">
    <li class="news-item"><a href="#">这里可以循环显示RSS Feed 新闻。</a></li>
    <li class="news-item"><a href="#">或者，用户输入的最新查询关键词。</a></li>
    <li class="news-item"><a href="#">或者，根据tab,rank,time所得到的排名。</a></li>
    <li class="news-item"><a href="#">或者，一些热点，焦点短新闻，或讨论，或者，从微博来的即时信息。</a></li>
    <li class="news-item"><a href="#">或者，任何简短的提示，或帮助信息。</a></li>
  </ul>
</div>
<!-------------------->
<div class="row">
  <div class="span4">
    <div class="carousel slide" id="myCarousel">
      <div class="carousel-inner"> <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('carousel1')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
        <div class="item"><img src="<?php echo (isset($_smarty_tpl->tpl_vars['c']->value) ? $_smarty_tpl->tpl_vars['c']->value : null);?>
" />
          <div class="caption">
            <h5>食品卫生</h5>
            <p>食品卫生实例</p>
          </div>
        </div>
        <?php }} ?> </div>
      <a data-slide="prev" href="#myCarousel" class="left carousel-control">‹</a> <a data-slide="next" href="#myCarousel" class="right carousel-control">›</a> </div>
  </div>
  <div class="span4">
    <form class="well form-search">
      <!--ul>
    <li class="selected">所有栏目</li>
    <li>食品</li>
    <li>药物</li>
    <li>质量</li>
    <li>医疗</li>
    <li>禁忌</li>
    <li>科技</li>
  </ul-->
      <input type="text" class="input-medium search-query" id="typeahead" data-provide="typeahead" autocompltete="off" placeholder="查询 （比如： 负面新闻）" />
      <button type="submit" class="btn btn-primary"><i class="icon-search icon-white"></i>搜索</button>
    </form>
  </div>
  <!-------------------->
</div>
<script language="javascript" type="text/javascript">
$(function() {
    $('#myCarousel.carousel').carousel();
	$('#myCarousel').find('div.item').first().addClass('active');
	
	$('#typeahead').typeahead({
		source: function(typeahead, query) {
			//空字符不发送请求。
			if(query.length==0) return false;
			$.ajax({
				url: 'keys_search.php',
				type: 'GET',
				data: 'q=' + query,
				dataType: 'JSON',
				async: false,
				cache: false,
				beforeSend: function(){
				},
				success: function(data) {
					typeahead.process(data);
				}
			});
		}
	});

	//'top': parseFloat(parseFloat(p.top)+30)+'px'})
	$('#searchSelected.searchSelected').click(function(e) {
		var p = $(this).position();
		// alert(p.left+", " + p.top);
		e.preventDefault();
		$('#searchTab.searchTab').css({
			'left': p.left,
			'top': p.top})
		.toggle();
  		$('#searchTab.searchTab ul li').each(function() {
			var sli = $(this);
			sli.click(function() {
				$('#searchSelected').text($(this).text());
				$(this).siblings().removeClass('selected');
				$(this).addClass('selected');
				$('#searchTab.searchTab').hide();
				$('#typeahead').focus();
				return false;
			});
		});
	});

});
</script>
