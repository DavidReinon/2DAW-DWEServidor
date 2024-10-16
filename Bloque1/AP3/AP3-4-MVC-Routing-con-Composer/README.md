# DWES --> AP3-4 - Ejemplo de como realizar un MVC Routing con Composer.

## Descripción:

Esta actividad práctica consiste en cumplir los mismos requisitos que la actividad AP3-3 pero añadiendo
el autoloader por PSR-4 y usar el manager de dependencias para PHP Composer.

## Recursos generales:

Presentaciones y videos de Temas 3:
#### • Introducción a MVC
#### • Espacios de nombres PHP
#### • Estructura típica de un proyecto MVC (composer)
Material de apoyo:
#### • POO y MVC en PHP
#### • Y de más links del tema en Florida Oberta.
## Recursos adicionales:
#### • Script creación BB.DD. todolist en formato SQL.

## Actividades:
Para ello se pide:
### 1. Crea un proyecto con la estructura típica que se ha visto en el tema 3 de MVC.
### 2. Instala el autoloader de Composer (el gestor de dependencias que vamos a usar todo el curso).
### 3. La estructura de carpetas estará compuesta por:
#### • Public → Donde vamos a alojar el frontController, que llamaremos index.php, del proyecto como único punto de entrada al mismo. Además, en esta carpeta podemos depositar todos archivos como imágenes, css, etc… auxiliares de nuestro proyecto.
#### • Src → Contendrá la lógica de todo el proyecto mediante las siguientes subcarpetas:
###### • Controllers→ Estará contenida toda la lógica de los controladores que sea necesaria.
###### • Models→ Se adjunta un fichero SQL para exportar la BB.DD., todolist.sql. Con la que poder importarla a tú MySQL y generar las clases para obtener los datos necesarios. Toda la lógica del modelado de la BB.DD. debe estar en esta carpeta.
###### • Views→ No es necesario crear ningún motor de renderización. Genera clases capaces de mostrar por pantalla la información que se requiere, con una estructura de tabla será suficiente.
###### • Core → Se puede añadir esta carpeta extra, si necesitas crear clases adicionales que no cumplan los criterios de las anteriores y que sean de utilidad.
#### • Config → Obtén la información de conexión de BB.DD. desde un fichero JSON. Incorpora en el mismo (o en un fichero separado) el enrutado de la aplicación. Es decir, que rutas se corresponden con qué controladores. Crea las clases necesarias para la gestión de esta información.
### 4. La aplicación solo contendrá dos rutas:
#### 4.1. / o raíz → Es donde se listará el total de los registros de la BB.DD., incluyendo título y fecha de vencimiento.
#### 4.2. /detalle → Es donde se mostrará la totalidad de la información de una tarea.
### 5. Recomendable → Re-factoriza, si lo crees necesario, para cumplir los máximos principios SOLID que puedas.

## License

This work is licensed under a Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License.

<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/80x15.png" /></a>


## Credits

Authors: Fernando A. Díaz-Alonso ([@fdiaz-alonso](https://github.com/fdiaz-alonso)) and David Soler
