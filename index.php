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
		if (($position[0] == $token) && ($position[1] == $token) && ($position[2] == $token)) {
			$won = true;
		} 
		else if (($position[3] == $token) && ($position[4] == $token) && ($position[5] == $token)) {
			$won = true;
		}
		else if (($position[6] == $token) && ($position[7] == $token) && ($position[8] == $token)) {
			$won = true;
		}
		else if (($position[0] == $token) && ($position[4] == $token) && ($position[8] == $token)) {
			$won = true;
		}
		else if (($position[0] == $token) && ($position[3] == $token) && ($position[6] == $token)) {
			$won = true;
		}
		else if (($position[1] == $token) && ($position[4] == $token) && ($position[7] == $token)) {
			$won = true;
		}
		else if (($position[2] == $token) && ($position[5] == $token) && ($position[8] == $token)) {
			$won = true;
		}
		else if (($position[2] == $token) && ($position[4] == $token) && ($position[6] == $token)) {
			$won = true;
		}
	return $won;
	}
?>