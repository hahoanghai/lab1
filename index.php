<?php
	if(!isset($_GET['board'])){
		$squares ="---------";	
	}
	else{
		$position = $_GET['board'];
		$squares = str_split($position);
	}
		$game = new Game($squares);
		$game->display();
		if ($game -> winner('x') )
			echo 'You win. Lucky guesses!';
		else if ($game->winner('o'))
			echo 'I win. Muahahahaha';
		else
			echo 'No winner yet, but you are losing.';
	class Game {
		var $position;
		//var $newposition;
		function __construct ($squares) {
			$this -> position = $squares;
		}

		function winner($token) {
			//Check diagonal
			if (($this->position[0] == $token) && ($this->position[4] == $token) && ($this->position[8] == $token)) {
				return true;
			}
			if (($this->position[2] == $token) && ($this->position[4] == $token) && ($this->position[6] == $token)) {
				return true;
			}

			//Check horizontal
			for($row=0; $row<3; $row++) {
				$result = true;
				for($col=0; $col<3; $col++){
					if ($this->position[3*$row+$col] != $token) 
						$result = false; //note the negative test
				}
				if($result)
					return $result;
			}

			//Check vertical
			for($row=0; $row<3; $row++) {
				$result = true;
				for($col=0; $col<3; $col++){
					if ($this->position[$row+3*$col] != $token) 
						$result = false; //note the negative test
				}
				if($result)
					return $result;
			}
			return $result;
		}

		function display() {
			echo '<table cols=”3” style=”font­size:large; font­weight:bold”>';
			echo '<tr>'; // open the first row
			for ($pos=0; $pos<9;$pos++) {
				echo $this->show_cell($pos);
				if ($pos %3 == 2) 
					echo '</tr><tr>'; // start a new row for the next square
			}
			echo '</tr>'; // close the last row
			echo '</table>';
		}

		function show_cell($which) {
			$token = $this->position[$which];// deal with the easy case
			if ($token <> '­-') 
				return '<td>'.$token.'</td>';
			// now the hard case 
			$this->newposition = $this->position; 
			// copy the original
			$this->newposition[$which] = 'o'; 
			// this would be their move
			$move = implode($this->newposition); 
			// make a string from the board array
			$link = '/?board='.$move; 
			// this is what we want the link to be
			// so return a cell containing an anchor and showing a hyphen
			return '<td><a href=”'.$link.'”>­</a></td>';
		}
	}
?>
