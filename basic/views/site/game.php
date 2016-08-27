
<!doctype html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>HTML5 шаблон</title>
		<?php $this->registerJsFile('js/myscript.js'); ?>
	</head>

	<body>
		
		<div>
			<input type="button" id ='again' class="my_button" value="Play Again" />
			<input type="button" id ='gohome' class="my_button" value="Back to Home Page" />

			<span>
				<div class="status">Persent to VICTORI:</div>
				<div id ='vict'></div>
			</span>
			<span>
				<div class="status">Persent to LOST :</div>
				<div id ='loss'></div>
			</span><br>

			<h3>Hello, <?=$name?> !</h3><hr>

			<h1>Your Scores</h1>
			<div id = 'container' class = 'div'></div>
				<h1>Type of Card</h1>
				<div id = 'card' class = 'div'></div>

			<input type="button" id ='target' class="my_button" value="Take a card" />
			<input type="button" id ='next' class="my_button" value="Enough" />

		</div>
	</body>
</html>