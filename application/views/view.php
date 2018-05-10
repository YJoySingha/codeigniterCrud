<?php include_once('header.php'); ?>
<div id="container" style="margin:55px;">
	<h2>View Post</h2>
	<h4>Id</h4>
	<p><?php echo $posts ->crudId ?></p>
	<h4>Name</h4>
	<p><?php echo $posts ->crudName ?></p>
	<h4>Email</h4>
	<p><?php echo $posts ->crudEmail ?></p>
	<h4>Date</h4>
	<p><?php echo $posts ->crudUpdate ?></p>
	<?php echo anchor("welcome",'Back',['class'=>'btn btn-danger']); ?>
</div>

