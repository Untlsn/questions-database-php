<?php


class FromWrapper {
    private $answer;
    private $id;
    private $seq;

    function __construct() {
        $this->answer = @$_POST['answer'] ?? 'null';
        $this->id = @$_GET['id'] ?? 'null';
        $this->seq = @$_GET['seq'] ?? 'null';
    }
    function getAnswer() {
        return $this->answer;
    }
    function getId() {
        return $this->id;
    }
    function getSeq() {
        return $this->seq;
    }
}