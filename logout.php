<?php
session_start();
session_destroy();
header("Location: control-center.php");
echo "See you later...";
exit();
?>
