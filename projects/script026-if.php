<!DOCTYPE html>
<html>
	<head>
		<title>PHP</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../_css/estilo.css">
	</head>
	<body>
		<div>
			<?php
				$a = isset($_GET["ano"])?$_GET["ano"]:1900;
				$i = date("Y") - $a;
				echo "Você nasceu em $a e terá $i anos.</br>";
				if($i >= 18){
					$v = "já pode votar";
					$d = "já pode dirigir.";
				}else{
					$v = "não pode votar";
					$d = "não pode dirigir.";
				}
				echo "Com essa idade você $v e também $d";
			?>
		</div>
	</body>
</html>