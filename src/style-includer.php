<?php

class StyleIncluder {
    static function create(...$includeArr){
        foreach($includeArr as $include) {
            echo "<link rel='stylesheet' href='style/$include.css'>\n";
        }
    }
    static function getByName($name) {
        StyleIncluder::create('main');
        switch ($name) {
            case 'EE. 09':
                StyleIncluder::create('index');
                break;
            case 'Quest':
                StyleIncluder::create('quest', 'quest-and-result');
                break;
            case 'Result':
                StyleIncluder::create('result', 'quest-and-result');
                break;
        }
    }
}