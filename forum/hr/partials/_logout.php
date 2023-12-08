<?php
session_start();
echo "Odjavljivanje. Molimo pričekajte...";

session_destroy();
header("Location: /forum/index.php")
?>
