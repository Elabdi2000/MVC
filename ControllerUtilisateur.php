<?php
require_once File::build_path(array('model','ModelUtilisateur.php')); // chargement du modèle
class ControllerUtilisateur {
    public static function readAllu() {
        $tab_v = ModelUtilisateur::getAllUtilisateurs();     //appel au modèle pour gerer la BD
        $controller='utilisateur'; $view='list'; $pagetitle='Liste des utilisateurs';
        require_once ('../view/view.php');  //"redirige" vers la vue
    }
    public static function readu() {

        $tab_v = ModelUtilisateur::getUtilisateurByLogin($_GET['login']);     //appel au modèle pour gerer la BD
        $controller='utilisateur'; $view='detail'; $pagetitle='détail de utilisateur';
        require_once ('../view/view.php');  //"redirige" vers la vue
    }
    public static function createu() {
        $tab_v = ModelUtilisateur::getAllUtilisateurs();     //appel au modèle pour gerer la BD
        $controller='utilisateur'; $view='create'; $pagetitle='nouveau utilisateur';
        require_once ('../view/view.php');  //"redirige" vers la vue

    }
    public static function createdu() {
        //récupérer les donnés de la utilisateur à partir de la query string,
        if (isset($_GET['action'])){
            $login=$_GET['login'];
            $nom=$_GET['nom'];
            $prenom=$_GET['prenom'];
        }
        $v=new ModelUtilisateur($login,$nom,$prenom);
        $v->save();
        $tab_v = ModelUtilisateur::getAllUtilisateurs();
        $controller='utilisateur'; $view='list'; $pagetitle='creation utilisateur';
        require_once ('../view/view.php');  //"redirige" vers la vue
    }

    public static function deleteu() {
        $login=$_GET['login'];
        ModelUtilisateur::deleteByLogin($login);
        $tab_v = ModelUtilisateur::getAllUtilisateurs();
        $controller='utilisateur'; $view='deleted'; $pagetitle='supression utilisateur';
        require_once ('../view/view.php');  //"redirige" vers la vue

    }
    public static function updateu()
    {
        $tab_v = ModelUtilisateur::getUtilisateurByLogin($_GET['login']);   //appel au modèle pour gerer la BD
        $controller = 'utilisateur'; $view = 'update';$pagetitle = 'modifier utilisateur';
        require_once('../view/view.php');  //"redirige" vers la vue

    }
    public static function updatedu(){
        if (isset($_GET['action'])) {
            $login = $_GET['login'];
            $nom = $_GET['nom'];
            $prenom= $_GET['prenom'];
        }
        ModelUtilisateur::updateu(array($login,$nom,$prenom));
        $tab_v = ModelUtilisateur::getAllUtilisateurs();
        $controller='utilisateur'; $view='updated'; $pagetitle='supression utilisateur';
        require_once ('../view/view.php');  //"redirige" vers la
    }
}

?>