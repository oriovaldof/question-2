<?php
/**
 * @author Oriovaldo Fialho <oriovaldof@gmail.com>
 * @abstract Performs reading of folders and files according to the given path, and generates a list in an output file
 * @param string $pathOrigin
 * @param string $fileOutputName
 * @return void
 */
function recursive($pathOrigin, $fileOutputName = 'output.txt')
{

    if(!is_dir($pathOrigin)) die ("invalid folder");

    $file = fopen($fileOutputName,'w');

    if($file == false) die ('Could not create the file');

    $list = new RecursiveDirectoryIterator($pathOrigin);
    $recursive = new RecursiveIteratorIterator($list);

    $text = '';
    foreach ($recursive as $obj) {

        $fileName = $obj->getFilename();
        if($fileName == '.' || $fileName == '..') continue;
        $pathName = (!empty($obj->getPathname()))?$obj->getPathname():'';
        $text .= $pathName.$fileName . PHP_EOL;
    }

    fwrite($file,$text);

    if(fclose($file)){
        echo 'file create sucess';
    }
    
}

//Absolute path of the folder where the script will be applied
$path = '../question-3';

//execut script
recursive($path);
