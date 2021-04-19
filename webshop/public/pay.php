<?php
	require '../boot.php';

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $variables = [
            'first_name' => ['required', 'name', 'min:2', 'max:100'],
            'suffix_name' => ['name', 'max:25'],
            'last_name' => ['required', 'name', 'min:2', 'max:100'],
            'country' => ['required', 'name', 'min:2', 'max:20'],
            'city' => ['required', 'name', 'min:2', 'max:100'],
            'street' => ['required', 'name', 'min:2', 'max:100'],
            'street_number' => ['required', 'number', 'min:1', 'max:5'],
            'street_suffix' => ['max:100'],
            'zipcode' => ['required', 'postcode', 'min:6', 'max:7'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'confirmed'],
        ];

        require '../app/validation/validation.php';

        if(count($errors) == 0) {

        	require '../app/payment/new.php';
        	// insert user
        	// insert order
        	// insert product_order
        	// mollie p../elen en betalen
        	// redirect naar betaling geslaagd/mislukt
        }
    }

    function value($key)
    {
    	return @$_POST[$key];
    }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style1.css">
    <title>registration</title>
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
	<form action="" method="POST">
	  	<div class="form">
		    <h1>Sign Up</h1>
		    <hr>
		    <div>
			    <label for="fname"><b>First name</b></label>
			    <input type="text" name="first_name" value="<?php echo value('first_name'); ?>"><br>
			    <?php echo (@$errors['first_name']) ? '<p class="text-danger">'.$errors['first_name'][0].'</p>' : ''; ?>
			</div>

			<div>
			    <label for="sname"><b>suffix name</b></label>
			    <input type="text" name="suffix_name" value="<?php echo value('suffix_name'); ?>"><br>
			    <?php echo (@$errors['suffix_name']) ? '<p class="text-danger">'.$errors['suffix_name'][0].'</p>' : ''; ?>
			</div>

			<div>
			    <label for="email"><b>Last name</b></label>
			    <input type="text" name="last_name" value="<?php echo value('last_name'); ?>"><br>
			    <?php echo (@$errors['last_name']) ? '<p class="text-danger">'.$errors['last_name'][0].'</p>' : ''; ?>
			</div>

			<div>
			    <label for="country"><b>Country</b></label>
			    <input type="text" name="country" value="<?php echo value('country'); ?>"><br>
			    <?php echo (@$errors['country']) ? '<p class="text-danger">'.$errors['country'][0].'</p>' : ''; ?>
			</div>

			<div>
			    <label for="city"><b>City</b></label>
			    <input type="text" name="city" value="<?php echo value('city'); ?>"><br>
			    <?php echo (@$errors['city']) ? '<p class="text-danger">'.$errors['city'][0].'</p>' : ''; ?>
			</div>

			<div>
			    <label for="street"><b>Street</b></label>
			    <input type="text" name="street" value="<?php echo value('street'); ?>"><br>
			    <?php echo (@$errors['street']) ? '<p class="text-danger">'.$errors['street'][0].'</p>' : ''; ?>
			</div>

			<div>
			    <label for="snumber"><b>Street number</b></label>
			    <input type="text" name="street_number" value="<?php echo value('street_number'); ?>"><br>
			    <?php echo (@$errors['street_number']) ? '<p class="text-danger">'.$errors['street_number'][0].'</p>' : ''; ?>
			</div>

			<div>
			    <label for="street-s"><b>Street suffix</b></label>
			    <input type="text" name="street_suffix" value="<?php echo value('street_suffix'); ?>"><br>
			   	<?php echo (@$errors['street_suffix']) ? '<p class="text-danger">'.$errors['street_suffix'][0].'</p>' : ''; ?>
			</div>

			<div>
			    <label for="zcode"><b>Zipcode</b></label>
			    <input type="text" name="zipcode" value="<?php echo value('zipcode'); ?>"><br>
			    <?php echo (@$errors['zipcode']) ? '<p class="text-danger">'.$errors['zipcode'][0].'</p>' : ''; ?>
			</div>

			<div>
			    <label for="email"><b>Email</b></label>
			    <input type="text" name="email" value="<?php echo value('email'); ?>"><br>
			    <?php echo (@$errors['email']) ? '<p class="text-danger">'.$errors['email'][0].'</p>' : ''; ?>
			</div>

			<div>
			    <label for="psw"><b>Password</b></label>
			    <input type="password" name="password"value=""><br>
			    <?php echo (@$errors['password']) ? '<p class="text-danger">'.$errors['password'][0].'</p>' : ''; ?>
			</div>

			<div>
				<label for="rep-psw"><b> Repeat Password</b></label>
			    <input type="password" name="password_confirmed"value="">
			</div>

		    <hr>
		    <div class="pay-button"><a href="geslaagd.php"><button type="submit">Go to pay</button></a></div>
		</div> 
	</form>
</body>
</html>