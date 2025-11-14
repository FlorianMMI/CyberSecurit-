<?php
require "controller.php";

require "mysession.php";
$handler = new MySessionHandler;
session_set_save_handler($handler, true);

session_start();

$res = destroySession();


header('Location: index.php', TRUE);

exit();
