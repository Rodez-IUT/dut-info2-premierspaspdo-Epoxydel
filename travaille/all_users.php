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

		/* déclaration pour enlevé un bug */
		$id = 0;
		$username = 0;
		$email = 0;
		$status = 0;
		
		echo "<h1> ALL USER</h1>";
		echo "<table><tr><th>Id</th><th>Username</th><th>Email</th><th>Status</th></tr>";
		
		/* Récupération des valeur de la table*/
		$stmt = $pdo->query('select users.id as user_id, username, email, s.name as status from users join status s on users.status_id = s.id');
		while ($user = $stmt->fetch()) {
			echo "<tr>";
			echo "<td>".$user['user_id']."</td>";
			echo "<td>".$user['username']."</td>";
			echo "<td>".$user['email']."</td>";
			echo "<td>".$user['status']."</td>";
			echo "</tr>";
		}
		echo "</table>";
		?>
	<body>
</html>