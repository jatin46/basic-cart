
<h1>View cart</h1> 
<a href="index.php?page=products">Go back to products page</a> 
<form method="post" action="index.php?page=cart"> 
      
    <table> 
          
        <tr> 
            <th>Name</th> 
            <th>Quantity</th> 
            <th>Price</th> 
            <th>Items Price</th> 
            <th>Remove Items</th>
        </tr> 
          
        <?php 
          
            $sql="SELECT * FROM product WHERE id_product IN(";
                        foreach ($_SESSION['cart'] as $id => $value) {
                            $sql.=$id.",";  
                        }
                        $sql=substr($sql, 0,-1).") ORDER BY name ASC";
                        $query=mysqli_query($conn,$sql);
                        ?>
                        <table>
                        
                        <?php
                        $totalprice=0;
                        while ($row=mysqli_fetch_assoc($query)) {
                        
                        $subtotal=$_SESSION['cart'][$row['id_product']]['quantity']*$row['price']; 
                        $totalprice+=$subtotal; 
        ?>
                        <tr> 

                            <td><?php echo $row['name'];?></td> 
                            <td><input type="text" name="quantity[<?php echo $row['id_product'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?>" /></td> 
                            <td><?php echo $row['price']." " ?>Rs.</td> 
                            <td><?php echo $_SESSION['cart'][$row['id_product']]['quantity']*$row['price']." " ?>Rs.</td> 
                        
                        </tr> 
                    <?php 

                          }
                    } 
        ?> 
                    <tr> 
                        <td colspan="4">Total Price: <?php echo $totalprice." " ?>Rs.</td> 
                    </tr> 
          
    </table> 
    <br /> 
</form> 
<br /> 