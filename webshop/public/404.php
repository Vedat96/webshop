<?php
	http_response_code(404);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style1.css">
    <title>404</title>
</head>
<body>
	<header>
		<nav class="container">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="info.php">Over ons</a></li>
			</ul>
		</nav>
		<div class="menu"><div>
		<div class="logo">
			<img src="images/logo.png" id="logo">
		</div>
	</header>
	<section id="content">
		<h1>Deze pagina is niet gevonden</h1>

		<button onclick="goBack()">Go Back</button>
		<script>
		function goBack() {
		    window.history.back();
		}
		</script>
	</section>
</body>
</html>