<?php

$THEMPLATE_SELECTED = "this_test/"; //change to db
$LOCAL_THEMPLATE_DIR = $_SERVER["DOCUMENT_ROOT"]."/MyCMSalpha/test/MyCMSalpha/template/".$THEMPLATE_SELECTED;	
$SERVER_THEMPLATE_DIR = '//'.$_SERVER["SERVER_NAME"].'/MyCMSalpha/test/MyCMSalpha/template/'.$THEMPLATE_SELECTED;
$ASSETS = $_SERVER["DOCUMENT_ROOT"]."/assets/";
$HOMEPAGE_NUM_ARTICLES = "5"; //number of articles to display
require "assets/class_article.php";
?>