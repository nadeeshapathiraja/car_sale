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
						<h3> <?=$L["car_list"] ?> </h3>
						<table class="table">
							<tr>
								<th> <?=$L["id"] ?> </th>
								<th> <?=$L["photo"] ?> </th>
								<th> <?=$L["title"] ?> </th>
								<th> <?=$L["sold"] ?> </th>
								<th> <?=$L["view_count"] ?> </th>
								<th> <?=$L["options"] ?> </th>
							</tr>
							<?php
								//1. DB Connection
								include_once('../includes/db.php');
								//2. SQL Statement
								$sql = "SELECT * FROM car";
								//3. Query Execute and Get the Result
								$result = mysqli_query($con, $sql);
								//4. Loop the Result to Display
								while($row = mysqli_fetch_array($result) ){
							?>
							<tr>
								<td> <?=$row["id"]?> </td>
								<td> 
								<img width="150" src="<?=$BASE_URL ?><?=$row["photo"]?>" class="img img-thumbnail"/>
								</td>
								<!-- <td> <?php echo $row["title"]; ?></td> these two are same -->
								<td> <?=$row["title"]?></td>
								<!-- (Condition )?"1":"2"true=1;false=2 -->
								<td> <?=($row["sold"]==0)?"PENDING":"SOLD"?> </td>
								<td> <?=$row["view_count"]?> </td>
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
