<ol style="list-style-type: none">
    <?php foreach($this->sequence as $key): ?>
        <input 
            type="submit" 
            value='<?php echo $answers[$key] ?>' 
            name="answer" 
            class="answer-tag answer-button">
    <?php endforeach ?>
</ol>