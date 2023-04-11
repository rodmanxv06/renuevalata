<?php
//requerimos del modelo de productos
require_once "products.model.php"
echo json_encode(products::showData());