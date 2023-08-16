<?php
require_once File::build_path(array('model','ModelTrajet.php')); // chargement du modèle
class ControllerTrajet {
    public static function readAllt() {
        $tab_v = ModelTrajet::getAllTrajets();     //appel au modèle pour gerer la BD
        $controller='trajet'; $view='listu'; $pagetitle='Liste des trajets';
        require_once ('../view/view.php');  //"redirige" vers la vue
    }
    public static function readt() {

        $tab_v = ModelTrajet::getTrajetByLogin($_GET['login']);     //appel au modèle pour gerer la BD
        $controller='trajet'; $view='detailu'; $pagetitle='détail de trajet';
        require_once ('../view/view.php');  //"redirige" vers la vue
    }
    public static function createt() {
        $tab_v = ModelTrajet::getAllTrajets();     //appel au modèle pour gerer la BD
        $controller='trajet'; $view='createu'; $pagetitle='nouveau trajet';
        require_once ('../view/view.php');  //"redirige" vers la vue

    }
    public static function createdt() {
        //récupérer les donnés de la trajet à partir de la query string,
        if (isset($_GET['action'])){
            $login=$_GET['login'];
            $nom=$_GET['nom'];
            $prenom=$_GET['prenom'];
        }
        $v=new ModelTrajet($login,$nom,$prenom);
        $v->save();
        $tab_v = ModelTrajet::getAllTrajets();
        $controller='trajet'; $view='listu'; $pagetitle='creation trajet';
        require_once ('../view/view.php');  //"redirige" vers la vue
    }

    public static function deletet() {
        $login=$_GET['login'];
        ModelTrajet::deleteByLogin($login);
        $tab_v = ModelTrajet::getAllTrajets();
        $controller='trajet'; $view='deletedu'; $pagetitle='supression trajet';
        require_once ('../view/view.php');  //"redirige" vers la vue

    }
    public static function updatet()
    {
        $tab_v = ModelTrajet::getTrajetByLogin($_GET['login']);   //appel au modèle pour gerer la BD
        $controller = 'trajet'; $view = 'updateu';$pagetitle = 'modifier trajet';
        require_once('../view/view.php');  //"redirige" vers la vue

    }
    public static function updatedt(){
        if (isset($_GET['action'])) {
            $login = $_GET['login'];
            $nom = $_GET['nom'];
            $prenom= $_GET['prenom'];
        }
        ModelTrajet::updatet(array($login,$nom,$prenom));
        $tab_v = ModelTrajet::getAllTrajets();
        $controller='trajet'; $view='updatedu'; $pagetitle='supression trajet';
        require_once ('../view/view.php');  //"redirige" vers la
    }
}

?>