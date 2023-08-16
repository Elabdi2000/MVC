<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $pagetitle; ?></title>
</head>
<body>
<table border="2" align="center"><td><a href="index.php?action=readAll">Gestion des voitures</a></td>
    <td><a href="index.php?action=readAllu&controller=utilisateur">Gestion des utilisateurs</a></td>
    <td><a href="index.php?action=readAll&controller=trajet">Gestion des trajets</a></td>
<td><a href="">Se connecter</a></td></table>

<?php
// Si $controleur='voiture' et $view='list',
// alors $filepath="/chemin_du_site/view/voiture/list.php"
$filepath = File::build_path(array("view", $controller, "$view.php"));
require $filepath;

?>

<form action="index.php?action=create&controller=<?php echo $controller;?> " method="GET">
    <a href="index.php?action=<?php echo $_GET['action']?>&controller=<?php echo $controller;?> "><button>Ajouter</button></a>
</form>

<p style="border: 1px solid black;text-align:right;padding-right:1em;">
    Site de covoiturage de ...
</p>
<p>Copyright by elabdi</p>
</body>
</html>