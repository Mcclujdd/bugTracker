<?php
define('__ROOT__',dirname(__FILE__));

session_start();

include(__ROOT__.'/scripts/mysqlAccess.php');

echo "$_SESSION";
?>
