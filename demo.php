<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("max_execution_time", -1);

require("./lib/weihnachtsmilljoeh.php");
use Kotori\Weihnachtsmilljoeh as WM;

$wm = new WM(1,2500);
$wm->calculate();

?>