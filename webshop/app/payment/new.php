<?php
// try/catch

try {
    // transactie starten
    $connection = db();
    $connection->beginTransaction();

    // user aanmaken
    $query = 'INSERT INTO `users`
    (first_name, suffix_name, last_name, country, city, street, street_number, street_suffix, zipcode, email, password, created_at, updated_at)
    VALUES
    (:first_name, :suffix_name, :last_name, :country, :city, :street, :street_number, :street_suffix, :zipcode, :email, :password, :created_at, :updated_at)';

    $data = [
        'first_name' => standardizeName($_POST['first_name']),
        'suffix_name' => trim($_POST['suffix_name']),
        'last_name' => standardizeName($_POST['last_name']),
        'country' => $_POST['country'],
        'city' => standardizeName($_POST['city']),
        'street' => standardizeName($_POST['street']),
        'street_number' => $_POST['street_number'],
        'street_suffix' => trim($_POST['street_suffix']),
        'zipcode' => standardizePostcode($_POST['zipcode']),
        'email' => strtolower(trim($_POST['email'])),
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ];

    $user = $connection->prepare($query); // query voorbereiden
    $user->execute($data);

    $userId = $connection->lastInsertId();

	// order aanmaken
	$query = 'INSERT INTO orders
	(amount, payment_status, user_id, created_at, updated_at)
	VALUES
	(:amount, :payment_status, :user_id, :created_at, :updated_at)';

	$order = $connection->prepare($query); // query voorbereiden
	$order->execute([
	    'amount' => $_SESSION['cart']['total'],
	    'payment_status' => 'open',
	    'user_id' => $userId,
	    'created_at' => date('Y-m-d H:i:s'),
	    'updated_at' => date('Y-m-d H:i:s'),
	]);

	$orderId = $connection->lastInsertId();

	// product_order
	$query = 'INSERT INTO orders_products (order_id, product_id, price, quantity, created_at, updated_at)
	VALUES (:order_id, :product_id, :price, :quantity, :created_at, :updated_at)';

	$orderProduct = $connection->prepare($query); // query voorbereiden

	foreach ($_SESSION['cart']['products'] as $id => $product) {
	   
	    $orderProduct->execute([
	        'order_id' => $orderId,
	        'product_id' => $product['id'],
	        'price' => $product['price'],
	        'quantity'=> $product['quantity'],
	        'created_at' => date('Y-m-d H:i:s'),
	        'updated_at' => date('Y-m-d H:i:s'),
	    ]);
	}
    // transactie committen
    $connection->commit();
    // redirect
	header('Location: '.asset('geslaagd.php'));
}
catch (Exception $e) {
    // ERROR
    // rollback
    $connection->rollBack();

    dd($e->getMessage());

    $errors['main'] = 'Aanmaken order niet gelukt';
}


function standardizeName($string)
{
    return trim(ucfirst($string));
}

function standardizePostcode($postcode)
{
    return strtoupper(wordwrap($postcode, strlen($postcode)-2,' ', true));
}