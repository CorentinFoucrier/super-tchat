<?php
	require 'db.php';
	if (!empty($_POST)) {

		$pseudoPost = htmlspecialchars($_POST['pseudo']);
		$msgPost = htmlspecialchars($_POST['msg']);

		$sql = 'INSERT INTO `messages` (`pseudo`, `msg`, `datePost`) 
				VALUES (:pseudo, :msg, CURRENT_DATE())';
		$state = $pdo->prepare($sql);
		$state->execute([
			':pseudo' => $pseudoPost,
			':msg' => $msgPost
		]);

	}
	header('Location: index.php');