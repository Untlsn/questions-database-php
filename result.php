<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pytanie</title>
    <link rel="stylesheet" href="quest.css">
    <?php
        require './src/speed-query.php';
        require './src/creator.php';
        require './src/form-wrapper.php';

        $mysqln = new MySqlN('localhost', 'test', 'test_user_password');
        $creator = new Creator(
            getQuestionById($mysqln, $_GET['id']),
            $_GET['seq']
        );
        unset($mysqln);
        $formWrapper = new FromWrapper();
    ?>
</head>
<body>
    <?php
        $creator
            ->getHeader()
            ->getFormSupstitieStart()
            ->prompt('', 'h2', 'is-good')
            ->getContent()
            ->getList($unbutton = true)
            ->getFormSupstitieEnd()
            ->getReloadButton()
        ;
    ?>
</body>
<script>
    const selected = '<?php echo $formWrapper->getAnswer() ?>';
    const good = '<?php echo $creator->question->getGoodAnswers() ?>';

    document.querySelector('.is-good').innerHTML = selected == good
        ? 'Tak jest! To jest prawidłowa odpowiedź!'
        : selected == 'null'
            ? 'Nie! Wybierz jakąkolwiek odpowiedź!'
            : 'Nie! To jest nieprawidłowa odpowiedź!'

    document.querySelectorAll('.answer-tag').forEach(button => {
        button.style.backgroundColor = button.innerText == good
        ? '#015501'
        : button.innerText == selected 
            ? '#690f10'
            : '#342c30'
    })
</script>
</html>