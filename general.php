<?php
header('Content-Type: text/html; charset=utf-8'); 
if(isset($_GET)) {
	echo "<pre>"; print_r($_GET); echo "</pre>";
	if(isset($_GET['i']) && isset($_GET['n'])) {
	}
	elseif(isset($_GET['i'])) {
	}
	elseif(isset($_GET['n'])) {
	}
	elseif(isset($_GET['sitemap'])) {
	}
	else {
		echo "<pre>"; print_r($_GET); echo "</pre>";
	}
}
else {
	echo "ERRRRRRRRRRRRRRRRRRROORRRR";
}
?>