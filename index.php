<?php
require './src/url-syntezator.php';
require './src/style-includer.php';
require './src/page-part.php';
require './src/side-validator.php';

$urlSyn = new UrlSyntezator();
$sideName = $urlSyn->getLastUpper('EE. 09');
if(!SideValidator::nameIsInclude($sideName)):
    echo "Sorry. Side '$sideName' is not included";
else:
# BackEnd part
if($sideName != 'EE. 09') {
    require './src/speed-query.php';
    require './src/creator.php';

    $speed = new SpeedQuery('localhost', 'test', 'test_user_password');
    $creator = new Creator(
        $speed->getQuestionById(@$_GET['id']),
        @$_GET['seq']
    );
    unset($speed);
}
# FrotnEnd part
PagePart::start();
StyleIncluder::getByName($sideName); 
PagePart::title($sideName);
PagePart::moveToBody();
if($sideName == 'EE. 09') {
    PagePart::mainSide();
}
else {
    $creator
        ->getHeader()
        ->getFormStart()
        ->prompt(
            $sideName == 'Quest'
                ?"Pytanie nr.{$creator->question->getId()} - Wskaż poprawną odpowieź!"
                : '',
        'h2', 'is-good')
        ->getContent()
        ->getList($sideName == 'Quest')
        ->getFromEnd()
        ->getPjsCode($sideName);
    if($sideName == 'Result')
        $creator->getReloadButton();
}
PagePart::endFile();
    
endif;