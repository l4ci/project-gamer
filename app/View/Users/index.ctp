<h1>Users <small><?php
echo $this->Html->link(
	'Admin View',
	array(
		'admin' => true
	)
);
?></small></h1>



<table>
	<tr>
		<th>Id</th>
		<th>Nick</th>
		<th>Password</th>
		<th>Email</th>
		<th>Date Registered</th>
		<th>Last Login</th>
	</tr>

	<!-- Here is where we loop through our $users array, printing out post info -->

	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo $user['User']['id']; ?></td>
		<td>
			<?php echo $this->Html->link($user['User']['nick'],
array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?>
		</td>
		<td><?php echo $user['User']['password']; ?></td>
		<td><?php echo $user['User']['email']; ?></td>
		<td><?php echo $user['User']['created']; ?></td>
		<td><?php echo $user['User']['date_last_logged_in']; ?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($user); ?>
</table>
