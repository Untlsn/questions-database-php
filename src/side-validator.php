<?php

class SideValidator {
    static $names = [
        'EE. 09',
        'Quest',
        'Result'
    ];
    static function nameIsInclude($name) {
        return in_array($name, self::$names);
    }
}