<?php 
	$this->load->view('header');
	echo '<h1>'.$title.'</h1>';
	echo '<ul>';
	//echo count($items);

	foreach ($items as $i) {
		echo '<li><p>Name:'.$i['product'].' Price:'.$i['price'].'</p></li>';
	}
	echo '</ul>';
	$this->load->view('footer');
 ?>