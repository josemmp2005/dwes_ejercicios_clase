<?php

session_start();
session_unset();
session_destroy();

header("Location: guiado2.php");
?>