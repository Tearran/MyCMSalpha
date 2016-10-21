<?php 
$dirname = $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
echo $dirname."<br>";
echo realpath(dirname(__FILE__))."<br>";

echo $_SERVER["DOCUMENT_ROOT"] . "/dir/script_name.php<br>";
echo dirname(__FILE__) . "/dir/script_name.php<BR>";
?>