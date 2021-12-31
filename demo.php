<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("max_execution_time", -1);

require("./lib/weihnachtsmilljoeh.php");
use Kotori\Weihnachtsmilljoeh as WM;

$wm = new WM(4.2*pow(10,18),4.5*pow(10,18));
$wm->calculate();

?>