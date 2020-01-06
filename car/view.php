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
				<?php
							$id=$_GET['id'];
							//1. DB Connection
							include_once('../includes/db.php');
							//2. SQL Statement
							$sql = "SELECT *,car.photo AS car_photo FROM car INNER JOIN member ON member.id=car.member_id WHERE car.id='$id'";
							//3. Query Execute and Get the Result
							$result = mysqli_query($con, $sql);
							//4. Loop the Result to Display
							if($row = mysqli_fetch_array($result) ){
						?>
				<div class="col-md-9">
					<div class="card">
						<div class="card-header">
							<h1><?=$row["title"]?></h1>
						</div>

						<div class="card-body">
							<img src="../<?=$row["car_photo"]?>" class="img img-thumbnail" style="width: 100%" >
							<hr/>
							<div class="row">
								<div class="col-md-2">
									View Count: <?=$row["view_count"]?>
								</div>
								<div class="col-md-8">

								</div>
								<div class="col-md-2">
									Published: <?=$row["date"]?>
								</div>
							</div>
							<hr/>
							<p> <?=$row["description"]?></p>
							<hr/>
							<p>Milage: <?=$row["milage"]?></p>
							<p>Price: <?=$row["price"]?></p>
							<p>Fule Type: <?=$row["fuel_type"]?></p>
							<p>Year: <?=$row["year"]?></p>
							<p>Mobile Number: <?=$row["mobile"]?></p>
							<p>Year: <?=$row["year"]?></p>
						</div>
						
					</div>
				</div>

				<?php
					}
				?>
			</div>
			<div class="row">
				<?php
					include_once("../includes/footer.php");
				?>
			</div>
			
		</div>
	</body>
</html>
