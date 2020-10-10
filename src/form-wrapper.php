<?php


class FromWrapper {
    private $answer;

    function __construct() {
        $this->answer = count($_POST) > 0
            ? $_POST['answer']
            : 'null';
    }

    function getAnswer() {
        return $this->answer;
    }
}