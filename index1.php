<?php
session_start();
require("includes/connection.php");
if(isset($_GET['page'])){
	$pages =  array('products','cart');
	if(in_array($_GET['page'], $pages)){
		$_page=$_GET['page'];
	}
	else {
		$_page= 'products';
	}
}
else {
	$_page = 'products';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
	<div id="container">
		<div id=main>
			<?php require($_page.".php");?>
		</div>
		<div id="sidebar">
			<h1 class="cart_header">Cart</h1>
			<?php
				if(isset($_SESSION['cart'])){
					$sql="SELECT * FROM product WHERE id_product IN(";
						foreach ($_SESSION['cart'] as $id => $value) {
							$sql.=$id.",";	
						}
						$sql=substr($sql, 0,-1).") ORDER BY name ASC";
						$query=mysqli_query($conn,$sql);
						?>
						<table>
						
						<?php
						while ($row=mysqli_fetch_assoc($query)) {
						?>
						<p>
						<tr>
							<td><?php echo $row['name'].":"?></td>
							<td><?php echo $_SESSION['cart'][$row['id_product']]['quantity']?></td>
						</tr>
						</p>
						<?php
						}
						?>
						<table>
						<hr/>
						<a href="index1.php?page=cart">Go to cart</a>
						<?php
				}
				else {
					echo "<p>your cart is empty</p>";
					
				}
			 ?>
		</div>
	</div>
</body>
</html>