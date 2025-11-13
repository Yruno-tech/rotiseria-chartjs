<?php include('conexion.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados - Rotisería</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: Arial; background: #f9f9f9; padding: 40px; text-align: center; }
        canvas { background: #fff; padding: 20px; border-radius: 10px; }
        h1 { color: #0a5d7a; }
    </style>
</head>
<body>
    <h1>📈 Resultados de la Votación</h1>

<?php
// Obtener conteo de votos
$query = "SELECT combo, COUNT(*) as cantidad FROM votos GROUP BY combo";
$result = mysqli_query($conn, $query);

$combos = [];
$cantidades = [];

while ($row = mysqli_fetch_assoc($result)) {
    $combos[] = $row['combo'];
    $cantidades[] = $row['cantidad'];
}
?>

    <canvas id="grafico" width="800" height="400"></canvas>

    <script>
        const labels = <?php echo json_encode($combos); ?>;
        const data = <?php echo json_encode($cantidades); ?>;

        const ctx = document.getElementById('grafico').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Cantidad de votos',
                    data: data,
                    backgroundColor: [
                        '#4caf50', '#2196f3', '#ff9800', '#e91e63', '#9c27b0', '#f44336'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true, ticks: { stepSize: 1 } }
                }
            }
        });

        
        setInterval(() => location.reload(), 5000);
    </script>

    <p><a href="index.php">Volver al formulario</a></p>
</body>
</html>
