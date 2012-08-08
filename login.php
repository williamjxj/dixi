<?php
if (isset($_POST['js_check'])) {
	if(check()) echo 'Y';
	else echo 'N';
}
else {
	init();
}
exit;

///////////////////////////////

function init()
{
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="./include/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="include/login1.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="./js/cookie.js"></script>
<script type="text/javascript" src="./js/jquery.validate.min.js"></script>
<div id="div_form">
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="form_id" class="well">
    <fieldset>
    <legend><img src="include/login-icon.png" /><strong>用户注册</strong></legend>
    <div class="control-group">
      <label class="control-label" for="username">用户名：</label>
      <div class="controls">
        <div class="input-prepend"> <span class="add-on"> <i class="icon-user"></i></span>
          <input name="username" id="username" type="text" placeholder="用 户 名" class="input-xlarge"/>
        </div>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="password">口令： </label>
      <div class="controls">
        <div class="input-prepend"> <span class="add-on"><i class="icon-lock"></i></span>
          <input name="password" id="password" type="text" placeholder="口 令" class="input-xlarge"/>
        </div>
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
        <label class="checkbox">
        <input type="checkbox" id="rememberme" name="rememberme">
        记住我的选择！ </label>
      </div>
    </div>
    <div class="control-group">
      <div align="center">
        <button type="submit" class="btn btn-primary">登 录</button>
        <img src="include/loading.gif" width="32" height="32" border="0" style="display:none;" /> </div>
    </div>
    <div class="control-group error">
      <label id="error"></label>
    </div>
    </fieldset>
  </form>
</div>
<script type="text/javascript">
$(function() {
	var validator = $('#form_id').validate({
		rules: {
			username: "required",
			password: "required"
		},
		messages: {
			username: "",
			password: ""
		},
		
		highlight:function(element, errorClass, validClass) {
		  $(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
		  $(element).parents('.control-group').removeClass('error');
		  $(element).parents('.control-group').addClass('success');
		}
	});

	var form = $('#form_id');
	$('input', form).focus(function() {
		if ($('#error').html().length>0)
			$('#error').empty().parent('div').hide();
	});
	
	form.submit(function(e) {
		e.preventDefault();
		
		if(!validator.form()) {
			form.find('.control-group').removeClass('success').addClass('error');
			return false;
		}

		$.ajax({
			type: form.attr('method'),
			url: form.attr('action'),
			data: form.serialize() + '&js_check=1',
			beforeSend: function() {
				$('button:submit', form).attr('disabled', true).next('img').fadeIn();
			},
			success: function(succ) {
				if(succ == 'Y')
					alert('success');
					//document.location.href='index.php';
				else {
					var msg = "登录信息不正确，请重新输入。";
					$('#error').html(msg).parent('div').fadeIn(100);
				}
				$('button:submit', form).attr('disabled', false).next('img').fadeOut();
			}
		});
		return false;
	});
	
	if( $.cookie("dixi[username]") && $.cookie("dixi[password]") ) {
		$('#username').val($.cookie("dixi[username]"));
		$('#password').val($.cookie("dixi[password]"));	
		$('#rememberme').attr('checked', true);
	}
	else {
		$('#rememberme').attr('checked', false);
	}
	
});
</script>
<?php
}

function check()
{
    $username = strtolower(trim($_POST['username']));
    $password = strtolower($_POST['password']);
    $rememberme = isset($_POST['rememberme']) ? true : false;
    
    if (strcmp($username, 'adminadmin')==0 && strcmp($password, 'dixi123456')==0) {
		if($rememberme) {
			$expire = time() + 1728000; // Expire in 20 days
			setcookie('dixi[username]', $username, $expire);
			setcookie('dixi[password]', $password, $expire);
		}
		else {
			setcookie('dixi[username]', NULL);
			setcookie('dixi[password]', NULL);
		}
    	return true;
    }
	else {
		if(! $rememberme) {
			setcookie('dixi[username]', NULL);
			setcookie('dixi[password]', NULL);
		}
	}
    return false;
}
?>
