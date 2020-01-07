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

					<?php

						$where="";
						$search="";
						$brand_id="";
						$model_id="";

						if(isset($_GET['search'])){
							$search=$_GET['search'];
							$where =" WHERE (car.title LIKE '%$search%' OR car.description LIKE '%$search%') ";	
						}
						
						if(isset($_GET['brand_id']) && $_GET['brand_id']!=""){
							$brand_id=$_GET['brand_id'];

							if($where){
								$where .=" AND model.brand_id='$brand_id' ";
							}else{
								$where .=" WHERE model.brand_id='$brand_id' ";
							}
							
						}

						if(isset($_GET['model_id'])&& $_GET['model_id']!=""){
							$model_id=$_GET['model_id'];

							if($where){
								$where .=" AND car.model_id='$model_id' ";
							}else{
								$where .=" WHERE car.model_id='$model_id' ";
							}
							
						}

						if(isset($_GET['page'])){
							$p=intval($_GET['page']);
							$start=($p-1)*4;
							$limit=" LIMIT $start,4";
						}
						

					?>

					<div class="jumbotron">
						<form action="" method="get">
							<div class="row">
								<input type="text" name="search" placeholder="Search" value="<?=$search?>" class="form-control col-md-3" >

								<select style="margin-left: 15px" name="brand_id" class="col-md-3">

									<option value="">All Brands</option>
								<?php
									//1. DB Connection
									include_once('includes/db.php');
									//2. SQL Statement
									$sql = "SELECT * FROM brand";
									//3. Query Execute and Get the Result
									$result = mysqli_query($con, $sql);
									//4. Loop the Result to Display
									while($row = mysqli_fetch_array($result) ){
										$selected="";
										if($brand_id==$row['id']){
											$selected='selected';
										}
										
								?>
									<option <?=$selected?> value="<?=$row['id']?>"><?=$row['name']?></option>
								<?php
									}
								?>
								</select>

								<select style="margin-left: 15px" name="model_id" class="col-md-3">
									<option value="">All Models</option>
								<?php
			
									//2. SQL Statement
									$sql = "SELECT * FROM model";
									//3. Query Execute and Get the Result
									$result = mysqli_query($con, $sql);
									//4. Loop the Result to Display
									while($row = mysqli_fetch_array($result) ){
										$selected="";
										if($model_id==$row['id']){
											$selected='selected';
										}
								?>
									<option <?=$selected?> value="<?=$row['id']?>"><?=$row['name']?></option>
								<?php
									}
								?>
								</select>
									
							</div>
							<input type="submit" value="Search">
						</form>
					</div>
					
					<?php
						
						//2. SQL Statement
						$sql = "SELECT car.*,model.name AS model_name,brand.name AS brand_name FROM car 
								INNER JOIN model ON model.id=car.model_id INNER JOIN brand ON brand.id=model.brand_id ".$where;
						
						//get this limited sql for control number of pages
						$limitedSql=$sql.$limit;
						//3. Query Execute and Get the Result
						$result = mysqli_query($con, $limitedSql);
						//4. Loop the Result to Display
						while($row = mysqli_fetch_array($result) ){
					?>
						<div class="jumbotron">
						
							<div class="row">
								<div class="col-md-3">
									<img src="<?=$row["photo"]?>" class="img img-thumbnail"/>
								</div>	
								<div class="col-md-9">
									<h3> <?=$row["title"]?> </h3>
									<p> Price: <?=$row["price"]?> </p>
									
									<p> Brand: <?=$row["brand_name"]?> </p>
									<p> Model: <?=$row["model_name"]?> </p>
									<a href="car/view.php?id=<?=$row["id"]?>" class="btn btn-success"> VIEW </a>
								</div>	
							</div>	
							
						</div>
					<?php
						}
					?>


					<?php

						$result = mysqli_query($con,$sql);

						$count = mysqli_num_rows($result);

						$pageCount= intval($count / 4);

						if($count%4>0){
							$pageCount++;
						}

					?>


					<div class="well">
						<ul class="pagination">
							<?php
								for($i=1;$i<=$pageCount;$i++){
							?>
						  		<li class="page-item"><a class="page-link" href="?page=<?=$i?>"><?=$i?></a></li>
						  	<?php
								}
							?>
						</ul>
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
