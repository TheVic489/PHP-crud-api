[detail.php]
Explicación del código:

Se realiza la conexión con la base de datos SQLite utilizando PDO.
Se obtiene el ID del elemento de la URL utilizando la variable $_GET.
Se prepara una consulta SQL para obtener los detalles del elemento utilizando el ID.
Se ejecuta la consulta SQL y se obtiene la fila correspondiente utilizando el método fetch.
Se decodifica el formato JSON de la columna "data" a un array asociativo utilizando la función json_decode.
Se muestran los detalles del elemento utilizando las variables obtenidas del array asociativo.
Se muestra un enlace para volver a la lista de naves espaciales.
Para crear un enlace que permita al usuario ver los detalles de un elemento específico, puedes utilizar la siguiente línea de código en el archivo que muestra la lista de naves espaciales: