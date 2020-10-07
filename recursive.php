<?php
/**
 * @author Oriovaldo Fialho <oriovaldof@gmail.com>
 *
 * @param [type] $path
 * @param string $output
 * @return void
 */
function recursive($pathOrigin, $fileOutputName = 'output.txt')
{
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

$path = '../question-3';

recursive($path);
