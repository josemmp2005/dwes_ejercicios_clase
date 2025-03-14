<?php
if (isset($_POST['numero1']) && isset($_POST['numero2'])) {
    if ($_POST['numero1'] !== '' && $_POST['numero2'] !== '') {
        $numero1 = (int)$_POST['numero1'];
        $numero2 = (int)$_POST['numero2'];
        
        $suma = $numero1 + $numero2;
        
        echo "La suma de los dos números es: " . $suma;
    } else {
        header("Location: repaso2.php");
        exit();  
    }
} else {
    header("Location: repaso2.php");
    exit();
}
?>