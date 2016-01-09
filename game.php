<?php
	class Game {
		$position;
		function __construct ($squares) {
			$this -­> position = str_split($squares);
		}

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
				for($col=0; $col<3; $col++){
					if ($position[$row+3*$col] != $token) {
						echo $row+3*$col."<br/>";
						$won = false; 
					}
				}
				if($won)
					return $won;
			}
		return $won;
		}
	}



?>