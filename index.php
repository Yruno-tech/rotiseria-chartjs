<?php include('conexion.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Rotisería BifeConJuguito - Votación</title>
    <style>
        body { font-family: Arial; background: #f2f2f2; margin: 40px; }
        form { background: #fff; padding: 20px; border-radius: 10px; width: 400px; margin: auto; }
        h1 { text-align: center; color: #0a5d7a; }
        button { background: #0a7aa3; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; }
        button:hover { background: #06657f; }
    </style>
</head>
<body>
    <h1>Votá tu Combo Favorito 🍛</h1>

    <form action="index.php" method="POST">
        <p><input type="radio" name="combo" value="Combo 1 La insuperable" required> Combo 1 La insuperable</p>
        <p><input type="radio" name="combo" value="Combo 2 La Finoli"> Combo 2 La Finoli</p>
        <p><input type="radio" name="combo" value="Combo 3 La pesada"> Combo 3 La pesada</p>
        <p><input type="radio" name="combo" value="Combo 4 Sopa de Tubo"> Combo 4 Sopa de Tubo</p>
        <p><input type="radio" name="combo" value="Combo 5 El Patriota"> Combo 5 El Patriota</p>
        <p><input type="radio" name="combo" value="Combo 6 Diablo ácido"> Combo 6 Diablo ácido</p>

        <button type="submit" name="votar">Votar</button>
    </form>

<?php
if (isset($_POST['votar'])) {
    $combo = $_POST['combo'];
    $sql = "INSERT INTO votos (combo) VALUES ('$combo')";
    if (mysqli_query($conn, $sql)) {
        echo "<p style='text-align:center; color:green;'>¡Voto registrado! 🎉</p>";
    } else {
        echo "<p style='text-align:center; color:red;'>Error al votar.</p>";
    }
}
?>

    <p style="text-align:center;"><a href="resultados.php">Ver resultados</a></p>
</body>
</html>
