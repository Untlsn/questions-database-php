<?php
    $action = "result?id={$this->question->getId()}&seq={$this->getSequence()}" 
?>

<form 
    class="main" 
    action="<?php echo $action ?>"
    method="post">