<?php /* Smarty version Smarty-3.0.4, created on 2012-08-16 01:23:18
         compiled from "./themes/default/templates/header.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:3693502cadf69c0dd9-17406916%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8da7a7fa48d3f13039e42132b3900dc480a54c9d' => 
    array (
      0 => './themes/default/templates/header.tpl.html',
      1 => 1345105292,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3693502cadf69c0dd9-17406916',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include './include/Smarty-3.0.4/libs/plugins\modifier.date_format.php';
?>
<div class="row">
  <div class="span2">
    <div id="logo"> <a href="<?php echo (isset($_smarty_tpl->getVariable('config')->value['url']) ? $_smarty_tpl->getVariable('config')->value['url'] : null);?>
" title="<?php echo (isset($_smarty_tpl->getVariable('common')->value['header']['title']) ? $_smarty_tpl->getVariable('common')->value['header']['title'] : null);?>
"><img src="<?php echo (isset($_smarty_tpl->getVariable('common')->value['logo']['logo_130x60']) ? $_smarty_tpl->getVariable('common')->value['logo']['logo_130x60'] : null);?>
" /> </a> </div>
  </div>
  <div class="span10">
    <div class="btn-toolbar"> <span>当前时间： <?php echo smarty_modifier_date_format(time(),'%Y-%m-%d %H:%M');?>
， <span id="st" style="cursor: pointer;">切至繁体版</span> </span>
      <div class="btn-group"> <a href="#" class="btn btn-info btn-small"><i class="icon-list-alt icon-white"></i>&nbsp;显示字体</a> <a href="#" data-toggle="dropdown" class="btn  btn-info btn-small dropdown-toggle"><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#" id="switcher-default">缺省</a></li>
          <li><a href="#" id="switcher-large">放大</a></li>
          <li><a href="#" id="switcher-small">缩小</a></li>
          <li class="divider"></li>
          <li><a href="#container" id="prlnk"><i class="icon-print"></i>打印</a></li>
        </ul>
      </div>
<?php ob_start();?><?php echo (isset($_smarty_tpl->getVariable('config')->value['username']) ? $_smarty_tpl->getVariable('config')->value['username'] : null);?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1){?>
      <div class="btn-group"> <a href="#" class="btn btn-info btn-small"><i class="icon-user icon-white"></i><?php echo (isset($_smarty_tpl->getVariable('config')->value['username']) ? $_smarty_tpl->getVariable('config')->value['username'] : null);?>
</a> <a href="#" data-toggle="dropdown" class="btn btn-info btn-small dropdown-toggle"><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#"><i class="icon-pencil"></i><?php echo (isset($_smarty_tpl->getVariable('config')->value['username']) ? $_smarty_tpl->getVariable('config')->value['username'] : null);?>
信息</a></li>
          <li><a href="#"><i class="icon-trash"></i>修改<?php echo (isset($_smarty_tpl->getVariable('config')->value['username']) ? $_smarty_tpl->getVariable('config')->value['username'] : null);?>
</a></li>
          <li><a href="login.php?logout=1"><i class="icon-trash"></i>注销</a></li>
        </ul>
      </div>
<?php }?>
      <div class="btn-group"> <a href="#" class="btn btn-info btn-small"><i class="icon-user icon-white"></i>帮助中心</a> <a href="#" data-toggle="dropdown" class="btn btn-info btn-small dropdown-toggle"><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo (isset($_smarty_tpl->getVariable('config')->value['path']) ? $_smarty_tpl->getVariable('config')->value['path'] : null);?>
/templates/help.tpl.html" id="help" title="帮助信息">帮助中心</a></li>
          <li><a data-toggle="modal" href="#myModal">联络我们</a></li>
          <li class="divider"></li>
          <li><img src="images/lock.png" width="10" height="10" border="0"><a id="login_signup" href="login/login_admin.php">后台管理</a></li>
        </ul>
      </div>
      <a href="/weibo/" class="btn btn-info btn-small" style="vertical-align:top;"><img src="<?php echo (isset($_smarty_tpl->getVariable('config')->value['img']) ? $_smarty_tpl->getVariable('config')->value['img'] : null);?>
sina.ico" width="16px" height="16px" border="0" />新浪微博</a> <a href="/iweibo/" class="btn btn-info btn-small" style="vertical-align:top;"><img src="<?php echo (isset($_smarty_tpl->getVariable('config')->value['img']) ? $_smarty_tpl->getVariable('config')->value['img'] : null);?>
qq.ico" width="16px" height="16px" border="0" />腾讯微博</a> </div>
  </div>
</div>
<section>
  <div class="modal hide" id="myModal"></div>
  <div id="div_ls" style="display:none;"></div>
</section>
<script language="javascript" type="text/javascript">
$(function() {

	var $speech = $('#container');
	var defaultSize = $speech.css('fontSize') || $('body').css('fontSize');
	$('#switcher a').live("click", function () {
		var num = parseFloat($speech.css('fontSize'), 10) || parseFloat($('body').css('fontSize'));
		console.log(num+',' +this.id);
		switch (this.id) {
		case 'switcher-large':
			num *= 1.4;
			break;
		case 'switcher-small':
			num /= 1.4;
			break;
		default:
			num = parseFloat(defaultSize, 10);
		}
		$('#container').stop().animate({
			fontSize: num + 'px'
		}, 'slow');
	});
	
	$('#prlnk').click(function () {
		$('#data').load($(this).attr('href'));
		window.print();
		return false;
	}).show();

    $('#myModal').modal({ show: false });
    $('a[data-toggle="modal"]').click(function(e) {
        e.preventDefault();
        var url = 'fancy_contact.php';
        $.ajax({
            type: 'get',
            url: url,
            cache: false,
            success: function(data) {
                $('#myModal').modal({ show: true });
                $('#myModal').html(data).show()
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('error ' + textStatus + " " + errorThrown);
            }
        });
        return false;
    });

	//dixi_admin
	$('#login_signup').click(function(e) {
	    e.preventDefault();
		var t2 = $('#div_ls');
		if($(t2).is(':visible')) {
			$(t2).hide();
		}
		else {
			if($(t2).html().length>0) {
				$(t2).hide().fadeIn(200);
			}
			else {
				$(t2).load($(this).attr('href')).hide().fadeIn(200);
			}
		}
		return false;
	});

});
</script>
