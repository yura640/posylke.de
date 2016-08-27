<!doctype html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Result</title>
		<?php $this->registerJsFile('js/myscript.js'); ?>
	</head>
	
	<body>

		<h1>The BEST players</h1>

		<input type="button" id ='again' class="my_button" value="Play Again" />
		<input type="button" id ='exit' class="my_button" value="EXIT" />

			<table class = 'table'>
				<th>name</th> <th>age</th> <th>score</th>
					<?php if (!empty($rows)):?>
						<?php foreach ($rows as $row):?>
							<tr>
								<td><?=($row->name);?></td>
								<td><?=($row->age);?></td>
								<td><?=($row->score);?></td>
							</tr>
						<?php endforeach ;?>
					<?php endif ;?>
			</table>

	</body>
</html>

