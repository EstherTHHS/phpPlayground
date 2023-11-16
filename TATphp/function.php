<?php
function dd($value){
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

function base_path($file){
    return BASE_PATH . $file;
}