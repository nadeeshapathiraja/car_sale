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
					  <div class="card-header"><?=$L["log_form"] ?></div>
					  <div class="card-body">
						
						<?php
						if(isset($_GET["error"])){
							echo "<div class='alert alert-danger'> ".$_GET["error"]."</div>";
						}
						?>
					  
						<form action="login_action.php" method="post">
						  <div class="form-group">
							<label for="email"> <?=$L["email"]?>:</label>
							<input name="email" type="email" class="form-control" id="email">
						  </div>
						  <div class="form-group">
							<label for="password"> <?=$L["password"]?>:</label>
							<input name="password" type="password" class="form-control" id="password">
						  </div>
						  <button type="submit" class="btn btn-primary"> <?=$L["login"]?></button>
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
