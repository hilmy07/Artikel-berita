<?php 
session_start();
$_SESSION = [];
session_unset();
session_destroy();

// hapus cookie
setcookie('id','',time()- 86400);
setcookie('key','',time()- 86400);

header("Location: login.php");
exit;
?>