<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>View</title>
	<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>css/style.css' />
</head>
<body>
	<?php 
	$i=1;
	foreach ($pictures as $p) {
	echo '<div class="pictures">
	<p class="img_name">Image #'.$i.'</p>
	<img src="'.$p['path'].'" width="200" height="120" alt="'.$p['path'].'"  />
	<p class="img_path"> <b>Path:</b>'.$p['path'].'</p>
	<p class="img_size"> <b>Size:</b>'.$p['size'].' kB</p>
	</div>';
	$i++;
}
?>
	
</body>
</html>