<?php
	if(isset($_GET['board'])){
		$position = $_GET['board'];
		$squares = str_split($position);
		$game = new Game($squares);
		if ($game­ -> winner('x') )
			echo 'You win. Lucky guesses!';
		else if ($game­->winner('o'))
			echo 'I win. Muahahahaha';
		else
			echo 'No winner yet, but you are losing.';
	}
	display();

	function display() {
		echo '<table cols=”3” style=”font­size:large; font­weight:bold”>';
		echo '<tr>'; // open the first row
		for ($pos=0; $pos<9;$pos++) {
			echo '<td>­-</td>';
			if ($pos %3 == 2) 
				echo '</tr><tr>'; // start a new row for the next square
		}
		echo '</tr>'; // close the last row
		echo '</table>';
	}

	class Game {
		var $position;
		//var $newposition;
		function __construct ($squares) {
			$this -> position = $squares;
		}

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

		function show_cell($which) {
			$token = $this­->position[$which];// deal with the easy case
			if ($token <> '­--') 
				return '<td>'.$token.'</td>';
			// now the hard case 
			$this->newposition = $this­->position; 
			// copy the original
			$this­->newposition[$which] = 'o'; 
			// this would be their move
			$move = implode($this­->newposition); 
			// make a string from the board array
			$link = '/?board='.$move; 
			// this is what we want the link to be
			// so return a cell containing an anchor and showing a hyphen
			return '<td><a href=”'.$link.'”>­</a></td>';
		}
	}
?>
