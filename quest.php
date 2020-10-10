<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pytanie</title>
    <link rel="stylesheet" href="quest.css">
    <?php
        require './src/speed-query.php';
        require './src/creator.php';

        $mysqln = new MySqlN('localhost', 'test', 'test_user_password');
        $creator = new Creator(
            getRandomQuestion($mysqln)
        );
        unset($mysqln);
    ?>
</head>
<body>
    <?php 
        $creator
        ->getHeader()
        ->getFormStart()
        ->prompt("Pytanie nr.{$creator->question->getId()} - Wskaż poprawną odpowieź!", 'h2', 'is-good')
        ->getContent()
        ->getList()
        ->getFromEnd();   
    ?>
</body>
</html>