	<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>css/bootstrap.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>css/style.css' />
<?php echo form_open_multipart('load/blob_upload');?>
<div class="form-group">
	<label for="picfile">Choose a file to upload:</label>
	<input type="file" name="picfile" accept="image/*"  /><br/>
	<input type="submit" name="sub" value=" OK " class="btn btn-default">
	
</div>

</form>