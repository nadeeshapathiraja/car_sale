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
							$sql = "SELECT * FROM member WHERE member.id='$id'";
							//3. Query Execute and Get the Result
							$result = mysqli_query($con, $sql);
							//4. Loop the Result to Display
							if($row = mysqli_fetch_array($result) ){
				?>
				<div class="col-md-9">
					
                    

					<div class="card-body">

                    <img src="../<?=$row["photo"]?>" class="img img-thumbnail" style="width: 100%" >
					<hr/>
					<div class="row">

                           <p>Full Name: <?=$row["name"]?></p> 
                           <hr/> 
                            <p>Email: <?=$row["email"]?></p>
                            <p>Mobile Number: <?=$row["mobile"]?></p>
                            <hr/>
							<p>Join Date: <?=$row["join_date"]?></p>
                            <hr/>
                        
							
					</div>
						
				</div>
				
            </div>

            <?php
					}
            ?>
            
			<div class="row">
				<?php
					include_once("../includes/footer.php");
				?>
			</div>
			
		</div>
	</body>
</html>
