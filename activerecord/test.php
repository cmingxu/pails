<?php
require_once("./base.php");
require_once("./connection.php");

class Test extends Base{
}

$t = new Test;
echo Test::table_name();

echo Test::find(1);

?>
