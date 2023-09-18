# Prueba 1: CSV a DB y CRUD Naves espaciales
- El primer paso és crear la base de datos ejecutando el archivo csv_to_db.php
- Luego ejecuta el archivo list.php para ir a la tabla principal 

## A continuacion hay una breve explicacion de lo que hace cada arhivo de la prueba
[detail.php]
Explicación del código:

-Se realiza la conexión con la base de datos SQLite utilizando PDO.

-Se obtiene el ID del elemento de la URL utilizando la variable $_GET.

-Se prepara una consulta SQL para obtener los detalles del elemento utilizando el ID.

-Se ejecuta la consulta SQL y se obtiene la fila correspondiente utilizando el método fetch.

-Se decodifica el formato JSON de la columna "data" a un array asociativo utilizando la función json_decode.

-Se muestran los detalles del elemento utilizando las variables obtenidas del array asociativo.

-Se muestra un enlace para volver a la lista de naves espaciales.

-Para crear un enlace que permita al usuario ver los detalles de un elemento específico, puedes utilizar la siguiente línea de código en el archivo que muestra la lista de naves espaciales:

[add.php]
Explicación del código:

1. Se establece una conexión a la base de datos SQLite utilizando PDO.
2. Si se ha enviado el formulario (se ha realizado una solicitud POST), se procede a obtener los valores del formulario y eliminar los espacios en blanco.
3. Luego, se validan los campos obligatorios del formulario. Si alguno de los campos está vacío, se agregará un mensaje de error al array $errors.
4. Si no hay errores, se prepara una sentencia SQL para insertar los valores del formulario en la tabla de naves espaciales. Los valores se vinculan a los parámetros de la sentencia preparada para evitar ataques de inyección SQL.
5. Si la inserción en la base de datos tiene éxito, se redirige al usuario al listado de naves espaciales (list.php).
6. Si hay errores o no se pudo agregar la nave espacial, se mostrarán los mensajes de error y el formulario nuevamente para que el usuario pueda corregir los campos.
7. El formulario HTML muestra los campos del formulario, con los valores previamente ingresados (si los hay) y los mensajes de error (si existen). Los estilos CSS se agregan directamente en el archivo para aplicar el diseño.
8. Al final del archivo se muestra un enlace para volver al listado de naves espaciales (list.php).

[delete.php]
Explicación del código:

### Conexión a la base de datos

- Establecer una conexión a la base de datos utilizando PDO.
- Verificar si se ha enviado un formulario de eliminación.
- Consulta SQL para eliminar la nave espacial.
- Redirigir al usuario a la lista de naves espaciales.

### Formulario de confirmación de eliminación

- Mostrar un mensaje de confirmación de eliminación.
- Formulario que permite al usuario confirmar la eliminación.
- Si el usuario confirma la eliminación, se elimina la nave espacial utilizando una consulta SQL preparada.

# Prueba 2: Descargar datos de una API Publica y convertir a CSV
[api/index.php]
Para arrancar el programa con el servidor localhost simplemente ejecuta:
`php -S localhost:9999 -t ./api-img-request` desde directorio raiz del proyecto
