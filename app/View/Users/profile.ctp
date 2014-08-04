<h1><?php echo h($user['username']); ?></h1>
<h2><?php echo h($user['name']); ?></h2>

<p>ID: <?php echo h($user['id']); ?></p>

<p>Email: <?php echo h($user['email']); ?></p>
<p>Registered: <?php echo $user['created']; ?></p>
<p>Last Login: <?php echo $user['last_login']; ?></p>


<?php echo $this->Html->link(
    'Edit',
    array('controller' => 'users', 'action' => 'edit',$user['id'])
); ?>

<?php
    echo $this->Form->postLink(
        'Delete',
        array('action' => 'delete', $user['id']),
        array('confirm' => 'Are you sure?')
    );
?>
