<?php
    $h = $_REQUEST["h"];
    $w = $_REQUEST["w"];
    $len = $_REQUEST["len"];
    $vol = $h*$w*$len;
    $heaters = floor($vol/20);
    echo $heaters;
?>