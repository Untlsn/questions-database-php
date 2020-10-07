<?php

require('./src/ClientMacher.php');
require('./src/SideCreator.php');
require('./src/QuestionRequester.php');

class ResultServe {
    
    public $clientMacher;
    public $sideCreator;
    public $questionRequester;
    public $postData;
    public $answer;

    function __construct() {
        $this->clientMacher = new ClientMacher();
        $this->sideCreator = new SideCreator();
        $this->questionRequester = new QuestionRequester();
    }

    function getAnswer() {
        $this->answer = sizeof($_POST) > 0 ? 
            $_POST['answer'] : '0';
        return $this;
    }

    function checkAnswer() {
        echo $this->questionRequester->checkAnswer($this->answer, $_GET['id'])? 'jest' : 'nie ma';
        return $this;
    }
}

