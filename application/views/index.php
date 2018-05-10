<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include_once('header.php'); ?>
<body>

<div id="container">
	<h1 style="text-align:center; color:green;">Welcome to CodeIgniter Crud!</h1>
	<h1>View</h1>
	<?php if($msg = $this->session->flashdata('msg')): ?>
	<?php echo $msg; ?>
	<?php endif; ?>
	<?php echo anchor('create','Add Post',['class'=>'btn btn-primary']); ?>
	<table class="table table-striped table-hover ">
	<thead>
		<tr>
		<th>Id</th>
		<th>Title</th>
		<th>Email</th>
		<th>Update Date</th>
		<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($post as $dataView): ?>
		<tr>
			<td><?= $dataView-> crudId ; ?></td>
			<td><?= $dataView-> crudName ; ?></td>
			<td><?php echo $dataView-> crudEmail ; ?></td>
			<td><?php echo $dataView-> crudUpdate ; ?></td>
			<td>
			<?php echo anchor("view/{$dataView-> crudId}",'View',['class'=>'btn btn-primary']); ?>
			<?php echo anchor("update/{$dataView-> crudId}",'Update',['class'=>'btn btn-success']); ?>
			<?php echo anchor("delete/{$dataView-> crudId}",'Delete',['class'=>'btn btn-danger']); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

</div>

</body>
</html>
