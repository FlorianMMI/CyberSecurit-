<?php
require "controller.php";

session_start();

$res = destroySession();


header('Location: index.php', TRUE);

exit();
