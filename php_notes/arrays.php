<?php
$dir = "images";
if(is_dir($dir)) {
    //echo $dir .' directory found!';
    $files = scandir($dir);

    function pre_r($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

    pre_r($files);
} else {
    echo 'No such directory';
}

//foreach(glob("*.png") as $filename) {
//    header("content-type: text/plain");
//    echo $filename . "size" . filesize($filename) . "\n";
//}
