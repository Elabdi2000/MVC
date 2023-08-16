<?php
$DS = DIRECTORY_SEPARATOR;
$ROOT_FOLDER = __DIR__ . $DS . "..";
require_once $ROOT_FOLDER.'\lib\File.php';
require_once File::build_path(array('controller','ControllerVoiture.php'));
// On recupère l'action passée dans l'URL
$action = $_GET['action'];
// Appel de la méthode statique $action de ControllerVoiture
ControllerVoiture::$action();
?>

