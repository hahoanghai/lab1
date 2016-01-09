<?php
	$position = $_GET['board'];
	$squares = str_split($position);

	$game = new Game($squares);
	if ($game­>winner('x'))
		echo 'You win. Lucky guesses!';
	else if ($game­>winner('o'))
		echo 'I win. Muahahahaha';
	else
		echo 'No winner yet, but you are losing.';

?>