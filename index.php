<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		#tong {
			width: 100%;
			height: 700px;
/*			background: black;*/
		}
		#tren {
			width: 100%;
			height: 20%;
/*			background: pink;*/
		}
		#giua {
			width: 100%;
			height: 73%;
/*			background: red;*/
		}
		#duoi {
			width: 100%;
			height: 7%;
/*			background: purple;*/
		}
	</style>
</head>
<body>
<div id="tong">
	<?php include 'menu.php' ?>
	<?php include 'products.php' ?>
	<?php include 'footer.php' ?>
</div>
</body>
</html>