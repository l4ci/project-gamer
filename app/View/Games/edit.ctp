<h1>Edit Game: <?=h($game['Game']['title'])?></h1>
<?php
echo $this->Form->create('Game');
echo $this->Form->input('title');
echo $this->Form->end('Save Game');
?>
