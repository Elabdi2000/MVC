<?php
require_once File::build_path(array('model','ModelVoiture.php')); // chargement du modèle
class ControllerVoiture {
    public static function readAll() {
        $tab_v = ModelVoiture::getAllVoitures();     //appel au modèle pour gerer la BD
        $controller='voiture'; $view='list'; $pagetitle='Liste des voitures';
        require_once ('../view/view.php');  //"redirige" vers la vue
    }
    public static function read() {

        $tab_v = ModelVoiture::getVoitureByImmat($_GET['immat']);     //appel au modèle pour gerer la BD
        $controller='voiture'; $view='detail'; $pagetitle='détail de voiture';
        require_once ('../view/view.php');  //"redirige" vers la vue
    }
    public static function create() {
        $tab_v = ModelVoiture::getAllVoitures();     //appel au modèle pour gerer la BD
        $controller='voiture'; $view='create'; $pagetitle='nouveau voiture';
        require_once ('../view/view.php');  //"redirige" vers la vue

    }
    public static function created() {
        //récupérer les donnés de la voiture à partir de la query string,
        if (isset($_GET['action'])){
            $imm=$_GET['immatriculation'];
            $c=$_GET['couleur'];
            $m=$_GET['marque'];
        }
        $v=new ModelVoiture($imm,$m,$c);
        $v->save();
        $tab_v = ModelVoiture::getAllVoitures();
        $controller='voiture'; $view='list'; $pagetitle='creation voiture';
        require_once ('../view/view.php');  //"redirige" vers la vue
    }

    public static function delete() {
        $imm=$_GET['immat'];
        modelvoiture::deleteByImmat($imm);
        $tab_v = ModelVoiture::getAllVoitures();
        $controller='voiture'; $view='deleted'; $pagetitle='supression voiture';
        require_once ('../view/view.php');  //"redirige" vers la vue

    }
    public static function update()
    {
        $tab_v = ModelVoiture::getVoitureByImmat($_GET['immat']);     //appel au modèle pour gerer la BD
        $controller = 'voiture'; $view = 'update';$pagetitle = 'modifier voiture';
        require_once('../view/view.php');  //"redirige" vers la vue

    }
    public static function updated(){
        if (isset($_GET['action'])) {
            $imm = $_GET['immatriculation'];
            $c = $_GET['couleur'];
            $m = $_GET['marque'];
        }
        modelvoiture::update(array($imm,$c,$m));
        $tab_v = ModelVoiture::getAllVoitures();
        $controller='voiture'; $view='updated'; $pagetitle='supression voiture';
        require_once ('../view/view.php');  //"redirige" vers la
    }
}

?>