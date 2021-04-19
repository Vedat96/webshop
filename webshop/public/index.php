<?php 									//hier open ik php
	include "../boot.php";					// importeer boot.php

	// SELECT * FROM products ORDER BY id DESC LIMIT 3
	// resultaat
	// fetch

	$database = db();						
	$products = $database->prepare('SELECT * FROM products ORDER BY id DESC LIMIT 3');

	try{
		$products->execute([]);
		$products->setFetchMode(PDO::FETCH_ASSOC);
		$products= $products->fetchAll();
	}
	catch(Exception $e){
		http_response_code(500);
		dd($e->getMessage());
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style1.css">
    <title>Game Store</title>
</head>
<body>
	<header>
		<nav class="container">
			<ul>
				<li><a class="top">Home</a></li>
				<li><a href="info.php">Over ons</a></li>
			</ul>
		</nav>
		<div class="menu"><div>
		<div class="logo">
			<img src="images/logo.png" id="logo">
		</div>
	</header>
	<section id="content">
		<?php foreach ($products as $product) { ?>	
			<div class="product">
				<a href="<?php echo asset('product/'.$product['slug']);?>" style="text-decoration: none;">
					<H1 class="product-title"><?php echo $product["title"];?></H1>
					<img src="images/<?php echo $product["image"]; ?>">
	        	</a>
				<H2 class="product-price">€<?php echo $product["price"];?> </style></H2>
				<div class="product-button"><button type="button" class="add-to-cart" data-url="cart/add.php?id=<?php echo $product['id']; ?>">Add to cart</button><br></div>
		    </div>
		<?php } ?>
		<aside class="bucket" id="bucket">
			<?php include "partials/bucket.php"; ?>	
		</aside>
	</section>



	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="<?php echo asset('js/app.js'); ?>"></script>
</body>
</html>