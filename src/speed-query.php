<?php

require('./src/mysqln.php');
require('./src/question-container.php');

class SpeedQuery {
    private $mysqln;
    function __construct($server, $name, $password){
        $this->mysqln = new MySqlN($server, $name, $password);
    }
    function countQuestions() {
        return $this->mysqln->queryOne('SELECT COUNT(*) FROM questions.questions')[0];
    }
    function getRandomQuestionId() {
        return rand(1, $this->countQuestions());
    }
    function getQuestionById($id = null) {
        return $id == null
            ? $this->getRandomQuestion()
            : new QuestionContainer($this->mysqln->queryOne("SELECT * FROM questions.questions WHERE id = $id"));
    }
    function getRandomQuestion() {
        $id = $this->getRandomQuestionId();
        return $this->getQuestionById($id);
    }
    function __destruct(){
        unset($this->mysqln);
    }
}
