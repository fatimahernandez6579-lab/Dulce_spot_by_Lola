
# 🍰 Dulce Spot by Lola – Tienda de Postres

## 1. Descripción del proyecto

Dulce Spot by Lola es un sitio web desarrollado para una tienda de postres, cuyo objetivo es mostrar un catálogo de productos y facilitar la administración de los mismos.

El sistema permite registrar nuevos postres, consultar los productos disponibles, modificar su información y eliminarlos mediante las operaciones CRUD (Crear, Leer, Actualizar y Eliminar).

El sitio cuenta con una interfaz sencilla, moderna y atractiva, utilizando colores en tonos rosa y blanco para representar la temática de la tienda.

## 2. Instrucciones de ejecución

Para ejecutar el proyecto es necesario contar con los siguientes programas:

- Visual Studio Code.
- XAMPP.
- Google Chrome o cualquier navegador web.

### Pasos para ejecutar:

1. Descargar o copiar la carpeta del proyecto llamada `Dulce_spot_by_Lola`.
2. Colocar la carpeta dentro de la siguiente ruta:

   `C:\xampp\htdocs\`

3. Abrir XAMPP Control Panel.
4. Iniciar el servicio Apache presionando el botón Start.
5. Abrir Visual Studio Code.
6. Seleccionar y abrir la carpeta `Dulce_spot_by_Lola`.
7. Abrir Google Chrome o cualquier navegador web.
8. Escribir la siguiente dirección:

   `http://localhost/Dulce_spot_by_Lola/index.php`

9. Navegar por las diferentes secciones del sitio web.

### Funcionalidades disponibles:

- **Inicio:** muestra la presentación de la tienda.
- **Postres:** permite consultar el catálogo de productos.
- **Registrar:** permite agregar nuevos postres.
- **Administrar:** permite editar y eliminar productos.

La base de datos SQLite se crea automáticamente al ejecutar la conexión por primera vez.

## 3. Tecnologías utilizadas

Las tecnologías y herramientas utilizadas para desarrollar este proyecto son:

- **HTML5:** para crear la estructura de las páginas web.
- **CSS3:** para personalizar los colores, tamaños y estilos del sitio.
- **Bootstrap 5.3.3:** para diseñar una interfaz adaptable y organizar los elementos.
- **JavaScript:** para agregar interactividad y funciones de búsqueda.
- **PHP:** para procesar formularios y conectar el sitio con la base de datos.
- **SQLite:** para almacenar la información de los productos.
- **Visual Studio Code:** como editor de código.
- **XAMPP:** para ejecutar el servidor local Apache y PHP.

## 4. Operaciones CRUD

El sistema implementa las siguientes operaciones:

- **CREATE (Crear):** registrar nuevos postres.
- **READ (Leer):** consultar los productos registrados.
- **UPDATE (Actualizar):** modificar la información de los postres.
- **DELETE (Eliminar):** eliminar productos del catálogo.

## 5. Base de datos

El proyecto utiliza una base de datos llamada `tienda_postres.db`, que contiene una tabla llamada `productos`.

La tabla almacena los siguientes datos:

- ID del producto.
- Nombre.
- Descripción.
- Precio.
- Categoría.
- Existencias.
- Imagen.

---

**Proyecto escolar: Dulce Spot by Lola – Tienda de Postres.**
