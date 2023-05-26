<?php
try {
    $db = new PDO('sqlite:naves.db');
} catch (PDOException $e) {
    die('No se pudo conectar a la base de datos: ' . $e->getMessage());
}
$stmt = $db->query("SELECT * FROM naves");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Naves</title>
</head>
<!DOCTYPE html>
<html>
<head>
    <title>Naves</title>
    <style>
        /* Add styles to the table */
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        a {
            color: #4CAF50;
            text-decoration: none;
            margin-right: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
<body>
    <h1>Naves</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Model</th>
                <th>Manufacturer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['model']; ?></td>
                <td><?php echo $row['manufacturer']; ?></td>
                <td>
                    <a href="detail.php?id=<?php echo $row['id']; ?>">View</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="add.php">Add new starship</a>
</body>
</html>
