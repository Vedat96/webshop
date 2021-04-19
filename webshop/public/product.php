<?php
    require "../boot.php";

    $database = db();

    $product = $database->prepare('SELECT * FROM products Where slug = :slug');

    try {
        $product->execute(['slug' => $_GET['slug']]);
        $product->setFetchMode(PDO::FETCH_ASSOC);
        $product = $product->fetch();
        if (! $product) {
            header('location:'.asset('404.php'));
        }
    }
    
    catch(Exception $e){
        http_response_code(500);
        dd($e->getMessage());
    }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo asset('style1.css'); ?>">
    <title>Game Store</title>
</head>
<body>
	<header>
		<nav class="container">
			<ul>
				<li><a href="<?php echo asset('index.php'); ?>">Home</a></li> 
				<li><a href="<?php echo asset('info.php'); ?>">Over ons</a></li>
			</ul>
		</nav>
		<div class="menu"><div>
		<div class="logo">
			<img src="<?php echo asset('images/logo.png'); ?> id="logo">
		</div>
	</header>

	<section id="content">
		<div class="product">
			<H1 class="product-title"><?php echo $product["title"];?></H1>
			<H3 class="product-price">€<?php echo $product["price"];?></H3>
			<H3 class="product-description"><?php echo $product["description"];?></H3>
			<div class="product-button"><button type="button" class="add-to-cart" id="" data-url="<?php echo asset('cart/add.php?id='.$product['id']); ?>">Add To Cart</button><br></div>
		    <img src="<?php echo asset('images/').$product["image"]; ?>">
	    </div>	
	</section>
	<aside class="bucket" id="bucket">
		<?php include "partials/bucket.php"; ?>	
	</aside>
	
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="<?php echo asset('js/app.js'); ?>"></script>
</body>
</html>