<?php

class SideCreator {
    function createHomePage() {
        echo $this->readFile('./SideCreatorBase/home.html');
    }

    function readFile($filePath){
        $file = fopen($filePath, 'r');
        $result = fread($file, filesize($filePath));
        fclose($file);
        return $result;
    }
}