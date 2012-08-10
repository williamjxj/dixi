<?php
// How to control charactor transfering?

//1. Here a very small but useful way to handle text files before further using them:
$in = file("/tmp/myfile.txt");
$out = fopen("/tmp/myfile.txt", "w");
foreach ($in as $line) {
  fputs($out, iconv("UTF-8","ISO-8859-1", $line));
}

?>