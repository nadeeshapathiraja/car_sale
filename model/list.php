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
					<div class="jumbotron">
						<h3> <?=$L["model_list"] ?> </h3>
						<table class="table">
							<tr>
								<th> <?=$L["id"] ?> </th>
								<th> <?=$L["brand"] ?> </th>
								<th> <?=$L["name"] ?> </th>
								<th> <?=$L["options"] ?> </th>
							</tr>
							<?php
								//1. DB Connection
								include_once('../includes/db.php');
								//2. SQL Statement
								$sql = "SELECT  model.id,model.name,brand.name AS brand_name FROM model
											INNER JOIN brand ON brand.id=model.brand_id";
								//3. Query Execute and Get the Result
								$result = mysqli_query($con, $sql);
								//4. Loop the Result to Display
								while($row = mysqli_fetch_array($result) ){
							?>
							<tr>
								<td> <?=$row["id"]?> </td>
								<td> <?=$row["brand_name"]?></td>
								<td> <?=$row["name"]?> </td>
								<td> 
									<a href="edit.php?id=<?=$row["id"]?>" class="btn btn-warning"> EDIT </a>
									<a href="delete.php?id=<?=$row["id"]?>" class="btn btn-danger"> DELETE </a>
								</td>
							</tr>
							<?php
								}
							?>
						</table>
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
