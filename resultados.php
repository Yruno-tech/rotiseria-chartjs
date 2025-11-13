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
    <h1>Resultados de la Votación</h1>

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
                    label: '# de votos',
                    data: data,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.3)',   // azul claro
                        'rgba(255, 99, 132, 0.3)',   // rojo claro
                        'rgba(255, 206, 86, 0.3)',   // amarillo
                        'rgba(75, 192, 192, 0.3)',   // verde agua
                        'rgba(153, 102, 255, 0.3)',  // violeta
                        'rgba(255, 159, 64, 0.3)'    // naranja
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: { color: '#555' },
                        position: 'top'
                    },
                    title: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(0,0,0,0.05)' },
                        ticks: { color: '#555', stepSize: 2 }
                    },
                    x: {
                        grid: { color: 'rgba(0,0,0,0.05)' },
                        ticks: { color: '#555' }
                    }
                }
            }
        });
    
        // Actualizar gráfico cada 5 segundos
        setInterval(() => location.reload(), 5000);
    </script>

    <p><a href="index.php">Volver al formulario</a></p>
</body>
</html>

