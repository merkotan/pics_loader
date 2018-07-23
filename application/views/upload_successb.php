<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Success upload!</title>
	<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>css/style.css' />
</head>
<body>
	<h2>Your file successfully uploaded!</h2>
	<div class="col-sm-2" id="file_info">
	<ul>
	<?php 
		foreach ($upload_data as $item => $value) {
			echo '<li>'.$item.'</li>';
		}


	$uploaddir = '../../images/';
	$uploadfile = $uploaddir.basename($_FILES['picfile']['name']);
	echo '
		</div>
		<div class="col-sm-8">
			';

	echo
	'<img src="'.$uploadfile.'" width="85%" height="85%" alt="'.$uploadfile.'" class="img-rounded">';
	 
	 ?>
	 <br/><br/>
	</div>
	</ul>
</body>
</html>