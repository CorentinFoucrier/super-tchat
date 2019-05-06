<?php
	require 'db.php';
	$reqMessages = 'SELECT * FROM messages ORDER BY id DESC limit 6';
	$state = $pdo->prepare($reqMessages);
	$state->execute();
	$messages = $state->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>super tchat</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
	<body class="container mt-5">
		<div class="row">
			<div class="col-6">
				<form method="post" action="actionPost.php">
					<div class="row">
						<div class="form-group col-8">
							<input type="text" name="pseudo" class="form-control" placeholder="Pseudo">
						</div>
						<div class="form-group col-8">
							<label for="msg">Message</label>
							<textarea class="form-control" name="msg" rows="3"></textarea>
						</div>
					</div>
					<button class="btn btn-primary">Envoyer</button>
				</form>	
			</div>
			<div class="col-6">
				<?php foreach ($messages as $value) : ?>
				<?php 
					$date = new DateTime($value['datePost']);
					$date = $date->format('d/m/Y'); 
				?>
				<div class="py-2">
					<p>
						Posté par <strong><?= $value['pseudo'] ?></strong> le <?= $date ?><br />
						<?= $value['msg'] ?>
					</p>
				</div>
				<?php endforeach ?>
			</div>
		</div>
		
	</body>
</html>