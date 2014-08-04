<h1>Edit User: <?=h($user['User']['username'])?></h1>
<?php
echo $this->Form->create('User');
echo $this->Form->input('username');
echo $this->Form->input('name');
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->end('Save User');
?>
