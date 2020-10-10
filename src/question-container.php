<?php

class QuestionContainer {
    private $id, $contents, $answer_a, $answer_b, $answer_c, $answer_d, $good_answer;

    function __construct($questionDataArray){
        [
            $this->id, 
            $this->contents, 
            $this->answer_a, 
            $this->answer_b, 
            $this->answer_c, 
            $this->answer_d, 
            $this->good_answer
        ] = $questionDataArray;
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
    function getGood() {
        return $this->good_answer;
    }
    function getGoodAnswers() {
        return $this->getAnswers()[$this->good_answer];
    }

}