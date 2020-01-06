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
					  <div class="card-header"><?=$L["brand_edit_form"] ?></div>
					  <div class="card-body">
						<?php
						if(isset($_GET["error"])){
							echo "<div class='alert alert-danger'> ".$_GET["error"]."</div>";
						}
						?>
                        <?php

                                $id=$_GET['id'];
								//1. DB Connection
								include_once('../includes/db.php');
								//2. SQL Statement
								$sql = "SELECT * FROM brand WHERE id='$id'";
								//3. Query Execute and Get the Result
								$result = mysqli_query($con, $sql);
								//4. Loop the Result to Display
								while($row = mysqli_fetch_array($result) ){
						?>
						<form action="edit_action.php" method="post">
						  <div class="form-group">

                            <label for="id"> <?=$L["id"]?>:</label>
                            <input readonly name="id" value="<?=$row["id"]?>" type="text" class="form-control" id="id">
                            </div> 
                            <div class="form-group">
							<label for="name"> <?=$L["name"]?>:</label>
							<input name="name" value="<?=$row["name"]?>" type="text" class="form-control" id="name">
                            </div>
						  
						  <button type="submit" class="btn btn-primary"> <?=$L["update"]?></button>
						</form>
                        <?php
							}
						?>
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
