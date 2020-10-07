<?php

class QuestionRequester { // TODO(Rarządzanie pytaniami)
    public $connection;
    public $question;

    function __construct() {
    
        $serverName = 'localhost';
        $userName = 'php_user';
        $password = 'php_user_password';
        $dbName = 'questions';

        $this->connection = mysqli_connect(
            $serverName, $userName, $password, $dbName
        );
    }


    function getQuestion(int $questionID) { // TODO:(Pobieranie pytania z bazy)
        return $this->selectFromDataBase(
            "SELECT * FROM questions.questions WHERE id = $questionID"
        );
    }

    function getNumberOfRows() {
        return $this->selectFromDataBase(
            "SELECT COUNT(*) FROM questions.questions"
        );
    }

    function selectFromDataBase($select) {
        return $this->connection->query($select)->fetch_assoc();
    }

    function drawQuestion() { // TODO:(Losowanie pytania)
        $numberOFRows = $this->getNumberOfRows()['COUNT(*)'];
        $randomNumber = rand(1, $numberOFRows);
        $drawQuestion = $this->getQuestion($randomNumber);
        $this->question = [
            'id' => $drawQuestion['id'],
            'contents' => $drawQuestion['contents'],
            'answers' => [
                'a' => $drawQuestion['answer_a'],
                'b' => $drawQuestion['answer_b'],
                'c' => $drawQuestion['answer_c'],
                'd' => $drawQuestion['answer_d']
            ]
        ];
    }

    function checkAnswer($answer, $id) { // TODO:(Sprawdzenie poprawności odpowiedzi)
        $drawQuestion = $this->getQuestion($id);

        return $answer == $drawQuestion['good_answer'];
    }


}