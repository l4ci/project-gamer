<h1><?php echo h($game['Game']['title']); ?></h1>
<p>ID: <?php echo $game['Game']['id']; ?></p>
<p>Type: <?php echo h($game['Game']['type']); ?></p>
<p>Created: <?php echo $game['Game']['created']; ?></p>
<p><?php echo h($game['Game']['description']); ?></p>

<?php echo $this->Html->link(
    'Edit',
    array('controller' => 'games', 'action' => 'edit',$game['Game']['id'])
); ?>

<?php
    echo $this->Form->postLink(
        'Delete',
        array('action' => 'delete', $game['Game']['id']),
        array('confirm' => 'Are you sure?')
    );
?>
