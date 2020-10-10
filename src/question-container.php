<?php

class QuestionContainer {
    private $id;
    private $contents;
    private $answer_a;
    private $answer_b;
    private $answer_c;
    private $answer_d;
    private $good_answer;

    function __construct($questionDataArray){
        if(sizeof($questionDataArray) == 6 | 7){
            [$this->id, $this->contents, $this->answer_a, $this->answer_b, $this->answer_c, $this->answer_d, $this->good_answer] = $questionDataArray;
        }
        else {
            throw new Exception('>ERROR questionDataArray is invalid lenght is '.sizeof($questionDataArray).' ERROR<');
        }
    }

    function getId() {
        return $this->id;
    }
    function getContent() {
        return $this->contents;
    }
    function getAnswers() {
        return [
            'a' => $this->answer_a,
            'b' => $this->answer_b,
            'c' => $this->answer_c,
            'd' => $this->answer_d
        ];
    }
    function getShuffleAnswers() {
        $arr = $this->getAnswers();
        shuffle($arr);
        return $arr;
    }
    function getGood() {
        return $this->good_answer;
    }

}