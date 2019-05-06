<?php
	require 'config.php';

	$dsn = 'mysql:dbname='.$dbname.';host='.$dbhost.';charset=UTF8';
	

	try {
    $pdo = new PDO($dsn, $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
	    echo 'Connexion échouée : ' . $e->getMessage();
	}