<div class="card" >
	<?php

		
		if(isset($_SESSION['NAME'])){

	?>
		<img class="card-img-top" src="<?=$BASE_URL?><?=$_SESSION['PHOTO']?>" alt="Card image">
		<div class="card-body">
			<h4 class="card-title"><?=$_SESSION['NAME']?></h4>
			<p class="card-text"><?=$_SESSION['EMAIL']?></p>
			<div class="btn-group-vertical" style="width:100%;">
				<button type="button" class="btn btn-primary"><?=$L["dashboard"]?></button>

				<?php
					if($_SESSION['ROLE']=='a'){
				?>
					<a href="<?=$BASE_URL?>brand/list.php" class="btn btn-primary"><?=$L["brand_list"]?></a>
					<a href="<?=$BASE_URL?>model/list.php" class="btn btn-primary"><?=$L["model_list"]?></a>
					<a href="<?=$BASE_URL?>car/list.php" class="btn btn-primary"><?=$L["car_list"]?></a>
					<a href="<?=$BASE_URL?>member/list.php" class="btn btn-primary"><?=$L["member_list"]?></a>

				<?php
					}else if($_SESSION['ROLE']=='m'){
				?>
  
					<a href="<?=$BASE_URL?>car/list.php" class="btn btn-primary"><?=$L["car_list"]?></a>
					<a href="<?=$BASE_URL?>member/list.php" class="btn btn-primary"><?=$L["member_list"]?></a>

				<?php
					}else if($_SESSION['ROLE']=='u'){
				?>

					<a href="<?=$BASE_URL?>car/mylist.php" class="btn btn-primary"><?=$L["mycar_list"]?></a>

				<?php
					}
				?>
				<button type="button" class="btn btn-primary"><?=$L["profile"]?></button>
				<button href="logout.php" type="button" class="btn btn-primary"><?=$L["logout"]?></button>
			</div>
		</div>
	<?php

		}else{

	?>

			<img class="img img-thumbnail" src="<?=$BASE_URL?>images/banner.png">

	<?php
		}
	?>
</div>