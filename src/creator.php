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
        echo '
        <div class="head">Pytanie</div>
        ';
        return $this;
    }
    function getList($unbutton = false) {
        echo '
            <ol style="list-style-type: none">
        ';
        $answers = $this->question->getAnswers();
        foreach($this->sequence as $key) {
            echo "<li>";
            echo $unbutton
                ? "<p class='answer-tag'>{$answers[$key]}</p>"
                : "<input type='submit' value='{$answers[$key]}' name='answer' class='answer-tag answer-button'>";

            echo "</li>";
        }
        echo '
            </ol>
        ';
        return $this;
    }
    function getContent() {
        echo "
            <h3 class='content'>
                <p>
                    {$this->question->getContent()}:
                </p>
            </h3>
        ";
        return $this;
    }
    function getFormStart() {
        echo "
            <form 
                class='main' 
                action='result?id={$this->question->getId()}&seq={$this->getSequence()}' 
                method='post'>
        ";              
        return $this;
    }
    function getFromEnd() {
        echo '</form>';
        return $this;
    }

    function getFormSupstitieStart() {
        echo "
            <div class='main'>
        ";
        return $this;
    }
    function getFormSupstitieEnd() {
        echo "
            </div>
        ";
        return $this;
    }

    function getReloadButton() {
        echo "
            <div class='submit-a-container'>
                <a href='./quest.php' class='submit-a'>
                    Przejdz do kolejengo pytania
                </a>
            </div>    
        ";
        return $this;
    }

    function prompt($data, $in = 'div', $addClass = '') {
        echo "
            <$in class='$addClass'>
                $data
            </$in>
        ";
        return $this;
    }
}