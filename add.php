<?php
// Conectar a la base de datos
try {
    $db = new PDO('sqlite:naves.db');
} catch (PDOException $e) {
    die('No se pudo conectar a la base de datos: ' . $e->getMessage());
}

// Si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los valores del formulario y eliminar espacios en blanco
    $name = trim($_POST['name']);
    $model = trim($_POST['model']);
    $manufacturer = trim($_POST['manufacturer']);
    $cost_in_credits = trim($_POST['cost_in_credits']);
    $length = trim($_POST['length']);
    $max_atmosphering_speed = trim($_POST['max_atmosphering_speed']);
    $crew = trim($_POST['crew']);
    $passengers = trim($_POST['passengers']);
    $cargo_capacity = trim($_POST['cargo_capacity']);
    $consumables = trim($_POST['consumables']);
    $hyperdrive_rating = trim($_POST['hyperdrive_rating']);
    $MGLT = trim($_POST['MGLT']);
    $starship_class = trim($_POST['starship_class']);
    $created = trim($_POST['created']);
    $edited = trim($_POST['edited']);
    $url = trim($_POST['url']);

    // Validar los campos obligatorios del formulario
    $errors = array();
    if (empty($name)) {
        $errors[] = 'El campo "Nombre" es obligatorio.';
    }
    if (empty($model)) {
        $errors[] = 'El campo "Modelo" es obligatorio.';
    }
    if (empty($manufacturer)) {
        $errors[] = 'El campo "Fabricante" es obligatorio.';
    }
    if (empty($cost_in_credits)) {
        $errors[] = 'El campo "Costo en créditos" es obligatorio.';
    }
    if (empty($length)) {
        $errors[] = 'El campo "Longitud" es obligatorio.';
    }
    if (empty($max_atmosphering_speed)) {
        $errors[] = 'El campo "Velocidad atmosférica máxima" es obligatorio.';
    }
    if (empty($crew)) {
        $errors[] = 'El campo "Tripulación" es obligatorio.';
    }
    if (empty($passengers)) {
        $errors[] = 'El campo "Pasajeros" es obligatorio.';
    }
    if (empty($cargo_capacity)) {
        $errors[] = 'El campo "Capacidad de carga" es obligatorio.';
    }
    if (empty($consumables)) {
        $errors[] = 'El campo "Consumibles" es obligatorio.';
    }
    if (empty($hyperdrive_rating)) {
        $errors[] = 'El campo "Clasificación de hiperimpulsor" es obligatorio.';
    }
    if (empty($MGLT)) {
        $errors[] = 'El campo "MGLT" es obligatorio.';
    }
    if (empty($starship_class)) {
        $errors[] = 'El campo "Clase de nave espacial" es obligatorio.';
    }
    if (empty($created)) {
        $errors[] = 'El campo "Creado" es obligatorio.';
    }
    if (empty($edited)) {
        $errors[] = 'El campo "Editado" es obligatorio.';
    }
    if (empty($url)) {
        $errors[] = 'El campo "URL" es obligatorio.';
    }

    if (count($errors) == 0) {
        // Insertar la nave espacial en la base de datos
        $stmt = $db->prepare("INSERT INTO naves (name, model, manufacturer, cost_in_credits, length, max_atmosphering_speed, crew, passengers, cargo_capacity, consumables, hyperdrive_rating, MGLT, starship_class, created, edited, url) VALUES (:name, :model, :manufacturer, :cost_in_credits, :length, :max_atmosphering_speed, :crew, :passengers, :cargo_capacity, :consumables, :hyperdrive_rating, :MGLT, :starship_class, :created, :edited, :url)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':model', $model);
        $stmt->bindParam(':manufacturer', $manufacturer);
        $stmt->bindParam(':cost_in_credits', $cost_in_credits);
        $stmt->bindParam(':length', $length);
        $stmt->bindParam(':max_atmosphering_speed', $max_atmosphering_speed);
        $stmt->bindParam(':crew', $crew);
        $stmt->bindParam(':passengers', $passengers);
        $stmt->bindParam(':cargo_capacity', $cargo_capacity);
        $stmt->bindParam(':consumables', $consumables);
        $stmt->bindParam(':hyperdrive_rating', $hyperdrive_rating);
        $stmt->bindParam(':MGLT', $MGLT);
        $stmt->bindParam(':starship_class', $starship_class);
        $stmt->bindParam(':created', $created);
        $stmt->bindParam(':edited', $edited);
        $stmt->bindParam(':url', $url);
        if (!$stmt->execute()) {
            die('No se pudo agregar la nave espacial: ' . implode(', ', $stmt->errorInfo()));
        }
        // Redirigir al listado de naves espaciales
        header('Location: list.php');
        exit;
    }
}

// Mostrar el formulario de agregación de naves espaciales
echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<title>Agregar nave espacial</title>';
echo '</head>';
echo '<body>';
echo '<h2>Agregar nave espacial</h2>';
if (!empty($errors)) {
    echo '<div style="color: red;">';
    foreach ($errors as $error) {
        echo '<p>' . htmlentities($error) . '</p>';
    }
    echo '</div>';
}
?>
<style>
/* Add styles to the form elements */
label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}
input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-bottom: 20px;
}
input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type="submit"]:hover {
    background-color: #45a049;
}
</style>
   <form method="post">
        <p>
            <label>Nombre:
                <input type="text" name="name" value="<?php echo isset($name) ? htmlentities($name) : ''; ?>">
            </label>
        </p>
        <p>
            <label>Modelo:
                <input type="text" name="model" value="<?php echo isset($model) ? htmlentities($model) : ''; ?>">
            </label>
        </p>
        <p>
            <label>Fabricante:
                <input type="text" name="manufacturer" value="<?php echo isset($manufacturer) ? htmlentities($manufacturer) : ''; ?>">
            </label>
        </p>
        <p>
            <label>Costo en créditos:
                <input type="text" name="cost_in_credits" value="<?php echo isset($cost_in_credits) ? htmlentities($cost_in_credits) : ''; ?>">
            </label>
        </p>
        <p>
            <label>Longitud:
                <input type="text" name="length" value="<?php echo isset($length) ? htmlentities($length) : ''; ?>">
            </label>
        </p>
        <p>
            <label>Velocidad atmosférica máxima:
                <input type="text" name="max_atmosphering_speed" value="<?php echo isset($max_atmosphering_speed) ? htmlentities($max_atmosphering_speed) : ''; ?>">
            </label>
        </p>
        <p>
            <label>Tripulación:
                <input type="text" name="crew" value="<?php echo isset($crew) ? htmlentities($crew) : ''; ?>">
            </label>
        </p>
        <p>
            <label>Pasajeros:
                <input type="text" name="passengers" value="<?php echo isset($passengers) ? htmlentities($passengers) : ''; ?>">
            </label>
        </p>
        <p>
            <label>Capacidad de carga:
                <input type="text" name="cargo_capacity" value="<?php echo isset($cargo_capacity) ? htmlentities($cargo_capacity) : ''; ?>">
            </label>
        </p>
        <p>
            <label>Consumibles:
                <input type="text" name="consumables" value="<?php echo isset($consumables) ? htmlentities($consumables) : ''; ?>">
            </label>
        </p>
        <p>
            <label>Clasificación de hiperimpulsor:
                <input type="text" name="hyperdrive_rating" value="<?php echo isset($hyperdrive_rating) ? htmlentities($hyperdrive_rating) : ''; ?>">
            </label>
        </p>
        <p>
            <label>MGLT:
                <input type="text" name="MGLT" value="<?php echo isset($MGLT) ? htmlentities($MGLT) : ''; ?>">
            </label>
        </p>
        <p>
            <label>Clase de nave espacial:
                <input type="text" name="starship_class" value="<?php echo isset($starship_class) ? htmlentities($starship_class) : ''; ?>">
            </label>
        </p>
        <p>
            <label>Creado:
                <input type="text" name="created" value="<?php echo isset($created) ? htmlentities($created) : ''; ?>">
            </label>
        </p>
        <p>
            <label>Editado:
                <input type="text" name="edited" value="<?php echo isset($edited) ? htmlentities($edited) : ''; ?>">
            </label>
        </p>
        <p>
            <label>URL:
                <input type="text" name="url" value="<?php echo isset($url) ? htmlentities($url) : ''; ?>">
            </label>
        </p>
        <p>
            <input type="submit" value="Agregar">
        </p>
        
    </form>
</body>
</html>
<?php
echo '<p><a href="list.php">Volver a la lista de naves</a></p>';
