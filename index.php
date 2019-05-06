<?php
	require 'db.php';
	$reqMessages = 'SELECT * FROM messages ORDER BY id DESC limit 6';
	$state = $pdo->prepare($reqMessages);
	$state->execute();
	$messages = $state->fetchAll();
	$messages = array_reverse($messages, TRUE);
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
			<div class="offset-2 col-7">
				<?php foreach ($messages as $value) : ?>
				<?php 
					$date = new DateTime($value['datePost']);
					$date = $date->format('d/m/Y'); 
				?>
				<div class="my-2 border-bottom border-secondary messages">
					<p>
						Posté par <strong><?= $value['pseudo'] ?></strong> le <?= $date ?><br />
						<?= $value['msg'] ?>
					</p>
				</div>
				<?php endforeach ?>
			</div>
			<div id="form" class="offset-2 col-7 p-md-3">
				<form method="post" action="actionPost.php">
					<div class="row">
						<div class="form-group col-5">
							<input type="text" name="pseudo" class="form-control" placeholder="Pseudo">
						</div>
						<div class="form-group col-12">
							<label for="msg">Message</label>
							<textarea class="form-control" name="msg" rows="4" placeholder="Ton text à envoyer..."></textarea>
						</div>
					</div>
					<button class="btn btn-primary">Envoyer</button>
				</form>	
			</div>
		</div>
		
	</body>
</html>