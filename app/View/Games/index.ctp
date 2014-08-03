<h1>Games <small><?php
echo $this->Html->link(
	'Admin View',
	array(
		'admin' => true
	)
);
?></small></h1>

<?php echo $this->Html->link(
    'Add Game',
    array('controller' => 'games', 'action' => 'add')
); ?>

<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $games array, printing out post info -->

    <?php foreach ($games as $game): ?>
    <tr>
        <td><?php echo $game['Game']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($game['Game']['title'],
array('controller' => 'games', 'action' => 'view', $game['Game']['id'])); ?>
        </td>
        <td><?php echo $game['Game']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($game); ?>
</table>

<?php echo $this->Html->link(
    'Add Game',
    array('controller' => 'games', 'action' => 'add')
); ?>
