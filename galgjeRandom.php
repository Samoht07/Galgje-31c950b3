<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Random</title>
    <link rel="stylesheet" type="text/css" href="galgje.css">
  </head>
  <body>
<h1>Lekker lui gedaan en een random woord gekozen he!</h1>
<?php
    $woorden = array("kaas","lever","muffin","hoeren","thomas","spectacles","sterven","klote","arbeit","appartementen","galgje","ham","piercing","holocaust","ekster","auschwitz");
    $rand_keys = array_rand($woorden);
    setcookie('woord' , $woorden[$rand_keys] , time() + (86400 * 10) );
    //echo $woorden[$rand_keys];
    ?>
    <form action="spelntje.php" method="get">
      <button type="submit" name="button">lekkern spelntje</button>
    </form>
  </body>
</html>