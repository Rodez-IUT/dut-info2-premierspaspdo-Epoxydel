<!doctype html>
<html lang="fr">

	<head>
		<title> activite 2 </title>
		<meta charset="utf-8" />
	</head>
	<body>
		<?php
		/* Connections à la base de données */
			$host = 'localhost';
			$db   = 'my_activities';
			$user = 'root';
			$pass = 'root';
			$charset = 'utf8mb4';
			$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
			$options = [
				PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES   => false,
			];
			try {
				$pdo = new PDO($dsn, $user, $pass, $options);
			} catch (PDOException $e) {
				throw new PDOException($e->getMessage(), (int)$e->getCode());
			}
			
		/* Récupération des valeur de la table*/
		$stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
		$stmt->execute([$email, $status]);
		$id = $stmt->fetch();
		?>
		<h1> ALL USER</h1>
		<table>
			<tr>
				<th>Id</th>
				<th>Username</th>
				<th>Email</th>
				<th>Status</th>
			</tr>
			<?php 
				
			?>
		</table>
	<body>
</html>