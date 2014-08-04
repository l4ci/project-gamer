<h1>Admin: Users</h1>

<?php echo $this->Html->link(
    'Add User',
    array('controller' => 'users', 'action' => 'add')
); ?>

<table>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Username</th>
		<th>Password</th>
		<th>Email</th>
		<th>Role</th>
		<th>Date Registered</th>
		<th>Last Login</th>
		<th>Action</th>
	</tr>

	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo $user['User']['id']; ?></td>
		<td><?php echo h($user['User']['name']); ?></td>
		<td>
			<?php echo $this->Html->link($user['User']['username'],
array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?>
		</td>
		<td><?php echo $user['User']['password']; ?></td>
		<td><?php echo h($user['User']['email']); ?></td>
		<td><?php echo h($user['User']['role']); ?></td>
		<td><?php echo $user['User']['created']; ?></td>
		<td><?php echo $user['User']['last_login']; ?></td>
		<td>
			<?php
					echo $this->Html->link(
					    'Edit',
					    array('controller' => 'users', 'action' => 'edit',$user['User']['id'])
					);
			    echo $this->Form->postLink(
			        'Delete',
			        array('action' => 'delete', $user['User']['id']),
			        array('confirm' => 'Are you sure?')
			    );

			    $action = ($user['User']['active'] ? 'activate' : 'deactivate');
			    echo $this->Form->postLink(
			        ($user['User']['active'] ? 'Deactivate' : 'Activate'),
			        array('action' => ($user['User']['active'] ? 'deactivate' : 'activate'), $user['User']['id']),
			        array('confirm' => 'Are you sure?')
			    );
			?>

		</td>
	</tr>
	<?php endforeach; ?>
	<?php unset($user); ?>
</table>
