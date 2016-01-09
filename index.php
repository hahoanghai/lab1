<?php
	$position = $_GET['board'];
	$squares = str_split($position);

	if (winner('x',$squares)) 
		echo 'X win.';
	else if (winner('o',$squares)) 
		echo 'O win.';
	else 
		echo 'No winner yet.';

	function winner($token,$position) {
		$won = false;

		for($row=0; $row<3; $row++) {
			$won = true;
			for($col=0; $col<3; $col++){
				if ($position[3*$row+$col] != $token) {
					$won = false; 
				}
			}
			if($won)
				return $won;
		}
	return $won;
	}
?>