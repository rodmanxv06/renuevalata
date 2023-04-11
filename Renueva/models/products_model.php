<?php
//si se reciben datos por el metodo post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  //recolectamos los datos
  //validamos si existe un dato para los input, de lo contrario va a quedar en blanco
  $name = isset($_POST['name_prod']) ? $_POST["name_prod"] : " ";
  $description = isset($_POST['Desc']) ? $_POST["Desc"] : " ";
  $stoke = isset($_POST['stoke']) ? $_POST["stoke"] : " ";
  $id_category = isset($_POST['Categ']) ? $_POST["Categ"] : " ";
  $id_state_product  = isset($_POST['Statee']) ? $_POST["Statee"] : " ";
  $price = isset($_POST['pricee']) ? $_POST["pricee"] : " ";

  $fecha = new dateTime();

  //recepción de nombre de imagen

  //usamos la funcion getTimestamp parsa obtener la hora a la que se sube
  //luego concatenamos el  con el nombre de la imagen
  $imagen = $fecha->getTimestamp()."".$_FILES['img']['name'];
  //añadimos nombre temporal
  $imagen_temporal = $_FILES['img']['tmp_name'];
  //movemos la imagen recibida a la carpeta "imagenes"
  move_uploaded_file($imagen_temporal,"../resources/img/saveproducts".$imagen);


  //preparamos la insercción o sentencia sql
  $objConexion = new conexion();
  $sql = "INSERT INTO products(id_product, name, descripcion, price, image, stoke, id_category, id_state_product ) VALUES (NULL, '$name', '$description', '$price', '$image', '$stoke', '$id_category', '$id_state_product')";
  $objConexion->ejecutar($sql);
  header("Location: ../view/private/products.html");
  exit();
}
?>