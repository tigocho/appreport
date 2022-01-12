
# Appreport

Appreport es un aplicativo que permite registrar y descargar reportes de las novedades que les ocurre a los agentes del callcenter en su jornada laboral. El aplicativo permite seleccionar una categoría y una indecencia dependiendo la novedad que se está reportando, colocar fecha de inicio, fin, colocar observación, obtener reportes según fecha y calcular el tiempo en la que ocurre la novedad.
## Instalación
A continuación, se listan las tecnologías necesarias para ejecutar la Appreport

1. Clonar el repositorio.  
```bash
  https://github.com/tigocho/appreport.git
```
2. Instalación base de datos 

4.1. Buscar la base de datos en la siguiente dirección
```bash
  C:\xampp\htdocs\appreport
```  
2.2. Instalar la base de datos en phpadmin con el siguiente nombre
```bash
  Incident_report
```  
3. Configuración del archivo config.php,el archivo se encuentra en la siguiente ruta
```bash
  C:\xampp\htdocs\appreport\application\config
```  
3.1 En el archivo config.php configurar las siguientes opciones
```bash
'username' => '(usuario que tiene en phpmyadmin)'
'Password' => '(contraseña que tiene en phpmyadmin)’
``` 
4. Para acceder a la ruta donde se encuentra instalado el aplicativo de appreport es la siguiente : http://localhost/appreport

## Construido con

 - [Codeigniter v.3 ](https://codeigniter.com/)
 - [jQuery](https://jquery.com/)
 - [x ray medical and hospital Admin témplate](https://templates.iqonic.design/xray/html/dashboard-1.html)

## Contactos

- Luis Andrés Orduz - andres.orduz@ospedale.com.co
- Cristhian Castro - cristhian.castro@ospedale.com.co
- Cristian camilo - auxiliar.ti2@ospedale.com.co
