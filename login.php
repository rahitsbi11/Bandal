<?php
session_start();
$db = new SQLite3('db.sqlite3');
if ($_POST) {
  $m = $_POST['mobile'];
  $p = $_POST['password'];
  $res = $db->query("SELECT * FROM users WHERE mobile='$m' AND password='$p'");
  if ($row = $res->fetchArray()) {
    $_SESSION['user'] = $row['id'];
    header("Location: game.php");
  } else {
    echo "Invalid login";
  }
}
?>
<!DOCTYPE html>
<html><head><link rel="stylesheet" href="style.css"></head><body>
<h2>Login</h2>
<form method="post">
Mobile: <input name="mobile"><br>
Password: <input type="password" name="password"><br>
<button type="submit">Login</button>
</form></body></html>