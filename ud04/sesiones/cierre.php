<?php
session_start();

session_unset();

session_destroy();

header("Location: guiado3.php");

?>
