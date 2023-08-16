<?php
#require_once 'Model.php';
require_once File::build_path(array('model','Model.php'));


class modelvoiture {

    private $marque;
    private $couleur;
    private $immatriculation;

    // un getter
    public function getMarque() {
        return $this->marque;
    }

    // un setter
    public function setMarque($marque2) {
        $this->marque = $marque2;
    }
    public function getCouleur() {
        return $this->couleur;
    }

    // un setter
    public function setCouleur($couleur) {
        $this->couleur = $couleur;
    }
    public function getImmatriculation() {
        return $this->immatriculation;
    }

    // un setter
    public function setImatriculation($immatriculation) {
        $this->immatriculation = $immatriculation;
    }

    // un constructeur
    public function __construct($im = NULL, $m = NULL, $c = NULL)
    {
        if (!is_null($im) && !is_null($m) && !is_null($c)) {
            // Si aucun de $m, $c et $i sont nuls,
            // c'est forcement qu'on les a fournis
            // donc on retombe sur le constructeur à 3 arguments
            $this->immatriculation = $im;
            $this->marque = $m;
            $this->couleur = $c;
        }
    }
    // une methode d'affichage.
    public function afficher() {

        // À compléter dans le prochain exercice
        echo "Marque:".$this->marque."</br>Couleur:".$this->couleur."</br>Immatriculation:".$this->immatriculation;

    }
    public static function getVoitureByImmat($immat) {
        $sql = "SELECT * from voiture WHERE immatriculation='$immat'";
        echo "<p>J'effectue la requête \"$sql\"</p>";
        $rep = Model::$pdo->query($sql);
        $rep->setFetchMode(PDO::FETCH_CLASS, 'modelvoiture');
        return $rep->fetchAll();
    }
    public static function getVoitureByImmatv2($immat) {
        $sql = "SELECT * from voiture WHERE immatriculation=:nom_tag";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "nom_tag" => $immat,
            //nomdutag => valeur, ...
        );
        print($values.immat);
        // On donne les valeurs et on exécute la requête

        $req_prep->execute($values);

        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelvoiture');
        $tab_voit = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_voit))
            return false;
        return $tab_voit[0];
    }

    public static function getAllVoitures(){
        try {
            $sql = "SELECT * from voiture";
            $rep = Model::$pdo->query($sql);
            $rep->setFetchMode(PDO::FETCH_CLASS, 'modelvoiture');
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
            $sql="INSERT INTO `voiture`(`immatriculation`, `marque`, `couleur`) VALUES ('".$this->getImmatriculation()."','".$this->getMarque()."','".$this->getCouleur()."')";
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
    public static function deleteByImmat($immat){
        try{
            $sql="delete from voiture where immatriculation='".$immat."'";
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
    public static function update($data){
        try{
            $sql="UPDATE voiture SET marque='".$data[1]."',couleur='".$data[2]."' WHERE immatriculation='".$data[0]."'";
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

