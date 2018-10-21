<!DOCTYPE html>
<html>
<head>
    <?php
    $title ="Produk Gagapan Bali";
    require_once "view/v_head.php";
    ?>
</head>

<body>

<!--NAVBAR-->
    <?php
    require_once "view/v_navbar.php";
    ?>
<!--END NAVBAR-->

	<div class="container">
		<?php
		require_once "controller/c_product.php";
		?>
	</div>
</body>
</html>