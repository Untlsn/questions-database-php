<?php

class PagePart {
    static function start() {
        require './page-part/start.html';
    }
    static function title($titleName) {
        echo "<title>$titleName</title>";
    }
    static function moveToBody() {
        require './page-part/move-to-body.html';
    }
    static function endFile() {
        require './page-part/end-file.html';
    }
    static function mainSide() {
        require './page-part/main-side.html';
    }
}