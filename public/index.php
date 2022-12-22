<?php

ob_start();
include __DIR__ . "/../views/home.php";
$html = ob_get_clean();
echo $html;
