<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Het spel</title>
        <link rel="stylesheet" type="text/css" href="galgje.css">
	</head>
	<body>
		<div class="mid">
			<?php
			
			$mistakesCount = 0;
			if(isset($_POST['button'])){
				if($_POST['button'] != 'reset'){
					$lastCharacter   = $_POST['button'];
					if(isset($_COOKIE['characters'])){
						$characters = $_COOKIE['characters'] . ',' . $_POST['button'];
					} else {
						$characters = $_POST['button'];
					}
					setcookie('characters' , $characters , time() + (86400 * 10) );
					header("Location: spelntje.php");
				} else {
					setcookie("woord", "", time() - 3600); 
					setcookie("characters", "", time() - 3600); 
					setcookie("mistakes", "", time() - 3600); 
					header("Location: galgje.php");
				}
			}
			

			if (!isset($_COOKIE['characters'])) {
				$_COOKIE['characters'] = " ";
			}
			$woordKarakters = str_split($_COOKIE['woord']);
			$keuzeKarakters = explode(",", $_COOKIE['characters']);

			$won = true;
			foreach ($woordKarakters as $woordKarakter) {
				$keuzeCorrect = false;
				foreach ($keuzeKarakters as $keuzeKarakter) {
					if($woordKarakter === $keuzeKarakter){
						$keuzeCorrect = true;
					}
                }
                echo "<div id='streep'>";
				if($keuzeCorrect){
					echo($woordKarakter);
				} else {
					echo('_ ');
					$won = false;
                }
                echo "</div>";
                
			}
			foreach ($keuzeKarakters as $keuzeKarakter) {
				$keuzeCorrect = false;
				foreach ($woordKarakters as $woordKarakter) {
					if($woordKarakter === $keuzeKarakter){
						$keuzeCorrect = true;
					}
				}
				
				if(!$keuzeCorrect){
					$mistakesCount++;
				}
			}
			$lose = false;
			if($mistakesCount === 10){
				$lose = true;
			}
			
			if($won){
				echo '<br>' . '<h1>Je hebt gewonnen</h1>';
			}		
			if($lose){
				echo '<br>' . '<h1>Je hebt verloren</h1>';
			}
			?>
			<br>
			<br>
			<br>
			<form action="spelntje.php" method="post">
			<button type="submit" name="button" value="reset">reset</button>

			<?php 
				$alphabet = range("a","z");
				foreach ($alphabet as $value) {
					$display = true;
					foreach ($keuzeKarakters as $keuzeKarakter) {
						if ($value === $keuzeKarakter) {
							$display = false;
						}
					}
					if ($won) {
						$display = false;
					}
					if ($lose){
						$display = false;
					}
					if ($display){
						echo('<button type="submit" name="button" value="' . $value . '">' . $value . '</button>');
					} else {
						echo('<button type="submit" name="button" value="' . $value . '" disabled>' . $value . '</button>');
					}
					
				}
			?>

			</form>

			<h1>Gebruikte letters:</h1><p>
			<?php
				foreach ($keuzeKarakters as $keuzeKarakter) {
					echo($keuzeKarakter . ' , ');
				}
			?>
			</p>
		</div>
		<div class="right">
			<?php
			
				if($mistakesCount === 0){
					echo('<img id="dood" src="galgje1.jpeg">');
				} if($mistakesCount === 1) {
					echo('<img id="dood" src="galgje2.jpeg">');	
				} if($mistakesCount === 2) {
					echo('<img id="dood" src="galgje3.jpeg">');	
				}if($mistakesCount === 3) {
					echo('<img id="dood" src="galgje4.jpeg">');	
				}if($mistakesCount === 4) {
					echo('<img id="dood" src="galgje5.jpeg">');	
				}if($mistakesCount === 5) {
					echo('<img id="dood" src="galgje6.jpeg">');	
				}if($mistakesCount === 6) {
					echo('<img id="dood" src="galgje7.jpeg">');	
				}if($mistakesCount === 7) {
					echo('<img id="dood" src="galgje8.jpeg">');	
				}if($mistakesCount === 8) {
					echo('<img id="dood" src="galgje9.jpeg">');	
				}if($mistakesCount === 9) {
					echo('<img id="dood" src="galgje10.jpeg">');	
				}if($mistakesCount === 10) {
					echo('<img id="dood" src="galgje11.jpeg">');	
				}
			?>
		</div>

	</body>
</html>