<?php
session_start();
define('SITEROOT', './');
require_once(SITEROOT.'configs/common.inc.php');
require_once(SITEROOT.'configs/mini-app.inc.php');
global $common;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="<?=$common['charset'];?>" />
<title>
<?=$common['title'];?>
</title>
<meta name="description" content="<?=$common['desc'];?>" />
<meta name="keywords" content="<?=$common['keywords'];?>" />
<meta name="robots" content="<?=$common['robots'];?>" />
<link rel="stylesheet" type="text/css" href="<?=$common['css']['bootstrap'];?>" />
<script type="text/javascript" src="<?=$common['js']['jquery'];?>" ></script>
<script type="text/javascript" src="<?=$common['js']['bootstrap'];?>" ></script>
<script type="text/javascript" src="<?=$common['js']['ga'];?>" ></script>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="span6"><img src="http://www.placehold.it/460x300"> </div>
    <div class="span6"><img src="http://www.placehold.it/460x300"> </div>
  </div>
</div>
</body>
</html>
