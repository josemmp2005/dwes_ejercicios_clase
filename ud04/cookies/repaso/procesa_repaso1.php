<?php
if (isset($_POST["name"])) {
    if ($_POST["name"] !== "") {
        setcookie("name", $_POST["name"], time() + 60);

        echo "Bienvenido " . $_POST["name"];

    } else {
        header("Location: repaso1.php");
    }
} else {
    if (isset($_COOKIE["name"])) {
        echo "Bienvenido de nuevo " . htmlspecialchars($_COOKIE["name"]);
    } else {
        header("Location: repaso1.php");
    }
}
?>
