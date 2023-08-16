<?php
$DS = DIRECTORY_SEPARATOR;
$ROOT_FOLDER = __DIR__ . $DS . "..";
require_once $ROOT_FOLDER.'\lib\File.php';
require_once File::build_path(array('controller','ControllerVoiture.php'));
require_once File::build_path(array('controller','ControllerUtilisateur.php'));

// On recupère l'action passée dans l'URL
if(isset($_GET['action'])){
    $class_methods = get_class_methods('ControllerVoiture');
   if(in_array($_GET['action'],$class_methods)){
       $action = $_GET['action'];
       ControllerVoiture::$action();
   }

   else
       require_once File::build_path(array('view','voiture','error.php'));

}
else
    ControllerVoiture::readAll();


// On recupère l'action passée dans l'URL
if(isset($_GET['action'])){
    $class_methods = get_class_methods('ControllerUtilisateur');
   if(in_array($_GET['action'],$class_methods)){
       $action = $_GET['action'];
       ControllerUtilisateur::$action();
   }

   else
       require_once File::build_path(array('view','utilisateur','error.php'));

}
else
    ControllerUtilisateur::readAllu();

?>

