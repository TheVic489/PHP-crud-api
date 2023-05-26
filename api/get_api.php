<?php

try {
    // URL de la API de PICSUM para obtener las primeras 75 imágenes
    $url = 'https://picsum.photos/v2/list?page=1&limit=75';
    }    
catch (Exception $e) {
    echo 'Error al pedir los datos de PICSUM: ' . $e->getMessage();
    }
finally {
    
    // Realizar la petición HTTP a la API de PICSUM y obtener los datos en formato JSON
    $data = file_get_contents($url);

    // Decodificar los datos JSON en un array asociativo
    $images = json_decode($data, true);

    // Crear un archivo CSV y escribir los datos de las imágenes en él
    $csv_file = fopen('picsum_images.csv', 'w');
    fputcsv($csv_file, ['ID', 'Autor', 'Ancho', 'Alto', 'URL', 'URL de descarga'], ';');

    foreach ($images as $image) {
        fputcsv($csv_file, [
            $image['id'],
            $image['author'],
            $image['width'],
            $image['height'],
            $image['url'],
            $image['download_url']
        ], ';');
    }

    fclose($csv_file);

    if (file_exists('picsum_images.csv')) {
        echo 'Archivo CSV generado exitosamente.'; 
    } else {
        echo 'Error al generar el archivo CSV.';
    }

}
