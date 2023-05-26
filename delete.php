<?php
// Conexión a la base de datos
try {
    $db = new PDO('sqlite:naves.db');
} catch (PDOException $e) {
    die('No se pudo conectar a la base de datos: ' . $e->getMessage());
}
// Verificar si se ha enviado un formulario de eliminación
if (isset($_POST['id'])) {
    // Obtener el ID de la nave espacial a eliminar
    $id = $_POST['id'];
    // Consulta SQL para eliminar la nave espacial
    $stmt = $db->prepare("DELETE FROM naves WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    // Redirigir al usuario a la lista de naves espaciales
    header('Location: list.php');
    exit;
}
// Obtener el ID de la nave espacial de la URL
$id = $_GET['id'];
// Consulta SQL para obtener los detalles de la nave espacial
$stmt = $db->prepare("SELECT * FROM naves WHERE id = :id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
// Mostrar los detalles de la nave espacial
echo '<h2>Eliminar nave espacial</h2>';
echo '<p>¿Está seguro de que desea eliminar la nave espacial "' . $row['name'] . '"?</p>';
// Formulario de confirmación de eliminación
echo '<form method="post">';
echo '<input type="hidden" name="id" value="' . $id . '">';
echo '<input type="submit" value="Eliminar">';
echo '</form>';
// Enlace para cancelar la eliminación y volver a los detalles de la nave espacial
echo '<p><a href="detail.php?id=' . $id . '">Cancelar</a></p>';
?>
