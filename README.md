# Realizar deploy en local

Ejecutar utilizan make

`make up`

Sino se tiene make, ejecutar con docker

`docker compose up -d --build`

# Configurar wordpress

1. Acceder a la url http://localhost:8000
2. Configurar la base de datos, puede utilizar los datos que desee
3. Configurar el usuario y contraseña de wordpress
4. Configurar el sitio
5. Instalar el theme que se encuentra en la carpeta theme, el archivo se llama `jonacruz-01.zip`
6. Activar el theme
7. Instalar el plugin que se encuentra en la carpeta plugin, el archivo se llama `jonacruz-01.zip`
8. Activar el plugin
9. En la entrada existente agregar el shortcode `[contact_form]`
10. Guardar la entrada
11. Ir al home para ver el theme y el plugin instalado al final de la página
12. Ingresar datos en el formulario y enviar
13. Ver datos registrados en el admin de wordpress
14. Listo!

# Realizar pruebas

Ejecutar los siguientes comandos

`make bash`

`composer require --dev phpunit/phpunit ^9`

`composer require --dev yoast/phpunit-polyfills:"^3.0"`

`wp scaffold plugin-tests jonacruz-01 --allow-root`

<!-- `bash wp-content/plugins/jonacruz-01/bin/install-wp-tests.sh unow_test unow unow db latest` -->

`vendor/bin/phpunit --configuration wp-content/plugins/jonacruz-01/phpunit.xml.dist`