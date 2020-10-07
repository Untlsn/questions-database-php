<?php

require('./src/ClientMacher.php');
require('./src/SideCreator.php');
require('./src/QuestionRequester.php');

class QuestServe{
    
    public $clientMacher;
    public $sideCreator;
    public $questionRequester;

    function __construct() {
        $this->clientMacher = new ClientMacher();
        $this->sideCreator = new SideCreator();
        $this->questionRequester = new QuestionRequester();

        $this->questionRequester->drawQuestion();
    }

    function getContents() {
        echo '<div class="contents">';
        echo $this->questionRequester->question['contents'];
        echo '</div>';
        return $this;
    }

    function prepereAnswers() {
        echo '<form class="form" action="result.php?id='.
        $this->questionRequester->question['id'].
        '" method="post">';

        $answers = $this->questionRequester->question['answers'];

        $this->getRadio('a', $answers['a']);
        $this->getRadio('b', $answers['b']);
        $this->getRadio('c', $answers['c']);
        $this->getRadio('d', $answers['d']);

        echo '<input class="submit-button" type="submit" value="Potwierdź">';
        echo "</form>";

        return $this;
    }
    
    function getRadio(string $value, string $text) {
        echo "<label class=\"label\"><input type=\"radio\" name=\"answer\" value=\"$value\">$text</label>";
    }
}

