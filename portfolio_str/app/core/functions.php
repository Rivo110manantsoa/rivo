<?php

function show($staff) {
    echo "<pre>";
    print_r($staff);
    echo "</pre>";
}

function remove_image($filename){
    if (file_exists($filename) && !is_dir($filename)) {
        unlink($filename);
    }
}

function redirect($link){   
    header("Location:" .ROOT. $link);
    die;
}