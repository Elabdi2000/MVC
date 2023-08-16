<?php
#require_once 'Model.php';
require_once File::build_path(array('model','Model.php'));


class ModelUtilisateur {

    private $nom;
    private $prenom;
    private $login;

    public function get($nom_attribut) {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    // Setter générique (pas expliqué en TD)
    public function set($nom_attribut, $valeur) {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }

    // un constructeur
    public function __construct($login = NULL, $nom = NULL, $prenom = NULL)
    {
        if (!is_null($login) && !is_null($nom) && !is_null($prenom)) {
            // Si aucun de $m, $c et $i sont nuls,
            // c'est forcement qu'on les a fournis
            // donc on retombe sur le constructeur à 3 arguments
            $this->login = $login;
            $this->nom = $nom;
            $this->prenom = $prenom;
        }
    }
    // une methode d'affichage.
    public function afficher() {

        // À compléter dans le prochain exercice
        echo "login:".$this->login."</br>nom:".$this->nom."</br>prenom:".$this->prenom;

    }
    public static function getUtilisateurByLogin($login) {
        $sql = "SELECT * from utilisateur WHERE login='$login'";
        echo "<p>J'effectue la requête \"$sql\"</p>";
        $rep = Model::$pdo->query($sql);
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
        return $rep->fetchAll();
    }
    public static function getUtilisateurByLogin2($login) {
        $sql = "SELECT * from utilisateur WHERE login=:nom_tag";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "nom_tag" => $login,
            //nomdutag => valeur, ...
        );
        print($values.login);
        // On donne les valeurs et on exécute la requête

        $req_prep->execute($values);

        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
        $tab_voit = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_voit))
            return false;
        return $tab_voit[0];
    }

    public static function getAllUtilisateurs(){
        try {
            $sql = "SELECT * from utilisateur";
            $rep = Model::$pdo->query($sql);
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
            return $rep->fetchAll();
        }catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }

    }
    public  function save(){
        try{
            $sql="INSERT INTO `utilisateur`(`login`, `nom`, `prenom`) VALUES ('".$this->get('login')."','".$this->get('nom')."','".$this->get('prenom')."')";
            $rep = Model::$pdo->query($sql);
        }catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
                return false;
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }



    }
    public static function deleteByLogin($login){
        try{
            $sql="delete from utilisateur where login='".$login."'";
            $rep = Model::$pdo->query($sql);
        }catch(PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
                return false;
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }
    public static function updateu($data){
        try{
            $sql="UPDATE utilisateur SET nom='".$data[1]."',prenom='".$data[2]."' WHERE login='".$data[0]."'";
            $rep = Model::$pdo->query($sql);
           }catch(PDOException $e) {
                if (Conf::getDebug()) {
                    echo $e->getMessage(); // affiche un message d'erreur
                    return false;
                } else {
                    echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
                }
                die();
            }
                }
}

