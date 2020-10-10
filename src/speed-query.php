<?php

require('./src/mysqln.php');
require('./src/question-container.php');

function countQuestions(MySqlN $mysqln) {
    return $mysqln->queryOne('SELECT COUNT(*) FROM questions.questions')[0];
}
function getRandomQuestionId(MySqlN $mysqln) {
    return rand(1, countQuestions($mysqln));
}
function getQuestionById(MySqlN $mysqln, $id) {
    return new QuestionContainer($mysqln->queryOne("SELECT * FROM questions.questions WHERE id = $id"));
}
function getRandomQuestion(MySqlN $mysqln) {
    $id = getRandomQuestionId($mysqln);
    return getQuestionById($mysqln, $id);
}
