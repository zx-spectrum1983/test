<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$DBhost = "localhost";
$DBname = "inv";
$DBuser = "inv";
$DBpass = "azino777";

if (isset($_GET['t']) && $_GET['t']!="") $BaseTempl = $_GET['t'];
else $BaseTempl = "index";

if (isset($_GET['a']) && $_GET['a']!="")  {
    include_once "./action/".$_GET['a'].".php";
    $tags['body'] = $template;
    }

// готовим шаблон
$templs = scandir("./templ");
foreach ($templs as $val) {
    if (preg_match("/.html$/i", $val)) {
	$tags[basename($val, ".html")] = file_get_contents("./templ/".$val);
	}
    }
preg_match_all("/\[\*(.*)\*\]/", $tags[$BaseTempl], $itags, PREG_PATTERN_ORDER);
foreach ( $itags[1] as $val) {
    $tags[$BaseTempl] = preg_replace("/\[\*".$val."\*\]/", $tags[$val], $tags[$BaseTempl]);
    }
if (isset($_GET['a']) && $_GET['a']!="")  {
    include_once "./action/".$_GET['a'].".php";
    $tags['body'] = $template;
    }
echo $tags[$BaseTempl];

//var_dump($itags[1]);


//var_dump($tags);

//$content = file_get_contents("./templ/index.html");



//echo $content;

?>