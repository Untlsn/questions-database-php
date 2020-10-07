<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pytanie</title>
    <style>*{padding:0;margin:0;box-sizing:border-box}body,html{font-family:Arial,Helvetica,sans-serif;color:#fff;overflow:hidden;background-color:#2f3237}.head{border-top:20px solid #ed6c65;text-align:center;font-size:30px}.main{padding:0 15vw}.contents{margin:50px 0 20px}.form{display:flex;flex-direction:column}.form>label{margin:5px 0}label>input{margin:0 10px}.submit-button{width:20%;margin:0 auto;margin-top:50px;background-color:transparent;border:2px solid rgba(255,255,255,.8);border-radius:5px;padding:5px;color:#fff;font-family:Arial,Helvetica,sans-serif}.submit-button:hover{transition:2s;border:2px solid #fff;background-color:rgba(255,255,255,.1);cursor:pointer}</style>
</head>
<body>
    <div class="head">Pytanie</div>
    <div class="main">
        <?php
            require('./src/quest.serve.php');
            $serve = new QuestServe();
            $serve->getContents()->prepereAnswers();
        ?>
    </div>
</body>
</html>