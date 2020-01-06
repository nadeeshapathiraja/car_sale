<?php

	if(!isset($_SESSION)){
		session_start();
	}

	$L = parse_ini_file($BASE_URL.'lang/en.ini');
?>
<div class="row">
	<div class="col-md-12">
		<div class="jumbotron" style="background: url('<?=$BASE_URL?>images/bg1.jpg')">
			<h1 class="blue_text"> <?=$L["site_name"] ?> </h1>
			<p class="light_blue_text"> <?=$L["slogan"] ?> </p>
			<hr/>
			<?php
				if(isset($_SESSION["NAME"])){
			?>

				<p>Welcome <?=$_SESSION["NAME"] ?></p>
				<a href="<?=$BASE_URL ?>logout.php" class='btn btn-warning'> <?=$L["logout"] ?> </a>

			<?php

			 }else{

			?>

			<a href="register.php" class="btn btn-success"> <?=$L["register"] ?> </a>
			<a href="login.php" class="btn btn-warning"> <?=$L["login"] ?> </a>

			<?php

			 }

			?>
		</div>
	</div>
</div>