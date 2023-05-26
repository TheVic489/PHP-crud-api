<?php


// Conexión a la base de datos
try {
    $db = new PDO('sqlite:naves.db');
} catch (PDOException $e) {
    die('No se pudo conectar a la base de datos: ' . $e->getMessage());
}

// Obtener el ID del elemento de la URL
$id = $_GET['id'];

// Consulta SQL para obtener los detalles del elemento
$stmt = $db->prepare("SELECT * FROM naves WHERE id = :id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Mostrar los detalles del elemento
echo '<h2 style="margin-top: 20px;">Detalles de la nave</h2>';
echo '<div style="display: flex; flex-wrap: wrap;">';
echo '<div style="flex-basis: 50%; padding-right: 20px;">';
echo '<p><strong>Nombre:</strong> ' . $row['name'] . '</p>';
echo '<p><strong>Modelo:</strong> ' . $row['model'] . '</p>';
echo '<p><strong>Fabricante:</strong> ' . $row['manufacturer'] . '</p>';
echo '<p><strong>Precio:</strong> ' . $row['cost_in_credits'] . '</p>';
echo '<p><strong>Longitud:</strong> ' . $row['length'] . '</p>';
echo '<p><strong>Velocidad máxima:</strong> ' . $row['max_atmosphering_speed'] . '</p>';
echo '</div>';
echo '<div style="flex-basis: 50%; padding-left: 20px;">';
echo '<p><strong>Tripulación:</strong> ' . $row['crew'] . '</p>';
echo '<p><strong>Pasajeros:</strong> ' . $row['passengers'] . '</p>';
echo '<p><strong>Capacidad de carga:</strong> ' . $row['cargo_capacity'] . '</p>';
echo '<p><strong>Consumibles:</strong> ' . $row['consumables'] . '</p>';
echo '<p><strong>Calificación del hiperimpulsor:</strong> ' . $row['hyperdrive_rating'] . '</p>';
echo '<p><strong>MGLT:</strong> ' . $row['MGLT'] . '</p>';
echo '<p><strong>Clase de nave espacial:</strong> ' . $row['starship_class'] . '</p>';
echo '</div>';
echo '</div>';
echo '<p><strong>Creado en:</strong> ' . $row['created'] . '</p>';
echo '<p><strong>Editado en:</strong> ' . $row['edited'] . '</p>';
echo '<p><strong>URL:</strong> ' . $row['url'] . '</p>';
// Enlace para volver a la lista de naves espaciales
echo '<p><a href="list.php">Volver a la lista de naves</a></p>';