<!DOCTYPE html>
<?php
	$BASE_URL = "../";
?>
<html>
	<head>
		<?php
			include_once("../includes/head.php");
		?>
	</head>
	<body>
		<div class="container">
			<?php
				include_once("../includes/header.php");
			?>
			<div class="row">
				<div class="col-md-3">
					<?php
						include_once("../includes/sidebar.php");
					?>
				</div>
				<div class="col-md-9">
					<div class="card">
					  <div class="card-header"><?=$L["brand_add_form"] ?></div>
					  <div class="card-body">
						<?php
						if(isset($_GET["error"])){
							echo "<div class='alert alert-danger'> ".$_GET["error"]."</div>";
						}
						?>
						<form action="add_action.php" method="post">
						  <div class="form-group">
							<label for="name"> <?=$L["name"]?>:</label>
							<input name="name" type="text" class="form-control" id="name">
						  </div>
						  
						  <button type="submit" class="btn btn-primary"> <?=$L["save"]?></button>
						</form>
					  </div> 
					</div>
				</div>
			</div>
			<div class="row">
				<?php
					include_once("../includes/footer.php");
				?>
			</div>
			
		</div>
	</body>
</html>
