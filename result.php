<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wynik</title>
</head>
<body>
    <?php
        require('./src/result.serve.php');
        
        $serve = new ResultServe();
        $serve->getAnswer()->checkAnswer();

    ?>
</body>
</html>