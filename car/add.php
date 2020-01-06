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
					  <div class="card-header"><?=$L["car_add_form"] ?></div>
					  <div class="card-body">
						<?php
						if(isset($_GET["error"])){
							echo "<div class='alert alert-danger'> ".$_GET["error"]."</div>";
						}
						?>
						<form action="add_action.php" method="post" enctype="multipart/form-data">
						  <div class="form-group">
							<label for="brand_id"> <?=$L["brand"]?>:</label>
							<select name="brand_id" class="form-control" id="brand_id">
								<?php
									//1. DB Connection
									include_once('../includes/db.php');
									//2. SQL Statement
									$sql = "SELECT * FROM brand";
									//3. Query Execute and Get the Result
									$result = mysqli_query($con, $sql);
									//4. Loop the Result to Display
									while($row = mysqli_fetch_array($result) ){
								?>
								<option value="<?=$row["id"]?>"> <?=$row["name"] ?> </option>

								<?php
									}
								?>
							</select>
						  </div>
						  
						  <div class="form-group">
							<label for="model_id"> <?=$L["model"]?>:</label>
							<select name="model_id" class="form-control" id="model_id">
								<?php
									//1. DB Connection
									include_once('../includes/db.php');
									//2. SQL Statement
									$sql = "SELECT * FROM model";
									//3. Query Execute and Get the Result
									$result = mysqli_query($con, $sql);
									//4. Loop the Result to Display
									while($row = mysqli_fetch_array($result) ){
								?>
								<option value="<?=$row["id"]?>"> <?=$row["name"] ?> </option>

								<?php
									}
								?>
							</select>
						  </div>
							
						  <div class="form-group">
							<label for="title"> <?=$L["title"]?>:</label>
							<input name="title" type="text" class="form-control" id="title">
						  </div>
						  
						  <div class="form-group">
							<label for="description"> <?=$L["description"]?>:</label>
							<textarea name="description" class="form-control" id="description"></textarea>
						  </div>
						  
						  <div class="form-group">
							<label for="price"> <?=$L["price"]?>:</label>
							<input name="price" type="text" class="form-control" id="price">
						  </div>
						  
						  <div class="form-group">
							<label for="fuel_type"> <?=$L["fuel_type"]?>:</label>
							<input name="fuel_type" type="text" class="form-control" id="fuel_type">
						  </div>
						  
						  <div class="form-group">
							<label for="milage"> <?=$L["milage"]?>:</label>
							<input name="milage" type="text" class="form-control" id="milage">
						  </div>
						  
						  <div class="form-group">
							<label for="year"> <?=$L["year"]?>:</label>
							<input name="year" type="text" class="form-control" id="year">
						  </div>

						  <div class="form-group">
							<label for="photo"> <?=$L["photo"]?>:</label>
							<input name="photo" type="file" class="form-control" id="photo">
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
