<?php

require('./ClientMacher');
require('./SideCreator');
require('./QuestionRequester');

class Serve {
    
    public $clientMacher;
    public $sideCreator;
    public $questionRequester;

    function __construct() {
        $this->clientMacher = new ClientMacher();
        $this->sideCreator = new SideCreator();
        $this->questionRequester = new QuestionRequester();
    }
}

