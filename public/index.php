<?php

ob_start();
include __DIR__ . "/../views/layouts/main.php";
$layout = ob_get_clean();

ob_start();
include __DIR__ . "/../views/cruise.php";
$page = ob_get_clean();

$view =str_replace('{{content}}',$page,$layout);
echo $view;
