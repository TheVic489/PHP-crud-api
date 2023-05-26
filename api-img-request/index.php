<?php
// Ha sido necesario configurar un contexto de flujo personalizado con un encabezado User-Agent que imite el de un navegador web común.
$context = stream_context_create(
    array(
        "http" => array(
            "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
        )
    )
);
// URL de la API de PICSUM para obtener las primeras 75 imágenes
$url = 'https://picsum.photos/v2/list?page=1&limit=75';

// Realizar la petición HTTP a la API de PICSUM y obtener los datos en formato JSON
$response = file_get_contents($url, false, $context);

if ($response === false) {
    echo 'Error al acceder a la API de PICSUM.';
} else {
    // Decodificar los datos JSON en un array asociativo
    $images = json_decode($response, true);

    if (is_array($images)) {
        // Crear un archivo CSV y escribir los datos de las imágenes en él
        $csv_file = fopen('picsum_images.csv', 'w');

        if ($csv_file !== false) {
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
                echo 'Error al crear el archivo CSV.';
            }
        } else {
            echo 'Error al abrir el archivo CSV.';
        }
    } else {
        echo 'Error al decodificar los datos JSON de la API de PICSUM.';
    }
}
?>
