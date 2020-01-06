<!DOCTYPE html>
<?php
	$BASE_URL = "";
?>
<html>
	<head>
		<?php
			include_once("includes/head.php");
		?>
	</head>
	<body>
		<div class="container">
			<?php
				include_once("includes/header.php");
			?>
			<div class="row">
				<div class="col-md-3">
					<?php
						include_once("includes/sidebar.php");
					?>
				</div>
				<div class="col-md-9">
					<div class="jumbotron">
						<h1><?=$_GET["msg"] ?> </h1>
					</div>
				</div>
			</div>
			<div class="row">
				<?php
					include_once("includes/footer.php");
				?>
			</div>
			
		</div>
	</body>
</html>
