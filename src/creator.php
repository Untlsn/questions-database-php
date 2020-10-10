<?php

class Creator {
    public $question;
    public $sequence;
    function __construct(QuestionContainer $question, $preSequence = null) {
        $this->question = $question;
        if($preSequence == null) {
            $this->sequence = ['a', 'b', 'c', 'd'];
            shuffle($this->sequence);
        }
        else {
            $this->sequence = str_split($preSequence, 1);
        }
    }
    function getSequence() {
        return implode($this->sequence);
    }
    function getHeader() {
        require './creator/header.html';
        return $this;
    }
    function getList($unbutton = false) {
        $answers = $this->question->getAnswers();
        require $unbutton
            ? './creator/list-with-button.php'
            : './creator/list-with-p.php';
        return $this;
    }
    function getContent() {
        require './creator/content.php';
        return $this;
    }
    function getFormStart() {
        require './creator/form-start.php';              
        return $this;
    }
    function getFromEnd() {
        require './creator/form-end.html';
        return $this;
    }
    function getFormSupstitieStart() {
        require './creator/form-supstitie-start.html';
        return $this;
    }
    function getFormSupstitieEnd() {
        require './creator/form-supstitie-end.html';
        return $this;
    }

    function getReloadButton() {
        require './creator/reload-button.html';
        return $this;
    }

    function prompt($data, $in = 'div', $addClass = '') {
        echo 
        "<$in class='$addClass'>
            $data
        </$in>";
        return $this;
    }
}