<?php
session_start();
unset($_SESSION['username']);
unset( $_SESSION['logged'] );
session_destroy();
echo"<h2>loging you out</h2>";
header('Refresh:0;URL=index.php');
?>