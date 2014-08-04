<h1><?php echo h($user['User']['username']); ?></h1>
<h2><?php echo h($user['User']['name']); ?></h2>

<p>ID: <?php echo h($user['User']['id']); ?></p>

<p>Password: <?php echo $user['User']['password']; ?></p>
<p>Email: <?php echo h($user['User']['email']); ?></p>
<p>Registered: <?php echo $user['User']['created']; ?></p>
<p>Last Login: <?php echo $user['User']['last_login']; ?></p>


<?php echo $this->Html->link(
    'Edit',
    array('controller' => 'users', 'action' => 'edit',$user['User']['id'])
); ?>

<?php
    echo $this->Form->postLink(
        'Delete',
        array('action' => 'delete', $user['User']['id']),
        array('confirm' => 'Are you sure?')
    );
?>
