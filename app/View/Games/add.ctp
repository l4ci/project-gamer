<h1>Add Game</h1>
<?php
echo $this->EnumForm->create('Game');
echo $this->EnumForm->input('title');
echo $this->EnumForm->input('description');
echo $this->EnumForm->input('link');
echo $this->EnumForm->input('type');
echo $this->EnumForm->end('Save Game');
?>
