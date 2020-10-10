<?php

class UrlSyntezator {
    public $url;
    function __construct(){
        $this->url = explode('/', $_SERVER['REQUEST_URI']);
        $this->url = array_filter($this->url);
    }
    function getLast($or = '') {
        $count = count($this->url);
        return $count == 0
            ? $or
            : explode('?', $this->url[$count])[0];
    }
    function getLastUpper($or = '') {
        return ucfirst($this->getLast($or));
    }
}