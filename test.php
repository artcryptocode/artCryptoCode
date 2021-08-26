<?php
$id = $argv['1'] ?? $_GET['id'] ?? '0000';
ini_set("highlight.comment", "#0000ff");
ini_set("highlight.default", "#0000ff");
ini_set("highlight.html", "#0000ff");
ini_set("highlight.keyword", "#0000ff; font-weight: bold");
ini_set("highlight.string", "#0000ff");


$file = "cryptocode_".$id.".html";
$a = file_get_contents($file);
$a .= "<!--punk #$id -->
</div>";
highlight_string($a);
echo "<div class='img'>$a</a>";
?>