<h2>Winkelmand </h2>
<div class="bucket">
	<table class="table">
		<thead>
			<tr>
				<th><h3>Titel</h3></th>
				<th><h3></h3></th>
				<th><h3>Aantal</h3></th>
				<th><h3>Prijs</h3></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($_SESSION['cart']['products'] as $cartProduct) { ?>
			<tr>
				<td><?php echo $cartProduct['title']; ?></td>
				<td>
				<button type="button" class="add-to-cart" data-url="cart/add.php?id=<?php echo $cartProduct['id']; ?>">+</button> 
	            <button type="button" class="remove-from-cart" data-url="cart/remove.php?id=<?php echo $cartProduct['id']; ?>">-</button></td> 
				<td><?php echo $cartProduct['quantity']; ?></td>
				<td><?php echo $cartProduct['price']; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<h3>Subtotaal: <?php echo $_SESSION['cart']['total']; ?></h3>
	<a href="<?php echo asset('pay.php'); ?>"><button type="button">Order</button></a>
</div>