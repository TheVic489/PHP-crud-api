<?php

//Cree una base de datos SQLite y una tabla para almacenar los datos:

$db = new PDO('sqlite:naves.db');

$clean_table = 'DROP TABLE IF EXISTS naves';
$db->exec($clean_table);

$table = "CREATE TABLE IF NOT EXISTS naves (
    id INTEGER PRIMARY KEY,
    name TEXT,
    model TEXT,
    manufacturer TEXT,
    cost_in_credits INTEGER,
    length REAL,
    max_atmosphering_speed INTEGER,
    crew TEXT,
    passengers INTEGER,
    cargo_capacity INTEGER,
    consumables TEXT,
    hyperdrive_rating REAL,
    MGLT INTEGER,
    starship_class TEXT,
    created TEXT,
    edited TEXT,
    url TEXT
)";
$db->exec($table);

$file = fopen("naves.csv", "r");
$headers = fgetcsv($file, 0, ";"); // get the headers of the CSV file
while (!feof($file)) { // loop through each row of the CSV file
    $row = fgetcsv($file, 0, ";");
    if ($row) { // if the row is not empty
        $row = array_combine($headers, $row); // combine headers with row values
        print_r($row);
        $stmt = $db->prepare("INSERT INTO naves (name, model, manufacturer, cost_in_credits, length, max_atmosphering_speed, crew, passengers, cargo_capacity, consumables, hyperdrive_rating, MGLT, starship_class, created, edited, url) 
                                VALUES (:name, :model, :manufacturer, :cost_in_credits, :length, :max_atmosphering_speed, :crew, :passengers, :cargo_capacity, :consumables, :hyperdrive_rating, :MGLT, :starship_class, :created, :edited, :url)");
        $stmt->execute([
            'name' => $row['results/name'],
            'model' => $row['results/model'],
            'manufacturer' => $row['results/manufacturer'],
            'cost_in_credits' => $row['results/cost_in_credits'],
            'length' => $row['results/length'],
            'max_atmosphering_speed' => $row['results/max_atmosphering_speed'],
            'crew' => $row['results/crew'],
            'passengers' => $row['results/passengers'],
            'cargo_capacity' => $row['results/cargo_capacity'],
            'consumables' => $row['results/consumables'],
            'hyperdrive_rating' => $row['results/hyperdrive_rating'],
            'MGLT' => $row['results/MGLT'],
            'starship_class' => $row['results/starship_class'],
            'created' => $row['results/created'],
            'edited' => $row['results/edited'],
            'url' => $row['results/url']
        ]);
    }
}
fclose($file);
