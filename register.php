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
					<div class="card">
					  <div class="card-header"><?=$L["reg_form"] ?></div>
					  <div class="card-body">
						
						<?php
						if(isset($_GET["error"])){
							echo "<div class='alert alert-danger'> ".$_GET["error"]."</div>";
						}
						?>
					  
						<form action="register_action.php" method="post" enctype="multipart/form-data">
						  <div class="form-group">
							<label for="name"> <?=$L["name"]?>:</label>
							<input name="name" type="text" class="form-control" id="name">
						  </div>
						  <div class="form-group">
							<label for="mobile"> <?=$L["mobile"]?>:</label>
							<input name="mobile" type="tel" class="form-control" id="mobile">
						  </div>
						  <div class="form-group">
							<label for="email"> <?=$L["email"]?>:</label>
							<input name="email" type="email" class="form-control" id="email">
						  </div>
						  <div class="form-group">
							<label for="password"> <?=$L["password"]?>:</label>
							<input name="password" type="password" class="form-control" id="password">
						  </div>
						  <div class="form-group">
							<label for="photo"> <?=$L["photo"]?>:</label>
							<input name="photo" type="file" class="form-control" id="photo">
						  </div>
						  <button type="submit" class="btn btn-primary"> <?=$L["register"]?></button>
						</form>
					  </div> 
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
