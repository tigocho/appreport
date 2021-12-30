
# Appreport

Appreport es un aplicativo que permite registrar y descargar reportes de las novedades que les ocurre a los agentes del callcenter en su jornada laboral. El aplicativo permite seleccionar una categoría y una indecencia dependiendo la novedad que se está reportando, colocar fecha de inicio, fin, colocar observación, obtener reportes según fecha y calcular el tiempo en la que ocurre la novedad.


## Instalacion
A continuación, se listan las tecnologías necesarias para ejecutar la appreport

1. clonar el reporsitorio.  
```bash
  https://github.com/tigocho/appreport.git
```
2. instalacion base de datos 
2.1. buscar la base de datos en la siguiente direccion
```bash
  C:\xampp\htdocs\appreport
```  
2.2. instalar la base de datos en phpadmin con el siguiente nombre
```bash
  incident_report
```  
3. configuracion del archivo config.php
3.1 el archivo se encuentra en la siguiente ruta
```bash
  C:\xampp\htdocs\appreport\application\config
```  
3.2 en el archivo config.php configurar las siguientes opciones
```bash
'username' => '(usuario que tiene en phpmyadmin)'
'password' => '(contraseña que tiene en phpmyadmin)’
``` 
4. Se debe de abrir el proyecto en la ruta donde se encuentra instalado el aplicativo de appreport y acceder a la carpeta ejem: http://localhost/appreport
## Contruido con

 - [Codeigniter v.3 ](https://codeigniter.com/)
 - [Jquery](https://jquery.com/)
 - [x ray medical and hospital Admin témplate](https://templates.iqonic.design/xray/html/dashboard-1.html)

