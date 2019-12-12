<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>User</title>
     <link rel="stylesheet" type="text/css" href="galgje.css">
  </head>
  <body>
    <h1>JIJ JA JIJ! Je wou dus de moeite doen om een woord te kiezen</h1>
        <form  action="#" method="post">
        <input type="text" name="woord">
    <button type="submit" name="button">Lekker getypt?</button>

<?php
if (isset($_POST['woord'])) {
$choice = strtolower($_POST['woord']);
setcookie('woord' , $choice , time() + (86400 * 10) );
header("Location: spelntje.php");
}
?>

</form>
  </body>
</html>