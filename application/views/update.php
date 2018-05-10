<?php include_once('header.php'); ?>

<form method="post" action="<?php echo site_url('change/' .$posts -> crudId); ?>"  class="form-horizontal">
  <fieldset>
    <legend style="text-align:center;">Update Form</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Name:</label>
      <div class="col-md-4">
		<input type="text" name="crudName" class="form-control" id="inputName" placeholder="Name"
		value="<?php echo ($posts -> crudName); ?>">
	  </div>
	  <div class="col-md-4">
        <?php echo form_error('name','<div class="text-danger">','</div>');?>
      </div>
	</div>
	<div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Email</label>
      <div class="col-md-4">
		<input type="text" name="crudEmail" class="form-control" id="inputEmail" placeholder="Email"
		value="<?php echo ($posts -> crudEmail); ?>">
	  </div>
	  <div class="col-md-4">
        <?php echo form_error('email','<div class="text-danger">','</div>');?>
      </div>
	</div>
	<div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Date</label>
      <div class="col-md-4">
		<input type="date" name="crudUpdate" class="form-control" id="inputDate" placeholder="Date"
		value="<?php echo ( date($posts -> crudUpdate)); ?>">
	  </div>
	  <div class="col-md-4">
        <?php echo form_error('date','<div class="text-danger">','</div>');?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-4 col-md-offset-2">
		<?php echo anchor("welcome",'Cancel',['class'=>'btn btn-primary']); ?>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </fieldset>
</form>

