<?php
session_start();
define('SITEROOT', '/');
require_once(SITEROOT.'../shared/common.inc.php');
require_once(SITEROOT.'../shared/mini-app.inc.php');
global $common;
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="<?=$common['charset'];?>" />
<title>
<?=$common['title'];?>
</title>
<meta name="description" content="<?=$common['desc'];?>" />
<meta name="keywords" content="<?=$common['keywords'];?>" />
<meta name="robots" content="<?=$common['robots'];?>" />
<link rel="stylesheet" type="text/css" href="<?=$common['css']['bootstrap'];?>" />
<link rel="stylesheet" type="text/css" href="css/dixi.css" />
<script type="text/javascript" src="<?=$common['js']['jquery'];?>" ></script>
<script type="text/javascript" src="<?=$common['js']['bootstrap'];?>" ></script>
<script type="text/javascript" src="<?=$common['js']['ga'];?>" ></script>
</head>
<body>
</body>
</html>
