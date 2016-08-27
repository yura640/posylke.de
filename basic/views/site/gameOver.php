<!doctype html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Over</title>
		<?php $this->registerJsFile('js/myscript.js'); ?>
	</head>
	<body>
		<h1>THE END</h1>
		
			<input type="button" id ='again' class="my_button" value="Play Again" />
			<input type="button" id ='showres' class="my_button" value="Show Results" />
			
			<h2>Your scores : <?= $score?></h2>
			<h2>Your Total scores : <?= $total?></h2>
			<h2>Game passed : <?= $games?></h2>
	</body>
</html>